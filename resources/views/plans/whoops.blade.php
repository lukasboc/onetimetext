@extends('templates.main')

@section('content')

<div class="min-h-[60vh] flex items-center py-12">
    <div class="grid md:grid-cols-2 gap-12 items-center w-full">
        <div>
            <div class="flex items-center gap-3 mb-6">
                <x-icons.exclamation-triangle class="size-10 text-error" />
                <h1 class="text-3xl font-bold">{{ __('Oh no!') }}</h1>
            </div>
            <div role="alert" class="alert alert-error mb-6">
                <x-icons.exclamation-triangle class="size-5 shrink-0" />
                <span>{{ __('Something went wrong while completing your subscription.') }}</span>
            </div>
            <p class="text-base-content/70 mb-6">{{ __('Please try again.') }}</p>
            <a href="{{ url('order') }}" class="btn btn-primary gap-2">
                {{ __('Try again') }}
            </a>
        </div>
        <div class="hidden md:flex justify-center">
            <img src="{{ asset('images/error.png') }}" alt="{{ __('Error') }}" class="max-h-72 object-contain">
        </div>
    </div>
</div>

@endsection
