@extends('templates.main')

@section('content')
    <section class="p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5">
                                        <h2 class="h4 text-center">Registrierung</h2>
                                        <h3 class="fs-6 fw-normal text-lightgray text-center m-0">Bitte registriere dich, um dein Upgrade durchzuführen.</h3>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row gy-3 overflow-hidden">
                                    <div class="col-12">
                                        <div class=" mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input name="name"  type="text" class="form-control form-element @error('name') is-invalid @enderror" id="name" aria-describedby="name" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class=" mb-3">
                                            <label for="email" class="form-label">E-Mail</label>
                                            <input name="email" type="email" class="form-control form-element @error('email') is-invalid @enderror" id="email" aria-describedby="email" value="{{ old('email') }}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class=" mb-3">
                                            <label for="password" class="form-label">Passwort</label>
                                            <input name="password" type="password" class="form-control form-element @error('password') is-invalid @enderror" id="password" aria-describedby="password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class=" mb-3">
                                            <label for="password_confirmation" class="form-label">Passwort bestätigen</label>
                                            <input name="password_confirmation" type="password" class="form-control form-element" id="password_confirmation" aria-describedby="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="iAgree" id="iAgree" required>
                                            <label class="form-check-label text-lightgray" for="iAgree">
                                                Ich akzeptiere die <a href="{{ url('/agb') }}" class="link-primary text-decoration-none">AGB</a> und habe die <a href="{{ url('/widerruf') }}" class="link-primary text-decoration-none">Widerrufsbelehrung</a> gelesen.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn bsb-btn-xl btn-primary" type="submit">Registrieren</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <p class="m-0 text-lightgray text-center">Du hast bereits einen Account?<br><a href="{{ route('login') }}" class="link-primary text-decoration-none">Zum Login</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
