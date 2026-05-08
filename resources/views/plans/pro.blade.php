@extends('templates.main')

@section('content')

<div class="py-12">
    <div class="text-center mb-12">
        <p class="text-sm uppercase tracking-widest text-base-content/50 mb-2">Für alle, die mehr wollen</p>
        <h1 class="text-4xl font-bold"><span class="text-primary">OneTimeText</span> Preise.</h1>
    </div>

    {{-- Pricing Cards --}}
    <div class="grid md:grid-cols-3 gap-6 mb-16">

        {{-- Free --}}
        <div class="card bg-base-200 shadow-lg">
            <div class="card-body gap-4">
                <div>
                    <h2 class="card-title text-xl">Kostenlos</h2>
                    <div class="flex items-end gap-1 mt-2">
                        <span class="text-4xl font-bold">0,00 €</span>
                        <span class="text-base-content/50 mb-1">/ Monat</span>
                    </div>
                </div>
                <p class="text-base-content/60 text-sm">Nutzung ohne Konto, ohne Verbindlichkeiten.</p>
                <ul class="flex flex-col gap-2 text-sm">
                    <li class="flex items-center gap-2">
                        <x-icons.check class="size-4 text-success shrink-0" />
                        unbegrenzt viele OneTimeTexts
                    </li>
                    <li class="flex items-center gap-2 text-base-content/40">
                        <x-icons.check class="size-4 shrink-0" />
                        bis zu 2.000 Zeichen
                    </li>
                    <li class="flex items-center gap-2 text-base-content/40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                        eigenes Dashboard
                    </li>
                    <li class="flex items-center gap-2 text-base-content/40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                        Whitelabeling
                    </li>
                </ul>
                <div class="card-actions mt-2">
                    <button class="btn btn-ghost btn-outline w-full" disabled>Ohne Konto möglich</button>
                </div>
            </div>
        </div>

        {{-- Pro --}}
        <div class="card bg-primary/10 border border-primary shadow-xl ring-2 ring-primary">
            <div class="card-body gap-4">
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <h2 class="card-title text-xl text-primary">Pro</h2>
                        <span class="badge badge-primary badge-sm">Empfohlen</span>
                    </div>
                    <div class="flex items-end gap-1 mt-2">
                        <span class="text-4xl font-bold">4,99 €</span>
                        <span class="text-base-content/50 mb-1">/ Monat</span>
                    </div>
                </div>
                <p class="text-base-content/60 text-sm">Schaltet ein individuelles Dashboard frei und garantiert Verfügbarkeit.</p>
                <ul class="flex flex-col gap-2 text-sm">
                    <li class="flex items-center gap-2">
                        <x-icons.check class="size-4 text-success shrink-0" />
                        unbegrenzt viele OneTimeTexts
                    </li>
                    <li class="flex items-center gap-2">
                        <x-icons.check class="size-4 text-success shrink-0" />
                        bis zu 10.000 Zeichen pro Nachricht
                    </li>
                    <li class="flex items-center gap-2">
                        <x-icons.check class="size-4 text-success shrink-0" />
                        eigenes Dashboard
                    </li>
                    <li class="flex items-center gap-2 text-base-content/40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                        Whitelabeling
                    </li>
                </ul>
                <div class="card-actions mt-2">
                    <a href="{{ route('register') }}" class="btn btn-primary w-full">Zur Registrierung</a>
                </div>
            </div>
        </div>

        {{-- Enterprise --}}
        <div class="card bg-base-200 shadow-lg">
            <div class="card-body gap-4">
                <div>
                    <h2 class="card-title text-xl">Enterprise</h2>
                    <div class="flex items-end gap-1 mt-2">
                        <span class="text-4xl font-bold">auf Anfrage</span>
                    </div>
                </div>
                <p class="text-base-content/60 text-sm">Eine eigene Instanz von OneTimeText mit Whitelabeling.</p>
                <ul class="flex flex-col gap-2 text-sm">
                    <li class="flex items-center gap-2">
                        <x-icons.check class="size-4 text-success shrink-0" />
                        unbegrenzt viele OneTimeTexts
                    </li>
                    <li class="flex items-center gap-2">
                        <x-icons.check class="size-4 text-success shrink-0" />
                        eigenes Dashboard
                    </li>
                    <li class="flex items-center gap-2">
                        <x-icons.check class="size-4 text-success shrink-0" />
                        Whitelabeling
                    </li>
                </ul>
                <div class="card-actions mt-2">
                    <a href="{{ url('/contact') }}" class="btn btn-ghost btn-outline w-full">Kontakt aufnehmen</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Info-Bereich --}}
    <div class="border-t border-base-300 pt-16">
        <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <h2 class="text-2xl font-bold mb-4">Was ist OneTimeText Pro?</h2>
                <p class="text-base-content/70 leading-relaxed">
                    Das OneTimeText Pro Abonnement erweitert die Basisfunktionalitäten um ein Dashboard zur Verfolgung
                    erstellter OneTimeTexts. Nutzer*innen erhalten eine tabellarische Darstellung sämtlicher OneTimeTexts,
                    die sie erstellt haben und noch nicht von Empfänger*innen geöffnet wurden.
                </p>
            </div>
            <div class="flex justify-center">
                <img src="{{ asset('images/panel.png') }}" alt="Dashboard" class="max-h-64 object-contain">
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="hidden md:flex justify-center order-first">
                <img src="{{ asset('images/how.png') }}" alt="Wie erhalte ich Zugriff" class="max-h-64 object-contain">
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-4">Wie erhalte ich Zugriff?</h2>
                <p class="text-base-content/70 leading-relaxed mb-3">
                    Um OneTimeText Pro nutzen zu können, muss ein kostenpflichtiges Abonnement abgeschlossen werden.
                    Der Preis beträgt 4,99 € pro Monat. Die Mindestvertragslaufzeit beträgt einen Monat.
                </p>
                <p class="text-base-content/70">
                    Um auf Pro zu wechseln, musst du dich zunächst
                    <a href="{{ route('register') }}" class="link link-primary">registrieren</a>.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
