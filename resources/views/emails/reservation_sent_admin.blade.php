@component('mail::message')
    Sveiki,

    Išsiųstas naujas paslaugų užsakymas.

    Pagarbiai,
    {{ env('MAIL_FROM_ADDRESS') }}
@endcomponent
