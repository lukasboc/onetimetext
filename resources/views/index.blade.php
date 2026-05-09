@extends('templates.main')

@section('content')

{{-- Hero: Erstell-Bereich (Typ A) --}}
<div class="min-h-[70vh] flex flex-col items-center justify-center text-center py-12">

    <div class="mb-8">
        <div class="flex items-center justify-center gap-3 mb-4">
            <x-icons.lock-closed class="size-10 text-primary" />
            <h1 class="text-4xl md:text-5xl font-bold">
                Erstelle deinen <span class="text-primary">OneTimeText</span>.
            </h1>
        </div>
        <p class="text-base-content/70 text-lg max-w-xl mx-auto">
            Gib deine geheime Nachricht ein – du erhältst einen Link, der <strong>genau einmal</strong> gelesen werden kann.
        </p>
    </div>

    {{-- Link-Banner nach dem Erstellen --}}
    @if(session('secreturl'))
        <div class="w-full max-w-xl mb-8">
            <div class="rounded-box bg-success/15 border border-success/40 p-4 flex flex-col gap-3 text-left">
                <div class="flex items-center gap-2 text-success">
                    <x-icons.check class="size-5 shrink-0" />
                    <span class="font-semibold text-base">Dein Link wurde erstellt!</span>
                </div>
                <p class="text-sm text-base-content/70">Kopiere den Link und sende ihn an den Empfänger. Der Link kann nur <strong>einmal</strong> geöffnet werden.</p>
                <div class="join w-full">
                    <input id="secret-url-field"
                           type="text"
                           class="input join-item flex-1 font-mono text-sm"
                           value="{{ session('secreturl') }}"
                           readonly />
                    <button id="copy-btn" class="btn btn-primary join-item gap-2">
                        <x-icons.clipboard class="size-4" />
                        <span id="copy-text">Kopieren</span>
                    </button>
                </div>
            </div>
        </div>

        <script src="https://unpkg.com/clipboard@2/dist/clipboard.min.js"></script>
        <script>
            var clipboard = new ClipboardJS('#copy-btn', {
                text: function() {
                    return document.getElementById('secret-url-field').value;
                }
            });
            clipboard.on('success', function(e) {
                document.getElementById('copy-text').textContent = '✓ Kopiert!';
                e.clearSelection();
            });
        </script>
    @endif

    {{-- Formular --}}
    <div class="card bg-base-200 shadow-xl w-full max-w-xl">
        <div class="card-body gap-4">
            <form id="save-secret-form" method="POST" action="{{ route('text.secret.store') }}">
                @csrf
                <div class="form-control gap-2">
                    <label class="label mb-2" for="value">
                        <span class="label-text font-medium">Deine geheime Nachricht</span>
                    </label>
                    <textarea
                        name="value"
                        id="value"
                        class="textarea textarea-bordered w-full text-base min-h-36 @error('value') textarea-error @enderror"
                        placeholder="Tippe deine Nachricht hier ein …"
                        rows="6"
                        autofocus
                    >{{ old('value') }}</textarea>
                    <div class="flex justify-between items-center text-xs text-base-content/40 mt-1">
                        <span id="char-count">0 / {{ auth()->user()?->subscribed() ? '10.000' : '2.000' }}</span>
                        @auth
                            @unless(auth()->user()->subscribed())
                                <a href="{{ url('/pro') }}" class="link link-primary">Pro: bis zu 10.000 Zeichen</a>
                            @endunless
                        @else
                            <a href="{{ url('/pro') }}" class="link link-primary">Pro: bis zu 10.000 Zeichen</a>
                        @endauth
                    </div>
                    @error('value')
                        <p class="text-error text-sm">{{ $message }}</p>
                    @enderror
                    @error('key')
                        <p class="text-error text-sm">{{ $message }}</p>
                    @enderror
                    @auth
                        @if(auth()->user()->subscribed())
                            <div class="form-control mt-3">
                                <label class="label cursor-pointer justify-start gap-3">
                                    <input type="checkbox" name="notify_on_read" value="1"
                                           class="checkbox checkbox-primary checkbox-sm"
                                           {{ old('notify_on_read') ? 'checked' : '' }} />
                                    <span class="label-text">Per E-Mail benachrichtigen, wenn der Link geöffnet wird</span>
                                </label>
                            </div>
                        @endif
                    @endauth
                    <script>
                        (function () {
                            var ta = document.getElementById('value');
                            var counter = document.getElementById('char-count');
                            var max = {{ auth()->user()?->subscribed() ? 10000 : 2000 }};
                            function update() {
                                var n = ta.value.length;
                                counter.textContent = n.toLocaleString('de-DE') + ' / ' + max.toLocaleString('de-DE');
                                counter.classList.toggle('text-error', n > max);
                            }
                            ta.addEventListener('input', update);
                            update();
                        })();
                    </script>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary w-full gap-2 text-base">
                        <x-icons.link class="size-5" />
                        Link erstellen
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Info-Bereich --}}
<section class="py-16 border-t border-base-300 mt-8">
    <div class="text-center mb-12">
        <p class="text-sm uppercase tracking-widest text-base-content/50 mb-2">Über</p>
        <h2 class="text-3xl font-bold">Informationen zu <span class="text-primary">OneTimeText</span>.</h2>
        <p class="text-base-content/60 mt-2">In diesem Bereich finden Sie Informationen dazu, wozu dieses Tool dient.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
        <div>
            <h3 class="text-2xl font-bold mb-4">Was ist OneTimeText?</h3>
            <p class="text-base-content/70 leading-relaxed">
                OneTimeText ist ein Werkzeug, das Ihnen dabei helfen soll, sensible Daten wie z.B. Passwörter zu
                versenden, ohne dass diese in Chat- oder E-Mailverläufen auftauchen. Sie können den Text, den Sie
                mit jemandem teilen möchten einfach in eine OneTimeText-Nachricht verpacken und den Link versenden.
                Der von Ihnen verpackte Text, der ausschließlich durch diesen Link aufrufbar ist,
                kann nur 1x gelesen werden, bevor die Nachricht aus dem System gelöscht wird.
            </p>
        </div>
        <div class="flex justify-center">
            <img src="{{ asset('images/whatis.png') }}" alt="Was ist OneTimeText" class="max-h-64 object-contain">
        </div>
    </div>

    <div class="grid md:grid-cols-2 gap-12 items-center">
        <div class="hidden md:flex justify-center order-first">
            <img src="{{ asset('images/how.png') }}" alt="Wie benutze ich OneTimeText" class="max-h-64 object-contain">
        </div>
        <div>
            <h3 class="text-2xl font-bold mb-4">Wie benutze ich OneTimeText?</h3>
            <p class="text-base-content/70 leading-relaxed">
                Die Nutzung von OneTimeText könnte nicht einfacher sein. Sie benötigen keinen Benutzeraccount um
                dieses Tool nutzen zu können. Geben Sie einfach Ihren geheimen Text in das Feld oben ein und
                klicken Sie auf „Link erstellen". Kopieren Sie den Link und versenden Sie diesen an den Empfänger
                per Mail, Signal, Whatsapp oder auch per Brief. Der Nachricht-Empfänger muss zum Lesen der Nachricht
                lediglich auf den Link klicken und auf den Button „OneTimeText öffnen" klicken.
            </p>
        </div>
    </div>
</section>

@endsection
