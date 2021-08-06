@extends('templates.main')

@section('content')
    <h1>Verify e-mail address.</h1>
    <p>You must verify your email address to access this page.</p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Resend email</button>
    </form>
@endsection
