@php use phpDocumentor\Reflection\DocBlock\Tags\Author; @endphp
@extends('templates.main')

@section('content')
    <div class="px-4 py-5">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">Dein Benutzerkonto.</h1>
            <div class="text-lightgray">
                <p>Du hast OneTimeText als {{ $membership }} Nutzer abonniert.<br>
                </p>

                <div class="accordion" id="accordionExample">
                    <div class="accordion-item bg-transparent text-white">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Passwort ändern
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">


                                <div class="">
                                    <div class="card-body p-3 p-md-4 p-xl-5">
                                        <form method="POST" action="{{ route('user-password.update') }}">
                                            @method("PUT")
                                            @csrf
                                            <div class="row gy-3 overflow-hidden">

                                                <div class="col-12">
                                                    <div class=" mb-3">
                                                        <label for="current_password" class="form-label">Aktuelles Passwort</label>
                                                        <input name="current_password" type="password"
                                                               class="form-control form-element @error('current_password', 'updatePassword') is-invalid @enderror"
                                                               id="current_password" aria-describedby="password"
                                                               value="{{ old('current_password') }}">
                                                        @error('current_password', 'updatePassword')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class=" mb-3">
                                                        <label for="password" class="form-label">Neues Passwort</label>
                                                        <input name="password" type="password"
                                                               class="form-control form-element @error('password', 'updatePassword') is-invalid @enderror"
                                                               id="password" aria-describedby="password">
                                                        @error('password', 'updatePassword')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class=" mb-3">
                                                        <label for="password_confirmation" class="form-label">Passwort Bestätigung</label>
                                                        <input name="password_confirmation" type="password"
                                                               class="form-control form-element @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                                                               id="password_confirmation" aria-describedby="password_confirmation">
                                                        @error('password_confirmation', 'updatePassword')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                @if(session('status') === 'password-updated')
                                                    <div class="col-12">
                                                        <p class="text-success">Das Passwort wurde geändert.</p>
                                                    </div>
                                                @endif
                                                <div class="col-12">
                                                    <div class="text-center">
                                                        <button class="btn bsb-btn-xl btn-primary" type="submit">Passwort ändern
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-transparent text-white">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                E-Mail Adresse ändern
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">


                                <div class="">
                                    <div class="card-body p-3 p-md-4 p-xl-5">
                                            <div class="row gy-3 overflow-hidden">
                                                <div class="col-12">
                                                    <div class=" mb-3">
                                                        <label for="current_email" class="form-label">Aktuelle E-Mail</label>
                                                        <input name="current_email" type="email"
                                                               class="form-control form-element"
                                                               id="current_email" aria-describedby="current_email"
                                                               value="{{ old('email') ?? auth()->user()->email }}" readonly>
                                                        @error('current_password', 'updatePassword')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <form method="POST" action="{{ route('user-profile-information.update') }}">
                                                    @method("PUT")
                                                    @csrf
                                                    <input name="name" type="hidden"
                                                           id="name"
                                                           value="{{ old('name') ?? auth()->user()->name }}" readonly>
                                                <div class="col-12">
                                                    <div class=" mb-3">
                                                        <label for="email" class="form-label">Neue E-Mail</label>
                                                        <input name="email" type="email"
                                                               class="form-control form-element @error('email') is-invalid @enderror"
                                                               id="email" aria-describedby="email">
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                    @if(session('status') === 'profile-information-updated')
                                                        <div class="col-12">
                                                            <p class="text-success">Deine E-Mail wurde geändert. Bitte nutze in Zukunft die neue E-Mail für den Login.</p>
                                                        </div>
                                                    @endif
                                                <div class="col-12">
                                                    <div class="text-center">
                                                        <button class="btn bsb-btn-xl btn-primary" type="submit">E-Mail ändern
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-transparent text-white">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Abonnement kündigen oder ändern
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Du kannst dein Abo über das <a class="link-info" href="{{ url('/billing-portal') }}">Kundenportal</a> ändern oder Kündigen.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-transparent text-white">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Benutzerkonto löschen
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            @if(!auth()->user()->subscription()->cancelled())
                                    <p>
                                        Um dein Benutzerkonto zu löschen musst du zunächst dein Abo über das <a class="link-info" href="{{ url('/billing-portal') }}">Kundenportal</a> kündigen.
                                    </p>
                                @else
                                    <p>
                                        Dein Abo ist bereits gekündigt und wird nicht automatisch verlängert. Die Kündigung ist zum {{ $endDate }} vorgemerkt.
                                    </p>
                                    <p>
                                        Durch das Löschen deines Benutzerkontos verlierst du sofort Zugriff auf dein Dashboard und wirst abgemeldet. Zudem werden sämtliche OneTimeTexts, die du erstellt hast, sofort gelöscht. <a class="link-danger" href="{{ url('/delete-user') }}">Benutzerkonto löschen</a>
                                    </p>
                                @endif

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
