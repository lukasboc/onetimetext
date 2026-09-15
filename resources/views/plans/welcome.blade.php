@extends('templates.main')

@section('content')

<div class="min-h-[60vh] flex items-center py-12">
    <div class="grid md:grid-cols-2 gap-12 items-center w-full">
        <div>
            <div class="flex items-center gap-3 mb-6">
                <x-icons.check class="size-10 text-success" />
                <h1 class="text-3xl font-bold">{{ __('Welcome!') }}</h1>
            </div>
            <div class="flex flex-col gap-4 text-base-content/70 leading-relaxed">
                <p>
                    {!! __('I am glad you chose :app Pro. Once your subscription has been created, you can access your :dashboard via the navigation in the top right.', [
                        'app' => e(env('APP_NAME', 'OneTimeText')),
                        'dashboard' => '<a href="' . url('dashboard') . '" class="link link-primary">' . __('personal dashboard') . '</a>',
                    ]) !!}
                </p>
                <p>
                    {{ __('Using the user icon you reach the account settings to change your password or email address. The „Subscription" menu item takes you directly to the Stripe customer portal.') }}
                </p>
                <p>
                    {!! __('Questions or remarks? Feel free to use the :contact.', [
                        'contact' => '<a href="' . url('contact') . '" class="link link-primary">' . __('contact form') . '</a>',
                    ]) !!}
                </p>
                <p class="text-base-content/50">
                    {{ __('Have fun using it!') }}<br>
                    {{ __('Lukas from :app', ['app' => env('APP_NAME', 'OneTimeText')]) }}
                </p>
            </div>
            <div class="mt-6">
                <a href="{{ url('dashboard') }}" class="btn btn-primary gap-2">
                    {{ __('Go to dashboard') }}
                </a>
            </div>
        </div>
        <div class="flex justify-center">
            <img src="{{ asset('images/welcome.png') }}" alt="{{ __('Welcome') }}" class="max-h-72 object-contain">
        </div>
    </div>
</div>

@endsection
