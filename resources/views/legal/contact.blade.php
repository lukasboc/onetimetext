@extends('templates.main')

@section('alerts')@endsection

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto">

        <div class="mb-8">
            <h1 class="text-3xl font-bold">{{ __('Contact.') }}</h1>
            <p class="text-base-content/60 mt-1">{{ __('We look forward to your message.') }}</p>
        </div>

        <div class="grid md:grid-cols-5 gap-8 items-start">

            <div class="md:col-span-3">
                <div class="card bg-base-200 shadow-xl">
                    <div class="card-body gap-5">

                        @if(isset($sent) && $sent === 1)
                            <div role="alert" class="alert alert-soft alert-success">
                                <x-icons.check class="size-5 shrink-0" />
                                <span>{{ __('Your message has been sent. Thanks for your interest!') }}</span>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('sendContactMessage') }}" class="flex flex-col gap-4">
                            @csrf

                            <div class="form-control gap-1">
                                <label class="label" for="email">
                                    <span class="label-text font-medium">{{ __('Email') }}</span>
                                </label>
                                <input name="email" type="email" id="email"
                                       class="input input-bordered w-full @error('email') input-error @enderror"
                                       value="{{ old('email') }}"
                                       placeholder="{{ __('your@email.com') }}" />
                                @error('email')
                                    <p class="text-error text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-control gap-1">
                                <label class="label" for="subject">
                                    <span class="label-text font-medium">{{ __('Subject') }}</span>
                                </label>
                                <input name="subject" type="text" id="subject"
                                       class="input input-bordered w-full @error('subject') input-error @enderror"
                                       value="{{ old('subject') }}"
                                       placeholder="{{ __('What is it about?') }}" />
                                @error('subject')
                                    <p class="text-error text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-control gap-1">
                                <label class="label" for="message">
                                    <span class="label-text font-medium">{{ __('Message') }}</span>
                                </label>
                                <textarea name="message" id="message" rows="5"
                                          class="textarea textarea-bordered w-full @error('message') textarea-error @enderror"
                                          placeholder="{{ __('Type your message here …') }}">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-error text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="divider text-xs text-base-content/40">{{ __('Spam protection') }}</div>

                            <div class="form-control gap-1">
                                <label class="label" for="name">
                                    <span class="label-text font-medium">{{ __('What is 3 + 3?') }}</span>
                                </label>
                                <input name="name" type="text" id="name"
                                       class="input input-bordered w-28 @error('name') input-error @enderror" />
                                @error('name')
                                    <p class="text-error text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="card-actions justify-end pt-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send message') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="md:col-span-2 flex flex-col gap-6">
                <div class="card bg-base-200 shadow-xl">
                    <div class="card-body gap-3">
                        <h3 class="font-bold text-lg">{{ __('Questions & suggestions') }}</h3>
                        <p class="text-base-content/60 text-sm leading-relaxed">
                            {{ __('Use the form for support requests, feature wishes or general questions. We will get back to you as soon as possible.') }}
                        </p>
                        <div class="divider my-1"></div>
                        <ul class="flex flex-col gap-2 text-sm text-base-content/70">
                            <li class="flex items-center gap-2">
                                <x-icons.check class="size-4 text-success shrink-0" />
                                {{ __('Support & help') }}
                            </li>
                            <li class="flex items-center gap-2">
                                <x-icons.check class="size-4 text-success shrink-0" />
                                {{ __('Feature wishes') }}
                            </li>
                            <li class="flex items-center gap-2">
                                <x-icons.check class="size-4 text-success shrink-0" />
                                {{ __('Feedback & criticism') }}
                            </li>
                        </ul>
                    </div>
                </div>

                <img src="{{ asset('images/contact.png') }}" alt="{{ __('Contact') }}"
                     class="w-full max-h-48 object-contain opacity-80">
            </div>

        </div>
    </div>
</div>
@endsection
