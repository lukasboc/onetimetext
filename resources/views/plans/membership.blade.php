@extends('templates.main')

@section('content')

<div class="py-8 max-w-2xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold">{{ __('Your account.') }}</h1>
        <p class="text-base-content/60 mt-1">
            {!! __('You are using :app as a :badge user.', [
                'app' => e(env('APP_NAME', 'OneTimeText')),
                'badge' => '<span class="badge badge-primary">' . e($membership) . '</span>',
            ]) !!}
        </p>
    </div>

    {{-- Passwort ändern --}}
    <div class="collapse collapse-arrow bg-base-200 border border-base-300 mb-3">
        <input type="checkbox" checked />
        <div class="collapse-title font-semibold">{{ __('Change password') }}</div>
        <div class="collapse-content">
            <form method="POST" action="{{ route('user-password.update') }}" class="flex flex-col gap-4 pt-2">
                @method('PUT')
                @csrf
                <div class="form-control gap-1">
                    <label class="label" for="current_password"><span class="label-text">{{ __('Current password') }}</span></label>
                    <input name="current_password" type="password" id="current_password"
                           class="input input-bordered @error('current_password', 'updatePassword') input-error @enderror" />
                    @error('current_password', 'updatePassword')
                        <p class="text-error text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-control gap-1">
                    <label class="label" for="new_password"><span class="label-text">{{ __('New password') }}</span></label>
                    <input name="password" type="password" id="new_password"
                           class="input input-bordered @error('password', 'updatePassword') input-error @enderror" />
                    @error('password', 'updatePassword')
                        <p class="text-error text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-control gap-1">
                    <label class="label" for="password_confirmation"><span class="label-text">{{ __('Confirm password') }}</span></label>
                    <input name="password_confirmation" type="password" id="password_confirmation"
                           class="input input-bordered" />
                </div>
                @if(session('status') === 'password-updated')
                    <div role="alert" class="alert alert-success">
                        <x-icons.check class="size-4 shrink-0" />
                        <span>{{ __('The password has been changed.') }}</span>
                    </div>
                @endif
                <div>
                    <button type="submit" class="btn btn-primary">{{ __('Change password') }}</button>
                </div>
            </form>
        </div>
    </div>

    {{-- E-Mail ändern --}}
    <div class="collapse collapse-arrow bg-base-200 border border-base-300 mb-3">
        <input type="checkbox" />
        <div class="collapse-title font-semibold">{{ __('Change email address') }}</div>
        <div class="collapse-content">
            <div class="flex flex-col gap-4 pt-2">
                <div class="form-control gap-1">
                    <label class="label"><span class="label-text">{{ __('Current email') }}</span></label>
                    <input type="email" class="input input-bordered"
                           value="{{ old('email') ?? auth()->user()->email }}" readonly />
                </div>
                <form method="POST" action="{{ route('user-profile-information.update') }}" class="flex flex-col gap-4">
                    @method('PUT')
                    @csrf
                    <input name="name" type="hidden" value="{{ old('name') ?? auth()->user()->name }}" />
                    <div class="form-control gap-1">
                        <label class="label" for="email"><span class="label-text">{{ __('New email') }}</span></label>
                        <input name="email" type="email" id="email"
                               class="input input-bordered @error('email') input-error @enderror" />
                        @error('email')
                            <p class="text-error text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    @if(session('status') === 'profile-information-updated')
                        <div role="alert" class="alert alert-success">
                            <x-icons.check class="size-4 shrink-0" />
                            <span>{{ __('Your email has been changed. Please use the new email for future logins.') }}</span>
                        </div>
                    @endif
                    <div>
                        <button type="submit" class="btn btn-primary">{{ __('Change email') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Abonnement --}}
    <div class="collapse collapse-arrow bg-base-200 border border-base-300 mb-3">
        <input type="checkbox" />
        <div class="collapse-title font-semibold">{{ __('Cancel or change subscription') }}</div>
        <div class="collapse-content pt-2">
            <p class="text-base-content/70">
                {!! __('You can change or cancel your subscription via the :portal.', [
                    'portal' => '<a class="link link-info" href="' . url('/billing-portal') . '">' . __('customer portal') . '</a>',
                ]) !!}
            </p>
        </div>
    </div>

    {{-- Konto löschen --}}
    <div class="collapse collapse-arrow bg-base-200 border border-base-300 mb-3">
        <input type="checkbox" />
        <div class="collapse-title font-semibold text-error">{{ __('Delete account') }}</div>
        <div class="collapse-content pt-2">
            @if(!auth()->user()->subscription()->canceled())
                <div role="alert" class="alert alert-warning">
                    <x-icons.exclamation-triangle class="size-5 shrink-0" />
                    <div>
                        <p>{!! __('To delete your account, you must first cancel your subscription via the :portal.', [
                            'portal' => '<a class="link link-info" href="' . url('/billing-portal') . '">' . __('customer portal') . '</a>',
                        ]) !!}</p>
                    </div>
                </div>
            @else
                <p class="text-base-content/70 mb-3">
                    {!! __('Your subscription has already been cancelled and will end on :date.', [
                        'date' => '<strong>' . e($endDate) . '</strong>',
                    ]) !!}
                </p>
                <p class="text-base-content/70 mb-4">
                    {{ __('Deleting your account immediately revokes access to your dashboard. All :app messages will be permanently deleted.', ['app' => env('APP_NAME', 'OneTimeText')]) }}
                </p>
                <a href="{{ url('/delete-user') }}" class="btn btn-error gap-2">
                    <x-icons.trash class="size-4" />
                    {{ __('Delete account') }}
                </a>
            @endif
        </div>
    </div>
</div>

@endsection
