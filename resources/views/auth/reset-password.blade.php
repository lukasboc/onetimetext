

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
                                        <h2 class="h4 text-center">Passwort zurücksetzen.</h2>
                                        <h3 class="fs-6 fw-normal text-lightgray text-center m-0">Logge dich ein, um in den Pro-Bereich zu gelangen.</h3>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{ url('reset-password') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $request->token }}">
                                <div class="row gy-3 overflow-hidden">

                                    <div class="col-12">
                                        <div class=" mb-3">
                                            <label for="email" class="form-label">E-Mail</label>
                                            <input name="email" type="email" class="form-control form-element @error('email') is-invalid @enderror" id="email" aria-describedby="email" value="{{ $request->email }}">
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
                                            <input name="password" type="password"
                                                   class="form-control form-element @error('password') is-invalid @enderror"
                                                   id="password" aria-describedby="password">
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
                                            <input name="password_confirmation" type="password"
                                                   class="form-control form-element @error('password_confirmation') is-invalid @enderror"
                                                   id="password_confirmation" aria-describedby="password_confirmation">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn bsb-btn-xl btn-primary" type="submit">Passwort aktualisieren
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
    </section>
@endsection
