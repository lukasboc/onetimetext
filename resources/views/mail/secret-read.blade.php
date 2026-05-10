@component('mail::message')
# Dein OneTimeText wurde gelesen

Dein OneTimeText (Erstellt: {{ $text->created_at->timezone('Europe/Berlin')->format('d.m.Y H:i') }}) wurde soeben geöffnet und aus dem System gelöscht.

@component('mail::button', ['url' => url('/dashboard')])
Zum Dashboard
@endcomponent

*OneTimeText — Sichere Einmal-Nachrichten*
@endcomponent
