@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">Payment List</h1>
    <a href="{{ route('payment.create') }}" class="btn btn-primary mb-3">Add Payment</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $index => $payment)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $payment->name }}</td>
                <td>
                    <a href="{{ route('payment.edit', $payment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('payment.destroy', $payment->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
