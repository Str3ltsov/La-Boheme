<x-mail::message>
# Reservation review

Please rate your coach reservation.

<x-mail::button :url="$link">
Go to review
</x-mail::button>

Sincerely,<br>
{{ config('app.name') }}
</x-mail::message>
