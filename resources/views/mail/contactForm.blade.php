@component('mail::message')
    Es ist eine Nachricht über das Kontaktformular eingegangen.

    Betreff: {{ $subj }}

    {{ $msg }}

    Antwort an: {{ $senderMail }}
@endcomponent
