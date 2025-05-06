@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Transaction</h1>

    <form action="{{ route('transaction.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Product</label>
            <select name="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Buyer</label>
            <select name="buyer_id" class="form-control" required>
                @foreach($buyers as $buyer)
                    <option value="{{ $buyer->id }}">{{ $buyer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Payment</label>
            <select name="payment_id" class="form-control" required>
                @foreach($payments as $payment)
                    <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
