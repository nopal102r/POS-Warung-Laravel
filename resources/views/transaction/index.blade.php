@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Transaction List</h1>
    <a href="{{ route('transaction.create') }}" class="btn btn-primary mb-3">Add Transaction</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Buyer</th>
                <th>Payment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->product->name }}</td>
                    <td>{{ $transaction->buyer->name }}</td>
                    <td>{{ $transaction->payment->name }}</td>
                    <td>
                        <a href="{{ route('transaction.edit', $transaction->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('transaction.destroy', $transaction->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
