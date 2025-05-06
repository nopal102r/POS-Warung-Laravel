@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Transaction</h1>

    <form action="{{ route('transaction.update', $transaction->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Product</label>
            <select name="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $transaction->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Buyer</label>
            <select name="buyer_id" class="form-control" required>
                @foreach($buyers as $buyer)
                    <option value="{{ $buyer->id }}" {{ $transaction->buyer_id == $buyer->id ? 'selected' : '' }}>
                        {{ $buyer->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Payment</label>
            <select name="payment_id" class="form-control" required>
                @foreach($payments as $payment)
                    <option value="{{ $payment->id }}" {{ $transaction->payment_id == $payment->id ? 'selected' : '' }}>
                        {{ $payment->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
