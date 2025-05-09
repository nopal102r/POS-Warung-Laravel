@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-center text-success mb-4" style="font-family: 'Playfair Display', serif;">
        <i class="bi bi-plus-square me-2"></i>Create New Transaction
    </h2>

    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body px-4 py-4">
            <form action="{{ route('transaction.store') }}" method="POST">
                @csrf
                <div class="mb-3">
    <label for="product_id" class="form-label fw-semibold d-block">
        <i class="bi bi-box-seam me-1"></i>Product
    </label>
    <select name="product_id" id="product_id" class="form-select" required>
        <option disabled selected>Select Product</option>
        @foreach($products as $product)
            <option value="{{ $product->id }}">
                {{ $product->name }} - Rp {{ number_format($product->price, 0, ',', '.') }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="quantity" class="form-label fw-semibold d-block">
        <i class="bi bi-hash me-1"></i>Quantity
    </label>
    <input type="number" name="quantity" id="quantity" class="form-control"
        value="{{ old('quantity', 1) }}" min="1" required>
</div>

<div class="mb-3">
    <label for="buyer_id" class="form-label fw-semibold d-block">
        <i class="bi bi-person-circle me-1"></i>Buyer
    </label>
    <select name="buyer_id" id="buyer_id" class="form-select" required>
        <option disabled selected>Select Buyer</option>
        @foreach($buyers as $buyer)
            <option value="{{ $buyer->id }}">{{ $buyer->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label for="payment_id" class="form-label fw-semibold d-block">
        <i class="bi bi-credit-card-2-front me-1"></i>Payment Method
    </label>
    <select name="payment_id" id="payment_id" class="form-select" required>
        <option disabled selected>Select Payment</option>
        @foreach($payments as $payment)
            <option value="{{ $payment->id }}">{{ $payment->name }}</option>
        @endforeach
    </select>
</div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-check-circle me-1"></i> Save Transaction
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
