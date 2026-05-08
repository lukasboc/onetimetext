@extends('templates.main')

@section('content')

<div class="min-h-[70vh] flex flex-col items-center justify-center py-12">

    <div class="w-full max-w-lg text-center">

        {{-- Heading --}}
        <div class="mb-8">
            <div class="flex justify-center mb-4">
                <div class="p-4 rounded-full bg-primary/10 border border-primary/30">
                    <x-icons.lock-closed class="size-12 text-primary" />
                </div>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold mb-3">
                Du hast eine geheime<br>Nachricht erhalten.
            </h1>
            <p class="text-base-content/60 text-base">
                Jemand hat dir einen <strong class="text-base-content">OneTimeText</strong> geschickt.
            </p>
        </div>

        {{-- Warnung --}}
        <div role="alert" class="alert alert-warning mb-8 text-left">
            <x-icons.exclamation-triangle class="size-6 shrink-0" />
            <div>
                <p class="font-semibold">Achtung: Diese Nachricht kann nur einmal geöffnet werden.</p>
                <p class="text-sm opacity-80 mt-1">Nach dem Öffnen wird die Nachricht unwiederbringlich gelöscht und kann nicht erneut abgerufen werden.</p>
            </div>
        </div>

        {{-- Öffnen-Button --}}
        <button
            type="button"
            class="btn btn-primary btn-lg w-full gap-3 text-lg"
            onclick="event.preventDefault(); document.getElementById('delete-secret-form-{{ $secret->key }}').submit();"
        >
            <x-icons.lock-open class="size-6" />
            OneTimeText jetzt öffnen
        </button>

        <p class="text-xs text-base-content/40 mt-4">
            Mit dem Klick auf den Button wird die Nachricht geladen und danach dauerhaft gelöscht.
        </p>

        <form id="delete-secret-form-{{ $secret->key }}"
              action="{{ route('text.secret.destroy', $secret->key) }}"
              method="POST"
              class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</div>

@endsection
