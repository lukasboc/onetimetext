@extends('templates.main')

@section('content')

<div class="py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold">
            Dein <span class="text-primary">OneTimeText</span> Dashboard.
        </h1>
        <p class="text-base-content/60 mt-1">
            Erstelle neue OneTimeTexts und verwalte deine vorhandenen Nachrichten.
        </p>
    </div>

    {{-- Link-Banner nach dem Erstellen --}}
    @if(session('secreturl'))
        <div role="alert" class="alert alert-success mb-6 flex-col items-start gap-3 text-left">
            <div class="flex items-center gap-2">
                <x-icons.check class="size-5 shrink-0" />
                <span class="font-semibold">Dein Link wurde erstellt!</span>
            </div>
            <div class="join w-full max-w-lg">
                <input id="secret-url-field" type="text"
                       class="input join-item flex-1 font-mono text-sm"
                       value="{{ session('secreturl') }}" readonly />
                <button id="copy-btn" class="btn btn-primary join-item gap-2">
                    <x-icons.clipboard class="size-4" />
                    <span id="copy-text">Kopieren</span>
                </button>
            </div>
        </div>
        <script src="https://unpkg.com/clipboard@2/dist/clipboard.min.js"></script>
        <script>
            var clipboard = new ClipboardJS('#copy-btn', {
                text: function() { return document.getElementById('secret-url-field').value; }
            });
            clipboard.on('success', function(e) {
                document.getElementById('copy-text').textContent = '✓ Kopiert!';
                e.clearSelection();
            });
        </script>
    @endif

    <div class="grid lg:grid-cols-2 gap-8 mb-10">

        {{-- Formular --}}
        <div class="card bg-base-200 shadow-xl">
            <div class="card-body gap-4">
                <h2 class="card-title text-lg">Neuen OneTimeText erstellen</h2>
                <form id="save-secret-form" method="POST" action="{{ route('text.secret.store') }}">
                    @csrf
                    <div class="form-control gap-1">
                        <label class="label" for="value">
                            <span class="label-text">Geheime Nachricht</span>
                        </label>
                        <textarea name="value" id="value" rows="5"
                                  class="textarea textarea-bordered w-full @error('value') textarea-error @enderror"
                                  placeholder="Tippe deine Nachricht hier ein …">{{ old('value') }}</textarea>
                        <div class="flex justify-between items-center text-xs text-base-content/40 mt-1">
                            <span id="char-count">0 / {{ auth()->user()?->subscribed() ? '10.000' : '2.000' }}</span>
                        </div>
                        @error('value')
                            <p class="text-error text-xs mt-1">{{ $message }}</p>
                        @enderror
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
                        <button type="submit" class="btn btn-primary w-full gap-2">
                            <x-icons.link class="size-4" />
                            Link erstellen
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Stats --}}
        <div class="stats stats-vertical shadow bg-base-200 w-full">
            <div class="stat">
                <div class="stat-title">Ungelesene OneTimeTexts</div>
                <div class="stat-value text-primary">{{ $textsAmount }}</div>
            </div>
            <div class="stat">
                <div class="stat-title">Ältester OneTimeText</div>
                <div class="stat-value text-2xl">
                    @if($textsAmount === 0)
                        –
                    @else
                        {{ date_format(date_timezone_set(date_create_from_format("Y-m-d H:i:s", $texts[sizeof($texts)-1]->created_at, new DateTimeZone('UTC')), new DateTimeZone('Europe/Berlin')), "d.m.Y") }}
                    @endif
                </div>
            </div>
            <div class="stat">
                <div class="stat-title">Abostatus</div>
                <div class="stat-value text-2xl">
                    <span class="badge badge-primary badge-lg">{{ $membership }}</span>
                </div>
            </div>
            <div class="stat">
                <div class="stat-title">Aboverlängerung</div>
                <div class="stat-value text-2xl">
                    @if($ended)
                        <span class="badge badge-error badge-lg">Inaktiv</span>
                    @else
                        <span class="badge badge-success badge-lg">Aktiv</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Tabelle --}}
    <div>
        <h2 class="text-xl font-bold mb-4">Deine OneTimeTexts.</h2>
        @if($textsAmount !== 0)
            <div class="overflow-x-auto rounded-xl border border-base-300">
                <table class="table table-zebra">
                    <thead>
                        <tr>
                            <th>Link</th>
                            <th>Vorschau</th>
                            <th>Erstellt am</th>
                            <th>Aktionen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($texts as $text)
                            <tr>
                                <td class="font-mono text-sm">/{{ $text->key }}</td>
                                <td class="text-base-content/70">
                                    {{ strlen($text->value) > 15 ? substr($text->value, 0, 14) . ' …' : $text->value }}
                                </td>
                                <td class="text-sm">
                                    {{ date_format(date_timezone_set(date_create_from_format("Y-m-d H:i:s", $text->created_at, new DateTimeZone('UTC')), new DateTimeZone('Europe/Berlin')), "d.m.Y H:i") }}
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('deleteText') }}">
                                        @csrf
                                        <input name="key" type="hidden" value="{{ $text->key }}" />
                                        <button type="submit" class="btn btn-error btn-sm gap-1">
                                            <x-icons.trash class="size-4" />
                                            Löschen
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div role="alert" class="alert alert-info">
                <x-icons.check class="size-5 shrink-0" />
                <span>Alle deine OneTimeTexts wurden bereits gelesen.</span>
            </div>
        @endif
    </div>
</div>

@endsection
