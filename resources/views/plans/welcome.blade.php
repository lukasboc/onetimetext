@extends('templates.main')

@section('content')
    <div class="px-4 py-5">
        <div class="py-5">
            <section id="about">
                <div class=" mt-5">
                    <header class="text-center mb-5">
                    </header>
                    <section class="mt-5">
                    <div class="row pt-5 mb-5 mt-5">
                        <div class="col-sm-8 col-md-6 justify-content-center align-self-center">
                            <h1>Herzlich Willkommen!</h1>
                            <p>
                                Ich freue mich, dass du dich für OneTimeText Pro entschieden hast.
                                Nachdem dein Abo erfolgreich angelegt wurde, kannst du nun die Navigation oben rechts verwenden, um auf dein <a href="{{ url('dashboard') }}">persönliches Dashboard</a> zu gelangen.
                            </p>
                            <p>
                                Zusätzlich gelangst du über das <i class="bi bi-person-circle"></i> Icon in die Kontoeinstellungen navigieren, um dein Passwort oder deine E-Mail-Adresse zu ändern.
                                über den Menüpunkt "Abonnement" gelangst du direkt in das Stripe Kundenportal und kannst dein Abonnement bei Bedarf Kündigen oder deine Zahlungsinformationen bearbeiten.
                            </p>
                            <p>
                                Hast du Fragen oder Anmerkungen zu OneTimeText, nutze gerne das <a href="{{ url('contact') }}">Kontaktformular</a>.
                            </p>
                            <p>
                                Viel Spaß bei der Nutzung!<br>
                                Lukas von OneTimeText
                            </p>
                        </div>
                        <div class="text-center justify-content-center align-self-center col-8 col-sm-4 col-md-6 mx-auto mx-sm-0 mt-5 mt-sm-0">
                            <img src="{{asset('images/welcome.png')}}" alt="image" class="img-fluid index-image" id="what-is-image">
                        </div>
                    </div>
                    </section>

                </div>
            </section>
        </div>
    </div>


@endsection
