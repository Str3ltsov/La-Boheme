@component('mail::message')
    Sveiki,

    {{ $message }}

    Pagarbiai,
    {{ env('MAIL_FROM_ADDRESS') }}
@endcomponent
