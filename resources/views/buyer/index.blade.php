@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary"><i class="bi bi-people-fill me-2"></i> Buyer List</h2>
        <a href="{{ route('buyer.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Add Buyer
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i><strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-lg">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($buyers as $buyer)
                        <tr>
                            <td>{{ $buyer->name }}</td>
                            <td>{{ $buyer->phone }}</td>
                            <td class="text-center">
                                <div class="d-inline-flex">
                                    <a href="{{ route('buyer.edit', $buyer->id) }}" class="btn btn-warning btn-sm me-2">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('buyer.destroy', $buyer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this buyer?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @if ($buyers->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center text-muted">No buyers found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
