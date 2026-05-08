@extends('templates.main')

@section('content')

<div class="py-8 max-w-2xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold">Dein Benutzerkonto.</h1>
        <p class="text-base-content/60 mt-1">
            Du nutzt OneTimeText als <span class="badge badge-primary">{{ $membership }}</span> Nutzer.
        </p>
    </div>

    {{-- Passwort ändern --}}
    <div class="collapse collapse-arrow bg-base-200 border border-base-300 mb-3">
        <input type="checkbox" checked />
        <div class="collapse-title font-semibold">Passwort ändern</div>
        <div class="collapse-content">
            <form method="POST" action="{{ route('user-password.update') }}" class="flex flex-col gap-4 pt-2">
                @method('PUT')
                @csrf
                <div class="form-control gap-1">
                    <label class="label" for="current_password"><span class="label-text">Aktuelles Passwort</span></label>
                    <input name="current_password" type="password" id="current_password"
                           class="input input-bordered @error('current_password', 'updatePassword') input-error @enderror" />
                    @error('current_password', 'updatePassword')
                        <p class="text-error text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-control gap-1">
                    <label class="label" for="new_password"><span class="label-text">Neues Passwort</span></label>
                    <input name="password" type="password" id="new_password"
                           class="input input-bordered @error('password', 'updatePassword') input-error @enderror" />
                    @error('password', 'updatePassword')
                        <p class="text-error text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-control gap-1">
                    <label class="label" for="password_confirmation"><span class="label-text">Passwort bestätigen</span></label>
                    <input name="password_confirmation" type="password" id="password_confirmation"
                           class="input input-bordered" />
                </div>
                @if(session('status') === 'password-updated')
                    <div role="alert" class="alert alert-success">
                        <x-icons.check class="size-4 shrink-0" />
                        <span>Das Passwort wurde geändert.</span>
                    </div>
                @endif
                <div>
                    <button type="submit" class="btn btn-primary">Passwort ändern</button>
                </div>
            </form>
        </div>
    </div>

    {{-- E-Mail ändern --}}
    <div class="collapse collapse-arrow bg-base-200 border border-base-300 mb-3">
        <input type="checkbox" />
        <div class="collapse-title font-semibold">E-Mail-Adresse ändern</div>
        <div class="collapse-content">
            <div class="flex flex-col gap-4 pt-2">
                <div class="form-control gap-1">
                    <label class="label"><span class="label-text">Aktuelle E-Mail</span></label>
                    <input type="email" class="input input-bordered"
                           value="{{ old('email') ?? auth()->user()->email }}" readonly />
                </div>
                <form method="POST" action="{{ route('user-profile-information.update') }}" class="flex flex-col gap-4">
                    @method('PUT')
                    @csrf
                    <input name="name" type="hidden" value="{{ old('name') ?? auth()->user()->name }}" />
                    <div class="form-control gap-1">
                        <label class="label" for="email"><span class="label-text">Neue E-Mail</span></label>
                        <input name="email" type="email" id="email"
                               class="input input-bordered @error('email') input-error @enderror" />
                        @error('email')
                            <p class="text-error text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    @if(session('status') === 'profile-information-updated')
                        <div role="alert" class="alert alert-success">
                            <x-icons.check class="size-4 shrink-0" />
                            <span>Deine E-Mail wurde geändert. Bitte nutze in Zukunft die neue E-Mail für den Login.</span>
                        </div>
                    @endif
                    <div>
                        <button type="submit" class="btn btn-primary">E-Mail ändern</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Abonnement --}}
    <div class="collapse collapse-arrow bg-base-200 border border-base-300 mb-3">
        <input type="checkbox" />
        <div class="collapse-title font-semibold">Abonnement kündigen oder ändern</div>
        <div class="collapse-content pt-2">
            <p class="text-base-content/70">
                Du kannst dein Abo über das
                <a class="link link-info" href="{{ url('/billing-portal') }}">Kundenportal</a>
                ändern oder kündigen.
            </p>
        </div>
    </div>

    {{-- Konto löschen --}}
    <div class="collapse collapse-arrow bg-base-200 border border-base-300 mb-3">
        <input type="checkbox" />
        <div class="collapse-title font-semibold text-error">Benutzerkonto löschen</div>
        <div class="collapse-content pt-2">
            @if(!auth()->user()->subscription()->canceled())
                <div role="alert" class="alert alert-warning">
                    <x-icons.exclamation-triangle class="size-5 shrink-0" />
                    <div>
                        <p>Um dein Benutzerkonto zu löschen, musst du zunächst dein Abo über das
                            <a class="link link-info" href="{{ url('/billing-portal') }}">Kundenportal</a> kündigen.
                        </p>
                    </div>
                </div>
            @else
                <p class="text-base-content/70 mb-3">
                    Dein Abo ist bereits gekündigt und wird zum <strong>{{ $endDate }}</strong> beendet.
                </p>
                <p class="text-base-content/70 mb-4">
                    Durch das Löschen deines Benutzerkontos verlierst du sofort Zugriff auf dein Dashboard.
                    Sämtliche OneTimeTexts werden unwiederbringlich gelöscht.
                </p>
                <a href="{{ url('/delete-user') }}" class="btn btn-error gap-2">
                    <x-icons.trash class="size-4" />
                    Benutzerkonto löschen
                </a>
            @endif
        </div>
    </div>
</div>

@endsection
