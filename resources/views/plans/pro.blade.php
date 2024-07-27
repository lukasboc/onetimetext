@extends('templates.main')

@section('content')
    <div class="px-4 py-5">
        <div class="py-5">
            <section id="about">
                <div class=" mt-5">
                    <header class="text-center mb-5">
                        <h6 class="text-uppercase">Für alle, die mehr wollen:</h6>
                        <h1><span class="highlight-text">OneTimeText</span> Preise.</h1>
                    </header>

                    <section class="section mb-5" id="pricing">
                        <div class="container">
                            <div class="row mt-5 pt-4">
                                <div class="col-lg-4">
                                    <div class="pricing-box mt-4">
                                        <i class="mdi mdi-account h1"></i>
                                        <h4 class="f-20">Kostenlos</h4>

                                        <div class="mt-4 pt-2">
                                            <p class="mb-2 f-18">Features:</p>

                                            <p class="mb-2"><i class="bi bi-check-circle text-success mr-2"></i> unbegrenzt viele OneTimeTexts</p>
                                            <p class="mb-2"><i class="bi bi-slash-circle text-danger mr-2"></i> eigenes Dashboard</p>
                                            <p class="mb-2"><i class="bi bi-slash-circle text-danger mr-2"></i> Whitelabeling</p>
                                        </div>

                                        <p class="mt-4 pt-2">Die Nutzung von OneTimeText ohne Konto, ohne Verbindlichkeiten.
                                        </p>
                                        <div class="pricing-plan mt-4 pt-2">
                                            <h4 class=""><span class="plan pl-3">0,00 € </span></h4>
                                            <p class=" mb-0">Pro Monat</p>
                                        </div>


                                        <div class="mt-4 pt-3">
                                            <button href="" disabled class="btn btn-outline-light btn-rounded">Ohne Konto möglich</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="pricing-box mt-4">
                                        <!--<div class="pricing-badge">
                                            <span class="badge">Empfehlung</span>
                                        </div>-->

                                       <i class="mdi mdi-account-multiple h1 text-primary"></i>
                                        <h4 class="f-20 text-warning">Pro</h4>


                                        <div class="mt-4 pt-2">
                                            <p class="mb-2 f-18">Features:</p>

                                            <p class="mb-2"><i class="bi bi-check-circle text-success mr-2"></i> unbegrenzt viele OneTimeTexts</p>
                                            <p class="mb-2"><i class="bi bi-check-circle text-success mr-2"></i> eigenes Dashboard</p>
                                            <p class="mb-2"><i class="bi bi-slash-circle text-danger mr-2"></i> Whitelabeling</p>
                                        </div>

                                        <p class="mt-4 pt-2 muted">Schaltet ein individuelles Dashboard frei und garantiert Verfügbarkeiten.
                                        </p>

                                        <div class="pricing-plan mt-4 pt-2">
                                            <h4 class=""><span class="plan pl-3 ">4,99 €</span></h4>
                                            <p class=" mb-0">Pro Monat</p>
                                        </div>

                                        <div class="mt-4 pt-3">
                                            <a href="{{ route('register') }}" class="btn btn-highlight btn-rounded">Zur Registrierung</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="pricing-box mt-4">
                                        <i class="mdi mdi-account-multiple-plus h1"></i>
                                        <h4 class="f-20">Enterprise</h4>


                                        <div class="mt-4 pt-2">
                                            <p class="mb-2 f-18">Features:</p>

                                            <p class="mb-2"><i class="bi bi-check-circle text-success mr-2"></i> unbegrenzt viele OneTimeTexts</p>
                                            <p class="mb-2"><i class="bi bi-check-circle text-success mr-2"></i> eigenes Dashboard</p>
                                            <p class="mb-2"><i class="bi bi-check-circle text-success mr-2"></i> Whitelabeling</p>
                                        </div>

                                        <p class="mt-4 pt-2 ">Eine eigene Instanz von OneTimeText mit Whitelabeling.
                                        </p>

                                        <div class="pricing-plan mt-4 pt-2">
                                            <h4 class=""><span class="plan pl-3 ">auf Anfrage</span></h4>
                                            <p class=" mb-0">-</p>
                                        </div>

                                        <div class="mt-4 pt-3">
                                            <a href="{{ url('/contact') }}" class="btn btn-outline-light btn-rounded">Zur Kontaktaufnahme</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="mt-5">



                    <div class="row pt-5 mb-5 mt-5">
                        <div class="col-sm-8 col-md-6 justify-content-center align-self-center">
                            <h1>Was ist OneTimeText Pro?</h1>
                            <p>Das OneTimeText Pro Abonnement erweitert die Basisfunktionalitäten von OneTimeText um ein Dashboard zur Verfolgung von erstellten OneTimeTexts.
                            Nutzer*innen erhalten eine tabellarische Darstellung sämtlicher OneTimeTexts, die sie erstellt haben und noch nicht von Empfänger*innen geöffnet wurden.
                            Neben den Inhalten der OneTimeTexts erhalten OneTimeText-Ersteller*innen erneuten Zugriff auf Links zu erstellten OneTimeTexts.
                            </p>
                        </div>
                        <div class="text-center justify-content-center align-self-center col-8 col-sm-4 col-md-6 mx-auto mx-sm-0 mt-5 mt-sm-0">
                            <img src="{{asset('images/panel.png')}}" alt="image" class="img-fluid index-image" id="what-is-image">
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="text-center justify-content-center align-self-center col-8 col-sm-4 col-md-6 mx-auto mx-sm-0 mt-5 mt-sm-0 d-none d-sm-block">
                            <img src="{{asset('images/how.png')}}" alt="image" class="img-fluid index-image" id="how-image">
                        </div>
                        <div class="col-sm-8 col-md-6 justify-content-center align-self-center">
                            <h1>Wie erhalte ich Zugriff?</h1>
                            <p>Um OneTimeText Pro nutzen zu können, muss ein kostenpflichtiges Abonnement abgeschlossen werden. Der Preis für das Abonnment beträgt 4,99 € pro Monat. Die Mindestvertragslaufzeit beträgt einen Monat.</p>
                            <p>Um auf Pro zu wechseln, musst du dich zunächst <a  href="{{ route('register') }}">registrieren</a>.</p>
                        </div>
                    </div>
                    </section>

                </div>
            </section>
        </div>
    </div>


@endsection
