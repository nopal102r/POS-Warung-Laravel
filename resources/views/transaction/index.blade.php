@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-center mb-4" style="font-family: 'Playfair Display', serif;">
        <i class="bi bi-receipt-cutoff me-2"></i>Transaction List
    </h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('transaction.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Add Transaction
        </a>
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-hover align-middle bg-white border">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Buyer</th>
                    <th>Payment</th>
                    <th>Qty</th>
                    <th>Total Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($transactions as $transaction)
                <tr class="text-center">
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->product->name }}</td>
                    <td>{{ $transaction->buyer->name }}</td>
                    <td>{{ $transaction->payment->name }}</td>
                    <td>{{ $transaction->quantity }}</td>
                    <td>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                    <td>
                        <!-- <a href="{{ route('transaction.edit', $transaction->id) }}" class="btn btn-sm btn-warning me-1">
                            <i class="bi bi-pencil-square"></i>
                        </a> -->
                        <a href="{{ route('transaction.show', $transaction->id) }}" class="btn btn-sm btn-info me-1">
                            <i class="bi bi-eye"></i> Detail
                        </a>
                        <!-- <form action="{{ route('transaction.destroy', $transaction->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form> -->
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No transactions available.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
