@extends('templates.main')

@section('content')

<div class="py-8">
    <h1 class="text-3xl font-bold mb-8">Kontakt.</h1>

    <div class="grid md:grid-cols-2 gap-12 items-start">
        <div>
            @if(isset($sent) && $sent === 1)
                <div role="alert" class="alert alert-success mb-6">
                    <x-icons.check class="size-5 shrink-0" />
                    <span>Deine Anfrage wurde verschickt. Danke für dein Interesse!</span>
                </div>
            @endif

            <form method="POST" action="{{ route('sendContactMessage') }}" class="flex flex-col gap-4">
                @csrf
                <div class="form-control gap-1">
                    <label class="label" for="email"><span class="label-text">E-Mail</span></label>
                    <input name="email" type="email" id="email"
                           class="input input-bordered @error('email') input-error @enderror"
                           value="{{ old('email') }}" />
                    @error('email')
                        <p class="text-error text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-control gap-1">
                    <label class="label" for="subject"><span class="label-text">Betreff</span></label>
                    <input name="subject" type="text" id="subject"
                           class="input input-bordered @error('subject') input-error @enderror"
                           value="{{ old('subject') }}" />
                    @error('subject')
                        <p class="text-error text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-control gap-1">
                    <label class="label" for="message"><span class="label-text">Nachricht</span></label>
                    <textarea name="message" id="message" rows="5"
                              class="textarea textarea-bordered @error('message') textarea-error @enderror"
                              placeholder="Tippe deine Nachricht hier ein …">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-error text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-control gap-1">
                    <label class="label" for="name"><span class="label-text">Was ist 3 + 3?</span></label>
                    <input name="name" type="text" id="name"
                           class="input input-bordered w-32 @error('name') input-error @enderror" />
                    @error('name')
                        <p class="text-error text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="btn btn-primary gap-2">
                        Nachricht absenden
                    </button>
                </div>
            </form>
        </div>

        <div class="hidden md:flex flex-col gap-4">
            <h3 class="text-xl font-bold">Fragen, Anregungen oder Kommentare?</h3>
            <p class="text-base-content/60">
                Nutze das Kontaktformular um Antworten zu erhalten. Auch Featurewünsche sind gern gesehen!
            </p>
            <img src="{{ asset('images/contact.png') }}" alt="Kontakt" class="max-h-64 object-contain mt-4">
        </div>
    </div>
</div>

@endsection
