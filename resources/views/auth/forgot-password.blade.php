@extends('templates.main')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center py-12">
    <div class="card bg-base-200 shadow-xl w-full max-w-md">
        <div class="card-body gap-5">
            <div class="text-center">
                <h1 class="text-2xl font-bold">Passwort vergessen.</h1>
                <p class="text-base-content/60 text-sm mt-1">
                    Gib deine E-Mail-Adresse ein – du erhältst einen Link zum Zurücksetzen per Mail.
                </p>
            </div>

            @if(session('status'))
                <div role="alert" class="alert alert-success">
                    <x-icons.check class="size-5 shrink-0" />
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-4">
                @csrf
                <div class="form-control gap-1">
                    <label class="label" for="email"><span class="label-text">E-Mail</span></label>
                    <input name="email" type="email" id="email"
                           class="input input-bordered w-full @error('email') input-error @enderror"
                           autocomplete="email" />
                    @error('email')
                        <p class="text-error text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-full">Link zusenden</button>
            </form>

            <div class="text-center text-sm">
                <a href="{{ url('/login') }}" class="link link-hover text-base-content/50">Zurück zum Login</a>
            </div>
        </div>
    </div>
</div>
@endsection
