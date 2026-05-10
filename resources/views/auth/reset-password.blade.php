@extends('templates.main')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center py-12">
    <div class="card bg-base-200 shadow-xl w-full max-w-md">
        <div class="card-body gap-5">
            <div class="text-center">
                <h1 class="text-2xl font-bold">Passwort zurücksetzen.</h1>
                <p class="text-base-content/60 text-sm mt-1">Gib dein neues Passwort ein.</p>
            </div>

            <form method="POST" action="{{ url('reset-password') }}" class="flex flex-col gap-4">
                @csrf
                <input type="hidden" name="token" value="{{ $request->token }}">

                <div class="form-control gap-1">
                    <label class="label" for="email"><span class="label-text">E-Mail</span></label>
                    <input name="email" type="email" id="email"
                           class="input input-bordered w-full @error('email') input-error @enderror"
                           value="{{ $request->email }}" autocomplete="email" />
                    @error('email')
                        <p class="text-error text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-control gap-1">
                    <label class="label" for="password"><span class="label-text">Neues Passwort</span></label>
                    <input name="password" type="password" id="password"
                           class="input input-bordered w-full @error('password') input-error @enderror"
                           autocomplete="new-password" />
                    @error('password')
                        <p class="text-error text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-control gap-1">
                    <label class="label" for="password_confirmation"><span class="label-text">Passwort bestätigen</span></label>
                    <input name="password_confirmation" type="password" id="password_confirmation"
                           class="input input-bordered w-full"
                           autocomplete="new-password" />
                </div>

                <button type="submit" class="btn btn-primary w-full">Passwort aktualisieren</button>
            </form>
        </div>
    </div>
</div>
@endsection
