@extends('templates.main')

@section('content')
    <div class="px-4 py-5">
        <script src="https://unpkg.com/clipboard@2/dist/clipboard.min.js"></script>
        <div class="py-5">

            <div class="px-4 py-5 text-center">
                <div class="py-5">
                    <h1 class="display-5 fw-bold text-white">Dein <span class="highlight-text">OneTimeText</span>
                        Dashboard.
                    </h1>
                    <div class="col-lg-7 mx-auto text-lightgray">
                        <p class="fs-5 mb-4">Über dein persönliches Dashboard kannst du neue OneTimeTexts erstellen und
                            vorhandene
                            OneTimeTexts verwalten.</p>
                    </div>

                    @if(session('secreturl'))
                        <div class="row">
                            <div class="col-12 col-sm-10 col-md-8 mx-auto">
                                <div class="alert alert-success align-items-center" role="alert">
                                    <i style="font-size:19pt" class="bi bi-check-lg me-2"></i>
                                    <div>
                                        Dein Link wurde erstellt:<br>
                                        <span id="foo">{{ session('secreturl') }}</span>
                                    </div>
                                    <div class="text-center">
                                        <button id="copy-btn" class="btn btn-outline-success mt-3"
                                                data-clipboard-target="#foo">
                                            <i class="bi bi-clipboard-check"></i> <span id="copy-text">Kopieren</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            var successMessage = document.getElementById('copied');
                            var btn = document.getElementById('copy-btn');
                            var clipboard = new ClipboardJS(btn);

                            clipboard.on('success', function (e) {
                                btn.classList.remove("btn-outline-primary");
                                btn.classList.add("btn-outline-success");
                                document.getElementById("copy-text").innerHTML = 'Kopiert!';
                                e.clearSelection();
                            });

                            clipboard.on('error', function (e) {
                                console.error('Action:', e.action);
                                console.error('Trigger:', e.trigger);
                            });
                        </script>
                    @endif

                    <div class="row mt-5">
                        <div class="col-md-6 justify-content-center align-self-center">
                            <form id="save-secret-form" class="mt-4" method="POST"
                                  action="{{ route('text.secret.store') }}">
                                @csrf
                                <div class="mb-3">
                            <textarea name="value" type="text" class="form-control @error('value') is-invalid @enderror"
                                      id="value" aria-describedby="value"
                                      placeholder="Tippe deine Nachricht hier ein ..."
                                      rows="5">{{ old('value') }}</textarea>
                                    @error('value')
                                    <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                                    @enderror
                                    @error('key')
                                    <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                                    @enderror
                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                                    @enderror
                                </div>
                                <button type="submit" id="create-link"
                                        class="btn btn-primary highlight-background px-4 py-2">
                                    Link erstellen
                                </button>
                            </form>
                        </div>
                        <div class="col-md-6 mx-auto mx-sm-0 mt-5 mt-sm-0">

                            <div class="row">
                                <div class="col-sm mt-4">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$textsAmount}}</h5>
                                            <p class="card-text small">ungelesene OneTimeTexts</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm mt-4">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            @if($textsAmount === 0)
                                                <h5 class="card-title">-</h5>
                                            @else
                                                <h5 class="card-title">{{ date_format(date_timezone_set(date_create_from_format("Y-m-d H:i:s",$texts[sizeof($texts)-1]->created_at, new DateTimeZone('UTC')),new DateTimeZone('Europe/Berlin')),"d.m.Y") }}</h5>
                                            @endif
                                            <p class="card-text">ältester OneTimeText</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm mt-4">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$membership}}</h5>
                                            <p class="card-text small">Abostatus</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm mt-4">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            @if($ended)
                                                <h5 class="card-title">Nein</h5>
                                            @else
                                                <h5 class="card-title">Ja</h5>
                                            @endif
                                            <p class="card-text">Aboverlängerung aktiv</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <section id="about">
                <div class="container mt-5">
                    <div class="row pt-5 mb-5">
                        <div class=" justify-content-center align-self-center">
                            <h1>Deine OneTimeTexts.</h1>

                            @if($textsAmount !== 0)
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Link</th>
                                        <th scope="col">Text</th>
                                        <th scope="col">Erstellzeitpunkt</th>
                                        <th scope="col">Aktionen</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($texts as $text)
                                        <tr>
                                            <td>/{{$text->key}}</td>
                                            @if(strlen($text->value) > 15)
                                                <td>{{substr($text->value, 0,14)}} ...</td>
                                            @else
                                                <td>{{$text->value}}</td>
                                            @endif
                                            <td>{{date_format(date_timezone_set(date_create_from_format("Y-m-d H:i:s",$text->created_at, new DateTimeZone('UTC')),new DateTimeZone('Europe/Berlin')),"d.m.Y H:i")}}</td>
                                            <td>
                                                <form method="POST"
                                                      action="{{ route('deleteText') }}">
                                                    @csrf
                                                    <div class="">
                                                        <input name="key" type="hidden" id="key"
                                                               value="{{$text->key}}"/>
                                                        @error('key')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                        @error('user_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                                            class="bi bi-trash"></i> Löschen
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-light" role="alert">
                                    Alle deine OneTimeTexts wurden gelesen.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
