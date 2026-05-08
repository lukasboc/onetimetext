@extends('templates.main')

@section('content')

<div class="min-h-[60vh] flex items-center py-12">
    <div class="grid md:grid-cols-2 gap-12 items-center w-full">
        <div>
            <div class="flex items-center gap-3 mb-6">
                <x-icons.check class="size-10 text-success" />
                <h1 class="text-3xl font-bold">Herzlich Willkommen!</h1>
            </div>
            <div class="flex flex-col gap-4 text-base-content/70 leading-relaxed">
                <p>
                    Ich freue mich, dass du dich für OneTimeText Pro entschieden hast.
                    Nachdem dein Abo erfolgreich angelegt wurde, kannst du über die Navigation oben rechts auf dein
                    <a href="{{ url('dashboard') }}" class="link link-primary">persönliches Dashboard</a> gelangen.
                </p>
                <p>
                    Über das Benutzer-Icon gelangst du in die Kontoeinstellungen, um dein Passwort oder deine
                    E-Mail-Adresse zu ändern. Über den Menüpunkt „Abonnement" erreichst du direkt das Stripe Kundenportal.
                </p>
                <p>
                    Hast du Fragen oder Anmerkungen?
                    Nutze gerne das <a href="{{ url('contact') }}" class="link link-primary">Kontaktformular</a>.
                </p>
                <p class="text-base-content/50">
                    Viel Spaß bei der Nutzung!<br>
                    Lukas von OneTimeText
                </p>
            </div>
            <div class="mt-6">
                <a href="{{ url('dashboard') }}" class="btn btn-primary gap-2">
                    Zum Dashboard
                </a>
            </div>
        </div>
        <div class="flex justify-center">
            <img src="{{ asset('images/welcome.png') }}" alt="Willkommen" class="max-h-72 object-contain">
        </div>
    </div>
</div>

@endsection
