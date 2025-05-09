@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-center text-primary mb-4" style="font-family: 'Playfair Display', serif;">
        <i class="bi bi-pencil-square me-2"></i>Edit Product
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
            <form action="{{ route('product.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price (Rp)</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required>
                </div>

                <div class="mb-4">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option value="" disabled>Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-check-circle me-2"></i> Update Product
                    </button>
                    <a href="{{ route('product.index') }}" class="btn btn-secondary px-4">
                        <i class="bi bi-arrow-left-circle me-2"></i> Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
