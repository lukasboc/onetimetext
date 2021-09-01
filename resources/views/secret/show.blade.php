@extends('templates.main')

@section('content')
    <div class="px-4 py-5 text-center">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">Dein <span class="highlight-text">OneTimeText</span>.
            </h1>
            <div class="col-lg-7 mx-auto text-lightgray">
                <p class="fs-5 mb-4">Du hast einen OneTimeText erhalten. Dies ist eine Nachricht, die einmalig gelesen werden kann, bevor sie aus dem Speicher gelöscht wird. Klicke auf "OneTimeText öffnen", um die Nachricht zu lesen.</p>
            </div>

            <div class="row mt-5">
                <div class="col-sm-6 justify-content-center align-self-center">
                    <div class="card mb-4">
                        <p></p>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button type="button" class="btn btn-primary highlight-background px-4 py-2"
                                    onclick="event.preventDefault(); document.getElementById('delete-secret-form-{{ $secret->key }}').submit();">
                                OneTimeText öffnen
                            </button>
                            <div class="alert alert-info mt-4" role="alert">
                                Achtung: Nachdem der OneTimeText geöffnet wurde, wird die Nachricht zerstört und kann nicht mehr abgerufen werden.
                            </div>
                            <form id="delete-secret-form-{{ $secret->key }}" action="{{ route('text.secret.destroy', $secret->key) }}"
                                  method="POST" style="display: none">
                                @csrf
                                @method("DELETE")
                            </form>
                        </div>
                    </div>
                </div>
                <div class="justify-content-center align-self-center col-8 col-sm-6 mx-auto mx-sm-0 mt-5 mt-sm-0">
                    <img id="index-image" src="{{asset('images/secret.png')}}" alt="image">
                </div>
            </div>
    </div>

@endsection
