@extends('templates.main')

@section('content')
    <h1>{{ __('Verify email address.') }}</h1>
    <p>{{ __('You must verify your email address to access this page.') }}</p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary">{{ __('Resend email') }}</button>
    </form>
@endsection
