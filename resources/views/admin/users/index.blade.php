@extends('templates.main')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Users.</h1>
    <a class="btn btn-success btn-sm gap-2" href="{{ route('admin.users.create') }}">
        Create
    </a>
</div>

<div class="card bg-base-200 shadow">
    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th>#Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="flex gap-2">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                            <button type="button" class="btn btn-error btn-sm"
                                    onclick="document.getElementById('delete-user-form-{{ $user->id }}').submit();">
                                Delete
                            </button>
                            <form id="delete-user-form-{{ $user->id }}"
                                  action="{{ route('admin.users.destroy', $user->id) }}"
                                  method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-4">{{ $users->links() }}</div>
</div>

@endsection
