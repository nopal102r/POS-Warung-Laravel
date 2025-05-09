@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-center mb-4" style="font-family: 'Playfair Display', serif;">
        <i class="bi bi-pencil-square me-2"></i>Edit Transaction
    </h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('transaction.update', $transaction->id) }}" method="POST">
                @csrf @method('PUT')

                <div class="mb-3">
                    <label for="product_id" class="form-label">Product</label>
                    <select name="product_id" id="product_id" class="form-select" required>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ $transaction->product_id == $product->id ? 'selected' : '' }}>
                                {{ $product->name }} - Rp {{ number_format($product->price, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control"
                           value="{{ old('quantity', $transaction->quantity) }}" min="1" required>
                </div>

                <div class="mb-3">
                    <label for="buyer_id" class="form-label">Buyer</label>
                    <select name="buyer_id" id="buyer_id" class="form-select" required>
                        @foreach($buyers as $buyer)
                            <option value="{{ $buyer->id }}" {{ $transaction->buyer_id == $buyer->id ? 'selected' : '' }}>
                                {{ $buyer->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="payment_id" class="form-label">Payment Method</label>
                    <select name="payment_id" id="payment_id" class="form-select" required>
                        @foreach($payments as $payment)
                            <option value="{{ $payment->id }}" {{ $transaction->payment_id == $payment->id ? 'selected' : '' }}>
                                {{ $payment->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save me-1"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
