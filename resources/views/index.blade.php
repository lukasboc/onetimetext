@extends('templates.main')

@section('content')

{{-- Hero: Erstell-Bereich (Typ A) --}}
<div class="min-h-[70vh] flex flex-col items-center justify-center text-center py-12">

    <div class="mb-8">
        <div class="flex items-center justify-center gap-3 mb-4">
            <x-icons.lock-closed class="size-10 text-primary" />
            <h1 class="text-4xl md:text-5xl font-bold">
                {!! __('Create your :app.', ['app' => '<span class="text-primary">' . e(env('APP_NAME', 'OneTimeText')) . '</span>']) !!}
            </h1>
        </div>
        <p class="text-base-content/70 text-lg max-w-xl mx-auto">
            {!! __('Enter your secret message – you receive a link that can be read <strong>exactly once</strong>.') !!}
        </p>
    </div>

    {{-- Link-Banner nach dem Erstellen --}}
    @if(session('secreturl'))
        <div class="w-full max-w-xl mb-8">
            <div class="rounded-box bg-success/15 border border-success/40 p-4 flex flex-col gap-3 text-left">
                <div class="flex items-center gap-2 text-success">
                    <x-icons.check class="size-5 shrink-0" />
                    <span class="font-semibold text-base">{{ __('Your link has been created!') }}</span>
                </div>
                <p class="text-sm text-base-content/70">{!! __('Copy the link and send it to the recipient. The link can only be opened <strong>once</strong>.') !!}</p>
                <div class="join w-full">
                    <input id="secret-url-field"
                           type="text"
                           class="input join-item flex-1 font-mono text-sm"
                           value="{{ session('secreturl') }}"
                           readonly />
                    <button id="copy-btn" class="btn btn-primary join-item gap-2">
                        <x-icons.clipboard class="size-4" />
                        <span id="copy-text">{{ __('Copy') }}</span>
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
                document.getElementById('copy-text').textContent = '{{ __('✓ Copied!') }}';
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
                        <span class="label-text font-medium">{{ __('Your secret message') }}</span>
                    </label>
                    <textarea
                        name="value"
                        id="value"
                        class="textarea textarea-bordered w-full text-base min-h-36 @error('value') textarea-error @enderror"
                        placeholder="{{ __('Type your message here …') }}"
                        rows="6"
                        autofocus
                    >{{ old('value') }}</textarea>
                    <div class="flex justify-between items-center text-xs text-base-content/40 mt-1">
                        <span id="char-count">0 / {{ auth()->user()?->subscribed() ? number_format(10000, 0, ',', app()->getLocale() === 'de' ? '.' : ',') : number_format(2000, 0, ',', app()->getLocale() === 'de' ? '.' : ',') }}</span>
                        @auth
                            @unless(auth()->user()->subscribed())
                                <a href="{{ url('/pro') }}" class="link link-primary">{{ __('Pro: up to 10,000 characters') }}</a>
                            @endunless
                        @else
                            <a href="{{ url('/pro') }}" class="link link-primary">{{ __('Pro: up to 10,000 characters') }}</a>
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
                                    <span class="label-text">{{ __('Notify me by email when the link is opened') }}</span>
                                </label>
                            </div>
                        @endif
                    @endauth
                    {{-- Ablauf-Auswahl (alle Nutzer) --}}
                    @php
                        $isPro   = auth()->user()?->subscribed();
                        $oldExp  = old('expires_in') ?? '336';
                        $expMap  = [
                            ''       => __('never'),
                            '72'     => __('3 days'),
                            '168'    => __('7 days'),
                            '336'    => __('14 days'),
                            '720'    => __('30 days'),
                            'custom' => __('custom'),
                        ];
                        $expInitLabel = $expMap[$oldExp] ?? __('14 days');
                    @endphp
                    <div class="form-control mt-3 text-left">
                        <div class="inline-flex items-center gap-1 flex-wrap">
                            <span class="text-sm text-base-content/70">{{ __('Auto-delete in') }}</span>
                            <div class="dropdown dropdown-bottom">
                                <button type="button" tabindex="0"
                                        class="inline-flex items-center gap-1 text-primary font-semibold text-sm underline underline-offset-2 decoration-dotted hover:opacity-70 transition-opacity cursor-pointer">
                                    <span id="expires-btn-idx">{{ $expInitLabel }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5 opacity-70 shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                                <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-20 w-64 p-1 shadow-xl border border-base-300 mt-1">
                                    @if($isPro)
                                        <li>
                                            <button type="button" class="expires-opt-idx text-sm {{ $oldExp === '' ? 'active' : '' }}"
                                                    data-value="" data-label="{{ __('never') }}">
                                                {{ __('No automatic deletion') }}
                                            </button>
                                        </li>
                                    @else
                                        <li>
                                            <button type="button" tabindex="-1" aria-disabled="true"
                                                    class="text-sm opacity-40 pointer-events-none select-none"
                                                    title="{{ __('Pro users only') }}">
                                                <x-icons.lock-closed class="size-3.5 shrink-0" />
                                                <span class="flex-1">{{ __('No automatic deletion') }}</span>
                                                <span class="badge badge-xs shrink-0">Pro</span>
                                            </button>
                                        </li>
                                    @endif
                                    <li><hr class="my-1 border-base-300"></li>
                                    <li>
                                        <button type="button" class="expires-opt-idx text-sm {{ $oldExp === '72' ? 'active' : '' }}"
                                                data-value="72" data-label="{{ __('3 days') }}">{{ __('3 days') }}</button>
                                    </li>
                                    <li>
                                        <button type="button" class="expires-opt-idx text-sm {{ $oldExp === '168' ? 'active' : '' }}"
                                                data-value="168" data-label="{{ __('7 days') }}">{{ __('7 days') }}</button>
                                    </li>
                                    <li>
                                        <button type="button" class="expires-opt-idx text-sm {{ $oldExp === '336' ? 'active' : '' }}"
                                                data-value="336" data-label="{{ __('14 days') }}">
                                            {{ __('14 days') }} <span class="opacity-50 text-xs ml-1">({{ __('default') }})</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="expires-opt-idx text-sm {{ $oldExp === '720' ? 'active' : '' }}"
                                                data-value="720" data-label="{{ __('30 days') }}">{{ __('30 days') }}</button>
                                    </li>
                                    <li><hr class="my-1 border-base-300"></li>
                                    @if($isPro)
                                        <li>
                                            <button type="button" class="expires-opt-idx text-sm {{ $oldExp === 'custom' ? 'active' : '' }}"
                                                    data-value="custom" data-label="{{ __('custom') }}">
                                                {{ __('Custom date …') }}
                                            </button>
                                        </li>
                                    @else
                                        <li>
                                            <button type="button" tabindex="-1" aria-disabled="true"
                                                    class="text-sm opacity-40 pointer-events-none select-none"
                                                    title="{{ __('Pro users only') }}">
                                                <x-icons.lock-closed class="size-3.5 shrink-0" />
                                                <span class="flex-1">{{ __('Custom date …') }}</span>
                                                <span class="badge badge-xs shrink-0">Pro</span>
                                            </button>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <input type="hidden" name="expires_in" id="expires-val-idx" value="{{ $oldExp }}">
                        <div id="custom-expires-idx" class="{{ $oldExp === 'custom' && $isPro ? '' : 'hidden' }} mt-2">
                            <input type="number" name="expires_in_days"
                                   class="input input-bordered input-sm w-full @error('expires_in_days') input-error @enderror"
                                   min="1" max="365"
                                   value="{{ old('expires_in_days') }}"
                                   placeholder="{{ __('Number of days (1–365)') }}" />
                            @error('expires_in_days')
                                <p class="text-error text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <script>
                    (function () {
                        var btn    = document.getElementById('expires-btn-idx');
                        var inp    = document.getElementById('expires-val-idx');
                        var custom = document.getElementById('custom-expires-idx');
                        document.querySelectorAll('.expires-opt-idx').forEach(function (el) {
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
                            var locale = '{{ app()->getLocale() }}';
                            var fmtLocale = locale === 'de' ? 'de-DE' : 'en-US';
                            function update() {
                                var n = ta.value.length;
                                counter.textContent = n.toLocaleString(fmtLocale) + ' / ' + max.toLocaleString(fmtLocale);
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
                        {{ __('Create link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Info-Bereich --}}
<section class="py-16 border-t border-base-300 mt-8">
    <div class="text-center mb-12">
        <p class="text-sm uppercase tracking-widest text-base-content/50 mb-2">{{ __('About') }}</p>
        <h2 class="text-3xl font-bold">
            {!! __('Information about :app.', ['app' => '<span class="text-primary">' . e(env('APP_NAME', 'OneTimeText')) . '</span>']) !!}
        </h2>
        <p class="text-base-content/60 mt-2">{{ __('In this section you will find information about what this tool is for.') }}</p>
    </div>

    <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
        <div>
            <h3 class="text-2xl font-bold mb-4">{{ __('What is :app?', ['app' => env('APP_NAME', 'OneTimeText')]) }}</h3>
            <p class="text-base-content/70 leading-relaxed">
                {{ __(':app is a tool that helps you send sensitive data such as passwords without leaving them in chat or email histories. Simply package the text you want to share in a :app message and send the link. The text you wrapped, accessible only via this link, can be read exactly once before it is deleted from the system.', ['app' => env('APP_NAME', 'OneTimeText')]) }}
            </p>
        </div>
        <div class="flex justify-center">
            <img src="{{ asset('images/whatis.png') }}" alt="{{ __('What is :app', ['app' => env('APP_NAME', 'OneTimeText')]) }}" class="max-h-64 object-contain">
        </div>
    </div>

    <div class="grid md:grid-cols-2 gap-12 items-center">
        <div class="hidden md:flex justify-center order-first">
            <img src="{{ asset('images/how.png') }}" alt="{{ __('How do I use :app', ['app' => env('APP_NAME', 'OneTimeText')]) }}" class="max-h-64 object-contain">
        </div>
        <div>
            <h3 class="text-2xl font-bold mb-4">{{ __('How do I use :app?', ['app' => env('APP_NAME', 'OneTimeText')]) }}</h3>
            <p class="text-base-content/70 leading-relaxed">
                {{ __('Using :app could not be simpler. You do not need a user account to use this tool. Just enter your secret text in the field above and click „Create link". Copy the link and send it to the recipient via mail, Signal, WhatsApp or even by letter. To read the message, the recipient just needs to click the link and press the „Open :app" button.', ['app' => env('APP_NAME', 'OneTimeText')]) }}
            </p>
        </div>
    </div>
</section>

@endsection
