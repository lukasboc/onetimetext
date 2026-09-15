@extends('templates.main')

@section('content')

<div class="min-h-[60vh] flex items-center justify-center py-12">
    <div class="card bg-base-200 shadow-xl w-full max-w-md">
        <div class="card-body gap-5">
            <div class="flex items-center gap-3">
                <x-icons.exclamation-triangle class="size-8 text-error" />
                <h1 class="text-2xl font-bold">{{ __('Delete account.') }}</h1>
            </div>

            <div role="alert" class="alert alert-error">
                <x-icons.exclamation-triangle class="size-5 shrink-0" />
                <div>
                    <p class="font-semibold">{{ __('This action cannot be undone.') }}</p>
                    <p class="text-sm opacity-80 mt-1">
                        {{ __('Deleting will permanently remove all your :app messages and your user account. Access to this account will no longer be possible.', ['app' => env('APP_NAME', 'OneTimeText')]) }}
                    </p>
                </div>
            </div>

            <p class="text-base-content/60 text-sm">{{ __('Thank you for using :app!', ['app' => env('APP_NAME', 'OneTimeText')]) }}</p>

            <form method="POST" action="{{ route('deleteUser') }}" class="flex flex-col gap-3">
                @csrf
                <button type="submit" class="btn btn-error w-full gap-2">
                    <x-icons.trash class="size-4" />
                    {{ __('Permanently delete account incl. all data') }}
                </button>
                <a href="{{ url('/membership') }}" class="btn btn-ghost w-full">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
</div>

@endsection
