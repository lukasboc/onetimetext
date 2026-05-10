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
        <div class="w-full mb-8">
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
                        {{-- Ablauf-Auswahl (alle Nutzer) --}}
                        @php
                            $isPro   = auth()->user()?->subscribed();
                            $oldExp  = old('expires_in') ?? '336';
                            $expMap  = [
                                ''       => 'nie',
                                '72'     => '3 Tagen',
                                '168'    => '7 Tagen',
                                '336'    => '14 Tagen',
                                '720'    => '30 Tagen',
                                'custom' => 'individuell',
                            ];
                            $expInitLabel = $expMap[$oldExp] ?? '14 Tagen';
                        @endphp
                        <div class="form-control mt-3">
                            <div class="inline-flex items-center gap-1 flex-wrap">
                                <span class="text-sm text-base-content/70">Automatisch löschen in</span>
                                <div class="dropdown dropdown-bottom">
                                    <button type="button" tabindex="0"
                                            class="inline-flex items-center gap-1 text-primary font-semibold text-sm underline underline-offset-2 decoration-dotted hover:opacity-70 transition-opacity cursor-pointer">
                                        <span id="expires-btn-dash">{{ $expInitLabel }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5 opacity-70 shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-20 w-64 p-1 shadow-xl border border-base-300 mt-1">
                                        @if($isPro)
                                            <li>
                                                <button type="button" class="expires-opt-dash text-sm {{ $oldExp === '' ? 'active' : '' }}"
                                                        data-value="" data-label="nie">
                                                    Kein automatisches Löschen
                                                </button>
                                            </li>
                                        @else
                                            <li>
                                                <button type="button" tabindex="-1" aria-disabled="true"
                                                        class="text-sm opacity-40 pointer-events-none select-none"
                                                        title="Nur für Pro-Nutzer verfügbar">
                                                    <x-icons.lock-closed class="size-3.5 shrink-0" />
                                                    <span class="flex-1">Kein automatisches Löschen</span>
                                                    <span class="badge badge-xs shrink-0">Pro</span>
                                                </button>
                                            </li>
                                        @endif
                                        <li><hr class="my-1 border-base-300"></li>
                                        <li>
                                            <button type="button" class="expires-opt-dash text-sm {{ $oldExp === '72' ? 'active' : '' }}"
                                                    data-value="72" data-label="3 Tagen">3 Tage</button>
                                        </li>
                                        <li>
                                            <button type="button" class="expires-opt-dash text-sm {{ $oldExp === '168' ? 'active' : '' }}"
                                                    data-value="168" data-label="7 Tagen">7 Tage</button>
                                        </li>
                                        <li>
                                            <button type="button" class="expires-opt-dash text-sm {{ $oldExp === '336' ? 'active' : '' }}"
                                                    data-value="336" data-label="14 Tagen">
                                                14 Tage <span class="opacity-50 text-xs ml-1">(Standard)</span>
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="expires-opt-dash text-sm {{ $oldExp === '720' ? 'active' : '' }}"
                                                    data-value="720" data-label="30 Tagen">30 Tage</button>
                                        </li>
                                        <li><hr class="my-1 border-base-300"></li>
                                        @if($isPro)
                                            <li>
                                                <button type="button" class="expires-opt-dash text-sm {{ $oldExp === 'custom' ? 'active' : '' }}"
                                                        data-value="custom" data-label="individuell">
                                                    Individueller Zeitpunkt …
                                                </button>
                                            </li>
                                        @else
                                            <li>
                                                <button type="button" tabindex="-1" aria-disabled="true"
                                                        class="text-sm opacity-40 pointer-events-none select-none"
                                                        title="Nur für Pro-Nutzer verfügbar">
                                                    <x-icons.lock-closed class="size-3.5 shrink-0" />
                                                    <span class="flex-1">Individueller Zeitpunkt …</span>
                                                    <span class="badge badge-xs shrink-0">Pro</span>
                                                </button>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <input type="hidden" name="expires_in" id="expires-val-dash" value="{{ $oldExp }}">
                            <div id="custom-expires-dash" class="{{ $oldExp === 'custom' && $isPro ? '' : 'hidden' }} mt-2">
                                <input type="number" name="expires_in_days"
                                       class="input input-bordered input-sm w-full @error('expires_in_days') input-error @enderror"
                                       min="1" max="365"
                                       value="{{ old('expires_in_days') }}"
                                       placeholder="Anzahl Tage (1–365)" />
                                @error('expires_in_days')
                                    <p class="text-error text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <script>
                        (function () {
                            var btn    = document.getElementById('expires-btn-dash');
                            var inp    = document.getElementById('expires-val-dash');
                            var custom = document.getElementById('custom-expires-dash');
                            document.querySelectorAll('.expires-opt-dash').forEach(function (el) {
                                el.addEventListener('click', function () {
                                    btn.textContent = this.dataset.label;
                                    inp.value = this.dataset.value;
                                    custom.classList.toggle('hidden', this.dataset.value !== 'custom');
                                    document.activeElement.blur();
                                });
                            });
                        })();
                        </script>
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
                            <th>Läuft ab</th>
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
                                <td class="text-sm">
                                    {{ $text->expires_at ? date_format(date_timezone_set(date_create_from_format("Y-m-d H:i:s", $text->expires_at, new DateTimeZone('UTC')), new DateTimeZone('Europe/Berlin')), "d.m.Y H:i") : '–' }}
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('deleteText') }}">
                                        @csrf
                                        <input name="key" type="hidden" value="{{ $text->key }}" />
                                        <button type="submit" class="btn btn-soft btn-error btn-sm gap-1">
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
