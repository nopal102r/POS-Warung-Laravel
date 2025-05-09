@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2><i class="bi bi-plus-circle me-2"></i>Add Payment Method</h2>
        <a href="{{ route('payment.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('payment.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Payment Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="e.g., Cash, QRIS" required>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle"></i> Save
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
