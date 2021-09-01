@extends('templates.main')

@section('content')
    <div class="px-4 py-5 text-center">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">Dein <span class="highlight-text">OneTimeText</span>.
            </h1>
            <div class="col-lg-7 mx-auto text-lightgray">
                <p class="fs-5 mb-4">Du hast einen OneTimeText erhalten. Dies ist eine Nachricht, die einmalig gelesen werden kann, bevor sie aus dem Speicher gelöscht wird. Klicke auf "OneTimeText öffnen", um die Nachricht zu lesen.</p>
            </div>

            <div class="row mt-5">
                <div class="col-sm-6 justify-content-center align-self-center">
                    <div class="card mb-4">
                        <p></p>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button type="button" class="btn btn-primary highlight-background px-4 py-2"
                                    onclick="event.preventDefault(); document.getElementById('delete-secret-form-{{ $secret->key }}').submit();">
                                OneTimeText öffnen
                            </button>
                            <div class="alert alert-info mt-4" role="alert">
                                Achtung: Nachdem der OneTimeText geöffnet wurde, wird die Nachricht zerstört und kann nicht mehr abgerufen werden.
                            </div>
                            <form id="delete-secret-form-{{ $secret->key }}" action="{{ route('text.secret.destroy', $secret->key) }}"
                                  method="POST" style="display: none">
                                @csrf
                                @method("DELETE")
                            </form>
                        </div>
                    </div>
                </div>
                <div class="justify-content-center align-self-center col-8 col-sm-6 mx-auto mx-sm-0 mt-5 mt-sm-0">
                    <img id="index-image" src="{{asset('images/secret.png')}}" alt="image">
                </div>
            </div>
    </div>
        <section id="about">
            <div class="container mt-5">
                <header class="text-center mb-5">
                    <h5 class="text-uppercase">Über</h5>
                    <h1>Informationen zu <span class="highlight-text">OneTimeText</span>.</h1>
                    <p>In diesem Bereich finden Sie Informationen dazu, wozu dieses Tool dient.</p>
                </header>
                <div class="row mb-5">
                    <div class="col-sm-8 col-md-6 justify-content-center align-self-center">
                        <h1>Was ist OneTimeText?</h1>
                        <p>OneTimeText ist ein Werkzeug, das Ihnen dabei helfen soll, sensible Daten wie z.B. Passwörter zu versenden, ohne dass diese in Chat- oder E-Maiverläufen auftauchen. Sie können den Text, den Sie mit jemandem teilen möchten einfach in eine OneTimeText-Nachricht verpacken und den Link versenden. Der von Ihnen verpackte Text, der ausschließlich durch diesen Link aufrufbar ist, kann nur 1x gelesen werden, bevor die Nachricht aus System gelöscht wird. Sie brauchen sich also keine Gedanken darüber zu machen, dass weitere Personen auf die geheime Nachricht zugreifen können.</p>
                    </div>
                    <div class="text-center justify-content-center align-self-center col-8 col-sm-4 col-md-6 mx-auto mx-sm-0 mt-5 mt-sm-0">
                        <img src="{{asset('images/whatis.png')}}" alt="image" class="img-fluid index-image" id="what-is-image">
                    </div>
                </div>
                <div class="row">
                    <div class="text-center justify-content-center align-self-center col-8 col-sm-4 col-md-6 mx-auto mx-sm-0 mt-5 mt-sm-0 d-none d-sm-block">
                        <img src="{{asset('images/how.png')}}" alt="image" class="img-fluid index-image" id="how-image">
                    </div>
                    <div class="col-sm-8 col-md-6 justify-content-center align-self-center">
                        <h1>Wie benutze ich OneTimeText?</h1>
                        <p>Die Nutzung von OneTimeText könnte nicht einfacher sein. Sie benötigen keinen Benutzeraccount um dieses Tool nutzen zu können. Geben Sie einfach Ihren geheimen Text in das Feld auf der Startseite ein und klicken Sie auf "Link erstellen". Kopieren Sie den Link und versenden Sie diesen an den Empfänger per Mail, Signal, Whatsapp oder auch per Brief. Der Nachricht-Empfänger muss zum lesen der Nachricht lediglich auf den Link klicken und auf den Button "OneTimeText öffnen" klicken.</p>
                    </div>
                </div>
            </div>
        </section>

@endsection
