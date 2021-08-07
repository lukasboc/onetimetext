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
        @if(session('secreturl'))
            <div class="alert alert-success mt-4" role="alert">
                <p>Dein OneTineText wurde erstellt und ist unter folgendem Link erreichbar:</p>
                <p id="foo">{{ session('secreturl') }}</p>
            </div>

            <div class="row">
                <div class="col text-center">
                    <button id="copy-btn" class="btn btn-outline-primary mt-4" data-clipboard-target="#foo">
                        <i class="bi bi-clipboard-check"></i> <span id="copy-text">Kopieren</span>
                    </button>

            <script src="https://unpkg.com/clipboard@2/dist/clipboard.min.js"></script>
            <script>
                var successMessage = document.getElementById('copied');
                var btn = document.getElementById('copy-btn');
                var clipboard = new ClipboardJS(btn);

                clipboard.on('success', function (e) {
                    btn.classList.remove("btn-outline-primary");
                    btn.classList.add("btn-outline-success");
                    document.getElementById("copy-text").innerHTML= 'Kopiert!';
                    e.clearSelection();
                });

                clipboard.on('error', function (e) {
                    console.error('Action:', e.action);
                    console.error('Trigger:', e.trigger);
                });
            </script>
        @endif
    </div>
@endsection
