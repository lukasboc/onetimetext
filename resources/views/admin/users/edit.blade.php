@extends('templates.main')

@section('content')

<h1 class="text-2xl font-bold mb-6">Edit user.</h1>

<div class="card bg-base-200 shadow w-full max-w-md">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @method('PATCH')
            @include('admin.users.partials.form')
        </form>
    </div>
</div>

@endsection
