@extends('templates.main')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center py-12">
    <div class="card bg-base-200 shadow-xl w-full max-w-md">
        <div class="card-body gap-5">
            <div class="text-center">
                <h1 class="text-2xl font-bold">{{ __('Login') }}.</h1>
                <p class="text-base-content/60 text-sm mt-1">{{ __('Sign in to access the Pro area.') }}</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-4">
                @csrf
                <div class="form-control gap-1">
                    <label class="label" for="email"><span class="label-text">{{ __('Email') }}</span></label>
                    <input name="email" type="email" id="email"
                           class="input input-bordered w-full @error('email') input-error @enderror"
                           value="{{ old('email') }}" autocomplete="email" />
                    @error('email')
                        <p class="text-error text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-control gap-1">
                    <label class="label" for="password"><span class="label-text">{{ __('Password') }}</span></label>
                    <input name="password" type="password" id="password"
                           class="input input-bordered w-full @error('password') input-error @enderror"
                           autocomplete="current-password" />
                    @error('password')
                        <p class="text-error text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-full">{{ __('Login') }}</button>
            </form>

            <div class="divider text-base-content/40 text-xs">{{ __('No account?') }}</div>

            <div class="text-center text-sm flex flex-col gap-1">
                <a href="{{ url('/pro') }}" class="link link-primary">{{ __('Learn more about Pro') }}</a>
                <a href="{{ url('/forgot-password') }}" class="link link-hover text-base-content/50">{{ __('Forgot password') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
