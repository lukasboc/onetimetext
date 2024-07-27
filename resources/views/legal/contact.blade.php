@extends('templates.main')

@section('content')
    <div class="px-4 py-5">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">Kontakt.</h1>
            <div class="text-lightgray">

                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            @if(isset($sent) && $sent === 1)
                                <div class="alert alert-success" role="alert">
                                    Deine Anfrage wurde verschickt. Danke für dein Interesse!
                                </div>
                            @endif
                            <form method="POST" action="{{ route('sendContactMessage') }}">
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
                                            <label for="subject" class="form-label">Betreff</label>
                                            <input name="subject" type="text"
                                                   class="form-control form-element @error('subject') is-invalid @enderror"
                                                   id="subject" aria-describedby="subject">
                                            @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class=" mb-3">
                                            <label for="password" class="form-label">Nachricht</label>

                                            <textarea name="message" type="text" class="form-control @error('message') is-invalid @enderror"
                                                      id="message" aria-describedby="message"
                                                      placeholder="Tippe deine Nachricht hier ein ..."
                                                      rows="5">{{ old('message') }}</textarea>
                                            @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class=" mb-3">
                                            <label for="name" class="form-label">Was ist 3 + 3?</label>
                                            <input name="name" type="text"
                                                   class="form-control form-element @error('name') is-invalid @enderror"
                                                   id="name" aria-describedby="name">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-center">
                                            <button class="btn btn-highlight" type="submit">Nachricht absenden</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="align-content-center align-self-right d-none d-lg-block col-12 col-lg-6 p-5">
                            <h3>Fragen, Anregungen oder Kommentare?</h3>
                            <p class="mb-5 ">Nutze das Kontaktformular um Antworten zu erhalten. Auch Featurewünsche sind gern gesehen!</p>

                            <img class="index-image" src="{{asset('images/contact.png')}}" alt="image">
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
