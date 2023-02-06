@component('mail::message')
    Sveiki,

    Jūsų paslauga sėkmingai išsaugota. Netrukus el. paštu gausite administratoriaus patvirtinimą.

    Norėdami atsisakyti paslaugos galite:
    1. Susisiekti su mumis telefonu +370 686 10246.
    2. Parašyti el. laišką joana@getweb.lt
    3. Paspausti šią nuorodą.

    Pagarbiai,<br/>
    {{ env('MAIL_FROM_ADDRESS') }}
@endcomponent
