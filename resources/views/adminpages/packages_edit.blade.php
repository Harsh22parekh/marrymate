@extends('admin.main')

@section('main-section')
<div class="container py-5">
    <div class="card shadow p-4">
        <h2 class="mb-4 text-center">Edit Package</h2>

        <form action="{{ route('packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
            @csrf 
            @method('PUT')

            <div class="form-group mb-3">
                <label>Name</label>
                <input name="name" class="form-control" value="{{ $package->name }}" required>
            </div>

            <div class="form-group mb-3">
                <label>Type</label>
                <input name="type" class="form-control" value="{{ $package->type }}" required>
            </div>

            <div class="form-group">
                <label>Gender (only for wedding dress)</label>
                <select name="gender" class="form-control">
                    <option value="">-- Select Gender --</option>
                    <option value="men" {{ old('gender', $package->gender ?? '') == 'men' ? 'selected' : '' }}>Men</option>
                    <option value="women" {{ old('gender', $package->gender ?? '') == 'women' ? 'selected' : '' }}>Women</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Price</label>
                <input type="number" name="price" class="form-control" value="{{ number_format($package->price) }}" required>
            </div>

            <div class="form-group mb-3">
                <label>Description</label>
                <textarea name="description" rows="4" class="form-control">{{ $package->description }}</textarea>
            </div>

            <div class="form-group mb-4">
                <label>Image (optional)</label>
                <input type="file" name="image" class="form-control">
                <div class="mt-2">
                    <img src="{{ asset('uploads/packages/' . $package->image) }}" width="100" alt="Current Image">
                </div>
            </div>

            <button class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
