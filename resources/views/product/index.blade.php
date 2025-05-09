@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-center text-primary mb-4" style="font-family: 'Playfair Display', serif;">
        <i class="bi bi-boxes me-2"></i>Product List
    </h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="{{ route('product.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle me-2"></i> Add New Product
    </a>

    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Price (Rp)</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil me-1"></i>Edit
                            </a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash me-1"></i>Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No products available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
