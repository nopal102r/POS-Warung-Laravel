@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-center mb-4 text-primary" style="font-family: 'Playfair Display', serif;">
        <i class="bi bi-info-circle me-2"></i>Transaction Detail
    </h2>

    <div class="card shadow border-0 rounded-4">
        <div class="card-body px-4 py-4">
            <h5 class="card-title mb-4">
                <span class="text-muted">Transaction ID:</span>
                <span class="badge bg-primary fs-6">{{ $transaction->id }}</span>
            </h5>

            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item d-flex justify-content-between">
                    <strong><i class="bi bi-box"></i> Product</strong>
                    <span>{{ $transaction->product->name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <strong><i class="bi bi-person"></i> Buyer</strong>
                    <span>{{ $transaction->buyer->name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <strong><i class="bi bi-credit-card-2-front"></i> Payment Method</strong>
                    <span class="badge bg-success">{{ $transaction->payment->name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <strong><i class="bi bi-hash"></i> Quantity</strong>
                    <span>{{ $transaction->quantity }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <strong><i class="bi bi-cash-stack"></i> Total Price</strong>
                    <span class="text-success fw-bold">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <strong><i class="bi bi-calendar-event"></i> Date</strong>
                    <span>{{ $transaction->created_at->format('d-m-Y H:i') }}</span>
                </li>
            </ul>

            <div class="text-end">
                <a href="{{ route('transaction.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Back to Transactions
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
