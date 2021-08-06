@extends('templates.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h1>Dein OneTimeText.</h1>
        </div>
    </div>

    <div class="card">
        <p></p>
    </div>

    <div class="row">
        <div class="col text-center">
            <button type="button" class="btn btn-md btn-primary mt-4 tex-center"
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
@endsection
