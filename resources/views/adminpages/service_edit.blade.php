@extends('admin.main')

@section('main-section')
<div class="container py-5">
    <div class="card shadow p-4">
        <h2 class="mb-4 text-center">Edit Service</h2>

        <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf 
            @method('PUT')

            <div class="form-group mb-3">
                <label>Name</label>
                <input name="name" class="form-control" value="{{ $service->name }}" required>
            </div>

            <div class="form-group mb-3">
                <label>Type</label>
                <input name="type" class="form-control" value="{{ $service->type }}" required>
            </div>

            <div class="form-group mb-3">
                <label>Price</label>
                <input type="number" name="price" class="form-control" value="{{ number_format($service->price) }}" required>
            </div>

            <div class="form-group mb-3">
                <label>Description</label>
                <textarea name="description" rows="4" class="form-control">{{ $service->description }}</textarea>
            </div>

            <div class="form-group mb-4">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
                <div class="mt-2">
                    <img src="{{ asset('uploads/services/' . $service->image) }}" width="100" alt="Service Image">
                </div>
            </div>

            <button class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
