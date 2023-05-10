<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="lt-LT" xml:lang="lt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ __("VAT Invoice $reservation->id") }}</title>
    <style>
        html {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }
        body {
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* font-family: Arial, Helvetica, sans-serif; */
        }
        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>
<body>
    <div style="display: flex; flex-direction: column; background: white; width: clamp(500px, 100%, calc(3508px / 4)); padding: 0; font-size: 14px">
        <table style="background-color: #f5f5f5; padding: 10px 50px; padding-bottom: 25px">
            <tr>
                <td style="width: 280px">
                    <h1 style="margin-bottom: 30px">{{ __('VAT Invoice') }}</h1>
                    <div style="line-height: 8px">
                        <b>{{ __('Invoice number') }}:</b>
                        <p style="color: #666">{{ $reservation->id }}</p>
                    </div>
                    <div style="line-height: 8px; margin-top: 30px">
                        <b>{{ __('Date') }}:</b>
                        <p style="color: #666">{{ $reservation->created_at ? $reservation->created_at->format('Y-m-d') : '' }}</p>
                    </div>
                </td>
                <td style="width: 400px">
                    <div style="padding: 35px 0; background: #fff">
                        <img src="{{ $logo }}" alt="logo" width="280" style="padding-left: 50px">
                    </div>
                </td>
            </tr>
        </table>
        <table style="background-color: #fff; padding: 10px 50px; padding-bottom: 25px">
            <tr>
                <td style="width: 330px; display: flex; align-items: flex-start">
                    <div style="line-height: 8px; margin-top: 20px">
                        <b>{{ __('Buyer') }}:</b>
                        <p style="color: #666">{{ $reservation->client->name }}</p>
                        <p style="color: #666">{{ $reservation->client->phone_number }}</p>
                    </div>
                </td>
                <td style="width: 350px">
                    <div style="line-height: 8px; margin-top: 20px">
                        <b>{{ __('Seller') }}:</b>
                        <p style="color: #666">{{ __('MB “Du prieš du”') }}</p>
                        <p style="color: #666">{{ __('Perkūnkiemio g. 13-91') }}</p>
                        <p style="color: #666">{{ __('12114 Vilnius, Lietuva') }}</p>
                        <p style="color: #666">{{ __('+37068610246') }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 330px;">
                </td>
                <td style="width: 350px">
                    <div style="line-height: 9px; margin-top: 20px">
                        <b>{{ __('Bank account number') }}:</b>
                        <p style="color: #666">{{ __('LT157044090102918330') }}</p>
                    </div>
                </td>
            </tr>
        </table>
        <table style="background-color: #f5f5f5; padding: 0px 50px; padding-bottom: 15px; text-transform: uppercase; font-size: 12px">
            <tr>
                <td style="width: 330px;">
                    <div style="line-height: 8px; margin-top: 18px">
                        <b>{{ __('Title') }}</b>
                    </div>
                </td>
                <td style="width: 100px">
                    <div style="line-height: 8px; margin-top: 18px">
                        <b>{{ __('Price, EUR') }}</b>
                    </div>
                </td>
                <td style="width: 170px">
                    <div style="line-height: 8px; margin-top: 18px">
                        <b>{{ __('Quantity') }}</b>
                    </div>
                </td>
                <td style="width: 100px">
                    <div style="line-height: 8px; margin-top: 18px">
                        <b>{{ __('Total, EUR') }}</b>
                    </div>
                </td>
            </tr>
        </table>
        <table style="background-color: #fff; padding: 10px 50px; padding-bottom: 25px">
            <tr>
                <td style="width: 330px;">
                    <div style="line-height: 20px; margin-top: 15px; padding-right: 20px">
                        @if ($reservation->vyrtren_id)
                            <b>{{ __('Advance payment for ').$reservation->vyrtrenass->first_name.' '.$reservation->vyrtrenass->last_name.__(' reservation') }}:</b>
                        @elseif ($reservation->vyrtrenass_id)
                            <b>{{ __('Advance payment for ').$reservation->vyrtrenass->first_name.' '.$reservation->vyrtrenass->last_name.__(' reservation') }}</b>
                        @else
                            <b>{{ __('Advance payment for ').$reservation->fiztren->first_name.' '.$reservation->fiztren->last_name.__(' reservation') }}</b>
                        @endif
                    </div>
                </td>
                <td style="width: 100px;">
                    <div style="line-height: 8px; margin-top: 5px">
                        {{ __('200.00') }}
                    </div>
                </td>
                <td style="width: 165px">
                    <div style="line-height: 8px; margin-top: 5px">
                        {{ __('1') }}
                    </div>
                </td>
                <td style="width: 90px">
                    <div style="line-height: 8px; margin-top: 5px; text-align: right">
                        {{ __('200.00') }}
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 330px;">
                </td>
                <td style="width: 100px; padding-top: 5px; border-bottom: 2px solid black" colspan="3">
                </td>
                <td style="width: 165px">
                </td>
                <td style="width: 90px">
                </td>
            </tr>
            <tr>
                <td style="width: 330px">
                </td>
                <td style="width: 100px" colspan="2">
                    <div style="line-height: 35px; margin-bottom: 8px">
                        {{ __('Total sum without VAT') }}
                    </div>
                </td>
                <td style="width: 90px">
                    <div style="line-height: 35px; margin-bottom: 8px; text-align: right">
                        {{ __('158.00') }}
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 330px">
                </td>
                <td style="width: 100px" colspan="2">
                    <div style="line-height: 15px; margin-bottom: 5px">
                        {{ __('VAT') }}
                    </div>
                </td>
                <td style="width: 90px">
                    <div style="line-height: 15px; margin-bottom: 5px; text-align: right">
                        {{ __('42.00') }}
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 330px">
                </td>
                <td style="width: 100px" colspan="2">
                    <div style="line-height: 23px; margin-bottom: 20px">
                        {{ __('Total sum with VAT') }}
                    </div>
                </td>
                <td style="width: 90px">
                    <div style="line-height: 23px; margin-bottom: 20px; text-align: right">
                        {{ __('200.00') }}
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 330px;">
                </td>
                <td style="width: 100px; padding-bottom: 5px; border-top: 2px solid black" colspan="3">
                </td>
                <td style="width: 165px">
                </td>
                <td style="width: 90px">
                </td>
            </tr>
            <tr>
                <td style="width: 330px">
                </td>
                <td style="width: 100px" colspan="2">
                    <div style="line-height: 30px; margin-bottom: 15px">
                        <b>{{ __('Total payment') }}</b>
                    </div>
                </td>
                <td style="width: 90px">
                    <div style="line-height: 30px; margin-bottom: 15px; text-align: right">
                        <b>{{ __('200.00 Eur') }}</b>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 330px">
                    <div style="line-height: 8px; margin: 15px 0">
                        <b>{{ __('Additional information') }}:</b>
                        <p style="color: #666">{{ __('Payment by Paysera transfer') }}</p>
                    </div>
                </td>
            </tr>
        </table>
        <table style="background-color: #f5f5f5; padding: 10px 50px; padding-bottom: 25px; margin-top: 105px">
            <tr>
                <td style="width: 330px">
                    <div style="line-height: 6px; margin-top: 20px;">
                        <b>{{ __('Thank you for buying') }}</b>
                    </div>
                </td>
                <td style="width: 350px">
                    <div style="line-height: 6px; margin-top: 20px;">
                        <b>{{ __('Need help?') }}</b> <span style="color: #666; margin-left: 5px">{{ __('info@dupriesdu.lt') }}</span>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>