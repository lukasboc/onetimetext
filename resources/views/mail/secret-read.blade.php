@component('mail::message')
# {{ __('Your :app was read', ['app' => env('APP_NAME', 'OneTimeText')]) }}

{{ __('Your :app (created: :date) was just opened and removed from the system.', [
    'app' => env('APP_NAME', 'OneTimeText'),
    'date' => $text->created_at->timezone('Europe/Berlin')->format(app()->getLocale() === 'en' ? 'Y-m-d H:i' : 'd.m.Y H:i'),
]) }}

@component('mail::button', ['url' => url('/dashboard')])
{{ __('Go to dashboard') }}
@endcomponent

*{{ __(':app — secure one-time messages', ['app' => env('APP_NAME', 'OneTimeText')]) }}*
@endcomponent
