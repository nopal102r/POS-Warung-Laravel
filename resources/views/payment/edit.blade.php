@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">Edit Payment Method</h1>

    <form action="{{ route('payment.update', $payment->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Payment Name</label>
            <input type="text" name="name" class="form-control" value="{{ $payment->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
