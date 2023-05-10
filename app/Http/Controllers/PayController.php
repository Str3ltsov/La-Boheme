<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Helpers\Constants;
use App\Services\ReservationsService;
use Illuminate\Http\Request;
use Exception;

class PayController extends Controller
{
    private ReservationsService $service;

    private array $messages = [
        'Payment has been accepted',
        'Payment has been cancelled'
    ];

    public function __construct(ReservationsService $service) 
    {
        $this->service = $service;
    }

    public function redirectToPay()
    {
        return view('pay.redirect_to_pay');
    }

    public function index(Request $request)
    {
        $orderId = $request->session()->get('appPayOrderId');
        $amount = $request->session()->get('appPayAmount');

        $amountArray = explode('.', $amount);
        $partialAmount = str_replace(",", "", $amountArray[0]);

        if (isset($amountArray[1]) && strlen($amountArray[1]) === 1) {
            $amountArray[1] = $amountArray[1].'0';
        }

        $cents = $amountArray[1] ?? '00';
        $fullAmount = $partialAmount.$cents;

        $appUrl = env('APP_URL');

        $payment = [
            'projectid' => env('WEBTOPAY_PROJECT_ID'),
            'sign_password' => env('WEBTOPAY_SIGN_PASSWORD'),
            'orderid' => $orderId.time(),
            'amount' => $fullAmount,
            'currency' => 'EUR',
            'country' => 'LT',
            'accepturl' => "{$appUrl}pay/accept/$orderId",
            'cancelurl' => "{$appUrl}pay/cancel/$orderId",
            'callbackurl' => "{$appUrl}pay/callback/$orderId"
        ];

        !env('WEBTOPAY_PROD') && $payment['test'] = 1;

        try {
            \WebToPay::redirectToPayment($payment);
        }
        catch (Exception $exception) {
            return back()->with('error', get_class($exception).': '.$exception->getMessage());
        }
        exit;
    }

    public function accept($id, Request $request)
    {
        $this->updateReservation($request, $id);

        return view('pay.accept')
            ->with([
                'success' => __($this->messages[0]),
                'id' => $id,
                'reservation' => $this->service->getReservationById($id)
            ]);
    }

    public function cancel($id, Request $request)
    {
        $this->updateReservation($request, $id);
        
        return view('pay.cancel')
            ->with('error', __($this->messages[1]));
    }

    public function callback($id, Request $request)
    {
        $this->updateReservation($request, $id);
    }

    public function downloadInvoice($id, Request $request)
    {
        // try {
            $data = [
                'reservation' => $this->service->getReservationById($id),
                'logo' => $this->convertImageToBase64('images/logo.png')
            ];

            return Pdf::loadView('pay.invoice', $data)
                ->download("vat_invoice_$id.pdf");
        // }
        // catch (Exception $exception) {
        //     return back()->with('error', $exception->getMessage());
        // }
    }

    private function updateReservation(object $request, int $id): string
    {
        $params = [];
        parse_str(base64_decode(strtr($request->get('data'), ['-' => '+', '_' => '/'])), $params);

        if (is_array($params) && isset($params['status']) && $params['status'] == 1 && is_numeric($id)) {
            $reservation = $this->service->getReservationById($id);
            $reservation->reservation_status_id = Constants::reservationStatusInProgress;
            $reservation->save();
            return $this->messages[0];
        } 
        return $this->messages[1];
    }

    private function convertImageToBase64(string $path): mixed
    {
        $imagePath = public_path($path);
        $imageType = pathinfo($imagePath, PATHINFO_EXTENSION);
        $imageData = file_get_contents($imagePath);
        
        return 'data:image/'.$imageType.';base64,'.base64_encode($imageData);
    }
}