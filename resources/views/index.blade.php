@extends('templates.main')

@section('content')
    <h1>Neuer OneTimeText.</h1>

    <div class="card">
        <form method="POST" action="{{ route('text.secret.store') }}">
            @csrf
            <div class="mb-3">
                <label for="value" class="form-label">Text</label>
                <textarea name="value"  type="text" class="form-control @error('value') is-invalid @enderror" id="value" aria-describedby="value">{{ old('value') }}</textarea>
                @error('value')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
                @error('key')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
                @error('user_id')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
