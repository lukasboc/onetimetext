@extends('templates.main')

@section('content')

<div class="min-h-[60vh] flex items-center justify-center py-12">
    <div class="card bg-base-200 shadow-xl w-full max-w-md">
        <div class="card-body gap-5">
            <div class="flex items-center gap-3">
                <x-icons.exclamation-triangle class="size-8 text-error" />
                <h1 class="text-2xl font-bold">Benutzerkonto löschen.</h1>
            </div>

            <div role="alert" class="alert alert-error">
                <x-icons.exclamation-triangle class="size-5 shrink-0" />
                <div>
                    <p class="font-semibold">Diese Aktion ist unwiderruflich.</p>
                    <p class="text-sm opacity-80 mt-1">
                        Mit dem Löschen werden sämtliche OneTimeTexts und dein Benutzerkonto dauerhaft gelöscht.
                        Ein Zugriff auf dieses Konto ist anschließend nicht mehr möglich.
                    </p>
                </div>
            </div>

            <p class="text-base-content/60 text-sm">Wir bedanken uns bei dir für die Nutzung von OneTimeText!</p>

            <form method="POST" action="{{ route('deleteUser') }}" class="flex flex-col gap-3">
                @csrf
                <button type="submit" class="btn btn-error w-full gap-2">
                    <x-icons.trash class="size-4" />
                    Benutzerkonto inkl. allen Daten unwiderruflich löschen
                </button>
                <a href="{{ url('/membership') }}" class="btn btn-ghost w-full">Abbrechen</a>
            </form>
        </div>
    </div>
</div>

@endsection
