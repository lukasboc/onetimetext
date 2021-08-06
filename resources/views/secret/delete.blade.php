@extends('templates.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h1 >Dein OneTimeText.</h1>
        </div>
    </div>

    <div class="card">
        <p>{{ $secret->value }}</p>
    </div>

    <button type="button" class="btn btn-sm btn-danger"
            onclick="event.preventDefault(); document.getElementById('delete-secret-form-{{ $secret->key }}').submit();">
        Delete
    </button>
    <form id="delete-secret-form-{{ $secret->key }}" action="{{ route('text.secret.destroy', $secret->key) }}"
          method="POST" style="display: none">
        @csrf
        @method("DELETE")
    </form>
@endsection
