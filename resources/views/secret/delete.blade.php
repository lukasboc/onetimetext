@extends('templates.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h1 >Dein OneTimeText.</h1>
        </div>
    </div>
    <div class="card">
        <p id="foo">{{ $secret->value }}</p>
    </div>


    <div class="row">
        <div class="col text-center">
    <button id="copy-btn" class="btn btn-outline-primary mt-4" data-clipboard-target="#foo">
        <i class="bi bi-clipboard-check"></i> Kopieren
    </button>


        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-8">
            <div class="alert alert-info mt-4 d-none" id="copied" role="alert">
                Die Nachricht wurde kopiert. Vielen Dank für die Nutzung von OneTimeText.
            </div>
        </div>
        <div class="col"></div>
    </div>

    <script src="https://unpkg.com/clipboard@2/dist/clipboard.min.js"></script>
    <script>
        var successMessage = document.getElementById('copied');
        var btn = document.getElementById('copy-btn');
        var clipboard = new ClipboardJS(btn);

        clipboard.on('success', function (e) {
            successMessage.classList.remove("d-none");
            e.clearSelection();
        });

        clipboard.on('error', function (e) {
            console.error('Action:', e.action);
            console.error('Trigger:', e.trigger);
        });
    </script>
    <script>

    </script>
@endsection
