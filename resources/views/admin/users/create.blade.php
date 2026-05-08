@extends('templates.main')

@section('content')

<h1 class="text-2xl font-bold mb-6">Create new user.</h1>

<div class="card bg-base-200 shadow w-full max-w-md">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.users.store') }}">
            @include('admin.users.partials.form', ['create' => true])
        </form>
    </div>
</div>

@endsection
