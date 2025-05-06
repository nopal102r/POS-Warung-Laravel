@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Buyer List</h1>
    <a href="{{ route('buyer.create') }}" class="btn btn-primary mb-3">Add Buyer</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buyers as $buyer)
            <tr>
                <td>{{ $buyer->name }}</td>
                <td>{{ $buyer->phone }}</td>
                <td>
                    <a href="{{ route('buyer.edit', $buyer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('buyer.destroy', $buyer->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection