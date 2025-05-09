@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-center text-primary mb-4" style="font-family: 'Playfair Display', serif;">
        <i class="bi bi-person-plus me-2"></i>Add New Buyer
    </h2>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>
            <strong>Whoops!</strong> Please fix the following errors:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('buyer.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter buyer's full name" required>
                    @error('name') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone number" required>
                    @error('phone') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-check-circle me-2"></i>Save Buyer
                    </button>
                    <a href="{{ route('buyer.index') }}" class="btn btn-secondary px-4">
                        <i class="bi bi-arrow-left-circle me-2"></i>Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
