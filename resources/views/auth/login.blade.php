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
                                        <h2 class="h4 text-center">Login.</h2>
                                        <h3 class="fs-6 fw-normal text-lightgray text-center m-0">Logge dich ein, um in den Pro-Bereich zu gelangen.</h3>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row gy-3 overflow-hidden">

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
                                        <div class="d-grid">
                                            <button class="btn bsb-btn-xl btn-primary" type="submit">Login
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <hr class="mt-5 mb-4 border-secondary-subtle">
                                        <p class="m-0 pb-2 text-lightgray text-center">Noch kein Pro-Abo? <a href="{{ url('/pro') }}" class="link-primary text-decoration-none">Mehr zu Pro</a></p>
                                        <p class="m-0 text-lightgray text-center">Ich habe mein <a href="{{ url('/forgot-password') }}" class="link-primary text-decoration-none">Passwort vergessen</a></p>
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
