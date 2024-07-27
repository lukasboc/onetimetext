@php use phpDocumentor\Reflection\DocBlock\Tags\Author; @endphp
@extends('templates.main')

@section('content')
    <div class="px-4 py-5">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">Benutzerkonto löschen.</h1>
            <div class="text-lightgray">
                <p>Mit dem Löschen deines Benutzerkontos werden sämtliche OneTimeTexts und dein Benutzerkonto gelöscht. Ein Zugriff auf dieses Konto ist anschließend nicht mehr möglich.
                </p>
                <p>Wir bedanken uns bei dir für die Nutzung von OneTimeText!</p>
                <form method="POST" action="{{ route('deleteUser') }}">
                    @csrf
                    <div class="col-12">
                        <p>
                            <button class="btn btn-link link-danger p-0" type="submit">Benutzerkonto inkl. allen Daten unwiderruflich löschen
                            </button>
                        </p>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
