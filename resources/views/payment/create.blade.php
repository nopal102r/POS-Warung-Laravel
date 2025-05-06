@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">Add Payment Method</h1>

    <form action="{{ route('payment.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Payment Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
