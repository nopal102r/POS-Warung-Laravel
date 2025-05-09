@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2><i class="bi bi-pencil-square me-2"></i>Edit Payment Method</h2>
        <a href="{{ route('payment.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('payment.update', $payment->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Payment Name</label>
                    <input type="text" name="name" id="name" value="{{ $payment->name }}" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
