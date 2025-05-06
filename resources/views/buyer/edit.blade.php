@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Buyer</h1>

    <form action="{{ route('buyer.update', $buyer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $buyer->name }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $buyer->phone }}" required>
            @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
