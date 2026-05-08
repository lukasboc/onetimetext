@extends('templates.main')

@section('content')

<div class="py-8 max-w-2xl mx-auto">

    <div class="flex items-center gap-3 mb-6">
        <x-icons.lock-open class="size-8 text-success" />
        <h1 class="text-3xl font-bold">
            Dein <span class="text-primary">OneTimeText</span>.
        </h1>
    </div>

    <div role="alert" class="alert alert-success mb-6">
        <x-icons.check class="size-5 shrink-0" />
        <span>Die Nachricht wurde erfolgreich geöffnet und wird nun aus dem System gelöscht.</span>
    </div>

    <div class="card bg-base-200 shadow-xl">
        <div class="card-body">
            <p class="text-sm text-base-content/50 uppercase tracking-wider mb-3">Nachrichteninhalt</p>
            <div id="secret-content" class="whitespace-pre-wrap text-base-content leading-relaxed font-mono text-sm bg-base-300 rounded-lg p-4">
                {!! nl2br(e($secret->value)) !!}
            </div>

            <div class="card-actions justify-end mt-4">
                <button id="copy-btn" class="btn btn-primary gap-2">
                    <x-icons.clipboard class="size-4" />
                    <span id="copy-text">Kopieren</span>
                </button>
            </div>

            <div role="alert" id="copied-alert" class="alert alert-success mt-4 hidden">
                <x-icons.check class="size-5 shrink-0" />
                <span>Die Nachricht wurde kopiert. Vielen Dank für die Nutzung von OneTimeText.</span>
            </div>
        </div>
    </div>

    <div class="text-center mt-8">
        <a href="{{ url('/') }}" class="btn btn-ghost gap-2">
            <x-icons.link class="size-4" />
            Neuen OneTimeText erstellen
        </a>
    </div>
</div>

<script src="https://unpkg.com/clipboard@2/dist/clipboard.min.js"></script>
<script>
    var clipboard = new ClipboardJS('#copy-btn', {
        text: function() {
            return document.getElementById('secret-content').innerText;
        }
    });
    clipboard.on('success', function(e) {
        document.getElementById('copy-text').textContent = '✓ Kopiert!';
        document.getElementById('copied-alert').classList.remove('hidden');
        e.clearSelection();
    });
</script>

@endsection
