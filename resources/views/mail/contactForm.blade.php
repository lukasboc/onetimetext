@component('mail::message')
    {{ __('A message was received via the contact form.') }}

    {{ __('Subject') }}: {{ $subj }}

    {{ $msg }}

    {{ __('Reply to') }}: {{ $senderMail }}
@endcomponent
