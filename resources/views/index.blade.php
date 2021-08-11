@extends('templates.main')

@section('content')
    <div class="px-4 py-5 text-center">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">Erstelle deinen <span class="highlight-text">OneTimeText</span>.
            </h1>
            <div class="col-lg-7 mx-auto text-lightgray">
                <p class="fs-5 mb-4">Ein OneTimeText ist eine Nachricht, die nur einmalig abgerufen werden kann. Nach
                    der Erstellung erhältst du einen Link, den du weiterleiten kannst. Über diesen Link kann deine erstellte
                    Nachricht 1x abgerufen werden, bevor sie aus dem System gelöscht wird.</p>
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
                    <button id="copy-btn" class="btn btn-outline-success mt-3" data-clipboard-target="#foo">
                        <i class="bi bi-clipboard-check"></i> <span id="copy-text">Kopieren</span>
                    </button>
                </div>
            </div>
                    </div>
                </div>
                        <script src="https://unpkg.com/clipboard@2/dist/clipboard.min.js"></script>
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
                <div class="col-sm-6 justify-content-center align-self-center">
                    <form id="save-secret-form" class="mt-4" method="POST" action="{{ route('text.secret.store') }}">
                        @csrf
                        <div class="mb-3">
                            <textarea name="value" type="text" class="form-control @error('value') is-invalid @enderror"
                                      id="value" aria-describedby="value" placeholder="Tippe deine Nachricht hier ein ..." rows="5">{{ old('value') }}</textarea>
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
                        <button type="submit" id="create-link" class="btn btn-primary highlight-background px-4 py-2">Link erstellen</button>
                    </form>
                </div>
                <div class="justify-content-center align-self-center col-8 col-sm-6 mx-auto mx-sm-0 mt-5 mt-sm-0">
                    <img id="index-image" src="{{asset('images/mobilundraw_Safe_re_kiil-3220.png')}}" alt="image">
                </div>
            </div>
        </div>
    </div>


@endsection
