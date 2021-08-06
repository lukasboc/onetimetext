@extends('templates.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h1 >Users.</h1>
        </div>
    </div>

    <div class="card">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">Key</th>
                <th scope="col">Value</th>
            </tr>
            </thead>
            <tbody>
            @can('is-admin')
            @foreach($secrets as $secret)
                <tr>
                    <th scope="row">{{ $secret->id }}</th>
                    <td>{{ $secret->key }}</td>
                    <td>{{ $secret->value }}</td>
                </tr>
            @endforeach
            @endcan

            </tbody>
        </table>
    </div>
@endsection
