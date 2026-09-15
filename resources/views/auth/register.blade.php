@extends('templates.main')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center py-12">
    <div class="card bg-base-200 shadow-xl w-full max-w-md">
        <div class="card-body gap-5">
            <div class="text-center">
                <h1 class="text-2xl font-bold">{{ __('Registration') }}.</h1>
                <p class="text-base-content/60 text-sm mt-1">{{ __('Please register to complete your upgrade.') }}</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-4">
                @csrf
                @honeypot
                <div class="form-control gap-1">
                    <label class="label" for="name"><span class="label-text">{{ __('Name') }}</span></label>
                    <input name="name" type="text" id="name"
                           class="input input-bordered w-full @error('name') input-error @enderror"
                           value="{{ old('name') }}" autocomplete="name" />
                    @error('name')
                        <p class="text-error text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

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
                           autocomplete="new-password" />
                    @error('password')
                        <p class="text-error text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-control gap-1">
                    <label class="label" for="password_confirmation"><span class="label-text">{{ __('Confirm password') }}</span></label>
                    <input name="password_confirmation" type="password" id="password_confirmation"
                           class="input input-bordered w-full"
                           autocomplete="new-password" />
                </div>

                <div class="flex items-start gap-3">
                    <input type="checkbox" name="iAgree" id="iAgree" class="checkbox checkbox-primary shrink-0 mt-0.5" required />
                    <label for="iAgree" class="text-base-content/70 text-sm cursor-pointer">
                        {!! __('I accept the :terms and have read the :revocation.', [
                            'terms' => '<a href="' . url(app()->getLocale() === 'en' ? '/terms' : '/agb') . '" class="link link-primary">' . __('Terms') . '</a>',
                            'revocation' => '<a href="' . url(app()->getLocale() === 'en' ? '/revocation' : '/widerruf') . '" class="link link-primary">' . __('revocation notice') . '</a>',
                        ]) !!}
                    </label>
                </div>

                <button type="submit" class="btn btn-primary w-full">{{ __('Register') }}</button>
            </form>

            <div class="divider text-base-content/40 text-xs">{{ __('Already registered?') }}</div>

            <div class="text-center text-sm">
                <a href="{{ route('login') }}" class="link link-primary">{{ __('Go to login') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
