@extends('templates.main')

@section('content')

<div class="py-12">
    <div class="text-center mb-12">
        <p class="text-sm uppercase tracking-widest text-base-content/50 mb-2">{{ __('For everyone who wants more') }}</p>
        <h1 class="text-4xl font-bold">
            {!! __(':app pricing.', ['app' => '<span class="text-primary">' . e(env('APP_NAME', 'OneTimeText')) . '</span>']) !!}
        </h1>
    </div>

    {{-- Pricing Cards --}}
    <div class="grid md:grid-cols-3 gap-6 mb-16">

        {{-- Free --}}
        <div class="card bg-base-200 shadow-lg">
            <div class="card-body gap-4">
                <div>
                    <h2 class="card-title text-xl">{{ __('Free') }}</h2>
                    <div class="flex items-end gap-1 mt-2">
                        <span class="text-4xl font-bold">{{ __('€0.00') }}</span>
                        <span class="text-base-content/50 mb-1">{{ __('/ month') }}</span>
                    </div>
                </div>
                <p class="text-base-content/60 text-sm">{{ __('Use without an account, no commitment.') }}</p>
                <ul class="flex flex-col gap-2 text-sm">
                    <li class="flex items-center gap-2">
                        <x-icons.check class="size-4 text-success shrink-0" />
                        {{ __('unlimited :app messages', ['app' => env('APP_NAME', 'OneTimeText')]) }}
                    </li>
                    <li class="flex items-center gap-2 text-base-content/40">
                        <x-icons.check class="size-4 shrink-0" />
                        {{ __('up to 2,000 characters') }}
                    </li>
                    <li class="flex items-center gap-2 text-base-content/40">
                        <x-icons.check class="size-4 shrink-0" />
                        {{ __('expiry configurable up to 30 days') }}
                    </li>
                    <li class="flex items-center gap-2 text-base-content/40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                        {{ __('personal dashboard') }}
                    </li>
                    <li class="flex items-center gap-2 text-base-content/40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                        {{ __('read notification by email') }}
                    </li>
                    <li class="flex items-center gap-2 text-base-content/40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                        {{ __('white-labeling') }}
                    </li>
                </ul>
                <div class="card-actions mt-2">
                    <button class="btn btn-ghost btn-outline w-full" disabled>{{ __('Available without an account') }}</button>
                </div>
            </div>
        </div>

        {{-- Pro --}}
        <div class="card bg-primary/10 border border-primary shadow-xl ring-2 ring-primary">
            <div class="card-body gap-4">
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <h2 class="card-title text-xl text-primary">Pro</h2>
                        <span class="badge badge-primary badge-sm">{{ __('Recommended') }}</span>
                    </div>
                    <div class="flex items-end gap-1 mt-2">
                        <span class="text-4xl font-bold">{{ __('€1.99') }}</span>
                        <span class="text-base-content/50 mb-1">{{ __('/ month') }}</span>
                    </div>
                </div>
                <p class="text-base-content/60 text-sm">{{ __('Unlocks a personal dashboard and guaranteed availability.') }}</p>
                <ul class="flex flex-col gap-2 text-sm">
                    <li class="flex items-center gap-2">
                        <x-icons.check class="size-4 text-success shrink-0" />
                        {{ __('unlimited :app messages', ['app' => env('APP_NAME', 'OneTimeText')]) }}
                    </li>
                    <li class="flex items-center gap-2">
                        <x-icons.check class="size-4 text-success shrink-0" />
                        {{ __('up to 10,000 characters per message') }}
                    </li>
                    <li class="flex items-center gap-2">
                        <x-icons.check class="size-4 text-success shrink-0" />
                        {{ __('expiry configurable without limit') }}
                    </li>
                    <li class="flex items-center gap-2">
                        <x-icons.check class="size-4 text-success shrink-0" />
                        {{ __('personal dashboard') }}
                    </li>
                    <li class="flex items-center gap-2">
                        <x-icons.check class="size-4 text-success shrink-0" />
                        {{ __('read notification by email') }}
                    </li>
                    <li class="flex items-center gap-2 text-base-content/40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                        {{ __('white-labeling') }}
                    </li>
                </ul>
                <div class="card-actions mt-2">
                    <a href="{{ route('register') }}" class="btn btn-primary w-full">{{ __('Go to registration') }}</a>
                </div>
            </div>
        </div>

        {{-- Enterprise --}}
        <div class="card bg-base-200 shadow-lg">
            <div class="card-body gap-4">
                <div>
                    <h2 class="card-title text-xl">{{ __('Enterprise') }}</h2>
                    <div class="flex items-end gap-1 mt-2">
                        <span class="text-4xl font-bold">{{ __('on request') }}</span>
                    </div>
                </div>
                <p class="text-base-content/60 text-sm">{{ __('A dedicated instance of :app with white-labeling.', ['app' => env('APP_NAME', 'OneTimeText')]) }}</p>
                <ul class="flex flex-col gap-2 text-sm">
                    <li class="flex items-center gap-2">
                        <x-icons.check class="size-4 text-success shrink-0" />
                        {{ __('unlimited :app messages', ['app' => env('APP_NAME', 'OneTimeText')]) }}
                    </li>
                    <li class="flex items-center gap-2">
                        <x-icons.check class="size-4 text-success shrink-0" />
                        {{ __('up to 10,000 characters per message') }}
                    </li>
                    <li class="flex items-center gap-2">
                        <x-icons.check class="size-4 text-success shrink-0" />
                        {{ __('expiry configurable without limit') }}
                    </li>
                    <li class="flex items-center gap-2">
                        <x-icons.check class="size-4 text-success shrink-0" />
                        {{ __('personal dashboard') }}
                    </li>
                    <li class="flex items-center gap-2">
                        <x-icons.check class="size-4 text-success shrink-0" />
                        {{ __('read notification by email') }}
                    </li>
                    <li class="flex items-center gap-2">
                        <x-icons.check class="size-4 text-success shrink-0" />
                        {{ __('white-labeling') }}
                    </li>
                </ul>
                <div class="card-actions mt-2">
                    <a href="{{ url('/contact') }}" class="btn btn-ghost btn-outline w-full">{{ __('Get in touch') }}</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Info-Bereich --}}
    <div class="border-t border-base-300 pt-16">
        <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <h2 class="text-2xl font-bold mb-4">{{ __('What is :app Pro?', ['app' => env('APP_NAME', 'OneTimeText')]) }}</h2>
                <p class="text-base-content/70 leading-relaxed">
                    {{ __('The :app Pro subscription extends the base functionality with a dashboard for tracking created messages. Users get a tabular view of every message they have created and that has not yet been opened by recipients.', ['app' => env('APP_NAME', 'OneTimeText')]) }}
                </p>
            </div>
            <div class="flex justify-center">
                <img src="{{ asset('images/panel.png') }}" alt="{{ __('Dashboard') }}" class="max-h-64 object-contain">
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="hidden md:flex justify-center order-first">
                <img src="{{ asset('images/how.png') }}" alt="{{ __('How do I get access') }}" class="max-h-64 object-contain">
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-4">{{ __('How do I get access?') }}</h2>
                <p class="text-base-content/70 leading-relaxed mb-3">
                    {{ __('To use :app Pro, a paid subscription is required. The price is €4.99 per month. The minimum contract term is one month.', ['app' => env('APP_NAME', 'OneTimeText')]) }}
                </p>
                <p class="text-base-content/70">
                    {!! __('To switch to Pro, you must first :register.', [
                        'register' => '<a href="' . route('register') . '" class="link link-primary">' . __('register') . '</a>',
                    ]) !!}
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
