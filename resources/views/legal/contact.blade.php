@extends('templates.main')

@section('alerts')@endsection

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto">

        <div class="mb-8">
            <h1 class="text-3xl font-bold">Kontakt.</h1>
            <p class="text-base-content/60 mt-1">Wir freuen uns über deine Nachricht.</p>
        </div>

        <div class="grid md:grid-cols-5 gap-8 items-start">

            <div class="md:col-span-3">
                <div class="card bg-base-200 shadow-xl">
                    <div class="card-body gap-5">

                        @if(isset($sent) && $sent === 1)
                            <div role="alert" class="alert alert-soft alert-success">
                                <x-icons.check class="size-5 shrink-0" />
                                <span>Deine Anfrage wurde verschickt. Danke für dein Interesse!</span>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('sendContactMessage') }}" class="flex flex-col gap-4">
                            @csrf

                            <div class="form-control gap-1">
                                <label class="label" for="email">
                                    <span class="label-text font-medium">E-Mail</span>
                                </label>
                                <input name="email" type="email" id="email"
                                       class="input input-bordered w-full @error('email') input-error @enderror"
                                       value="{{ old('email') }}"
                                       placeholder="deine@email.de" />
                                @error('email')
                                    <p class="text-error text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-control gap-1">
                                <label class="label" for="subject">
                                    <span class="label-text font-medium">Betreff</span>
                                </label>
                                <input name="subject" type="text" id="subject"
                                       class="input input-bordered w-full @error('subject') input-error @enderror"
                                       value="{{ old('subject') }}"
                                       placeholder="Worum geht's?" />
                                @error('subject')
                                    <p class="text-error text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-control gap-1">
                                <label class="label" for="message">
                                    <span class="label-text font-medium">Nachricht</span>
                                </label>
                                <textarea name="message" id="message" rows="5"
                                          class="textarea textarea-bordered w-full @error('message') textarea-error @enderror"
                                          placeholder="Tippe deine Nachricht hier ein …">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-error text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="divider text-xs text-base-content/40">Spam-Schutz</div>

                            <div class="form-control gap-1">
                                <label class="label" for="name">
                                    <span class="label-text font-medium">Was ist 3 + 3?</span>
                                </label>
                                <input name="name" type="text" id="name"
                                       class="input input-bordered w-28 @error('name') input-error @enderror" />
                                @error('name')
                                    <p class="text-error text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="card-actions justify-end pt-2">
                                <button type="submit" class="btn btn-primary">
                                    Nachricht absenden
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="md:col-span-2 flex flex-col gap-6">
                <div class="card bg-base-200 shadow-xl">
                    <div class="card-body gap-3">
                        <h3 class="font-bold text-lg">Fragen & Anregungen</h3>
                        <p class="text-base-content/60 text-sm leading-relaxed">
                            Nutze das Formular für Support-Anfragen, Featurewünsche oder allgemeine Fragen. Wir melden uns so schnell wie möglich bei dir.
                        </p>
                        <div class="divider my-1"></div>
                        <ul class="flex flex-col gap-2 text-sm text-base-content/70">
                            <li class="flex items-center gap-2">
                                <x-icons.check class="size-4 text-success shrink-0" />
                                Support & Hilfe
                            </li>
                            <li class="flex items-center gap-2">
                                <x-icons.check class="size-4 text-success shrink-0" />
                                Featurewünsche
                            </li>
                            <li class="flex items-center gap-2">
                                <x-icons.check class="size-4 text-success shrink-0" />
                                Feedback & Kritik
                            </li>
                        </ul>
                    </div>
                </div>

                <img src="{{ asset('images/contact.png') }}" alt="Kontakt"
                     class="w-full max-h-48 object-contain opacity-80">
            </div>

        </div>
    </div>
</div>
@endsection
