@extends('admin.main')

@section('main-section')
<div class="container py-5">
    <div class="card shadow p-4">
        <h2 class="mb-4 text-center">Add New Service</h2>

        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label>Name</label>
                <input name="name" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Type <small>(e.g. catering, photography)</small></label>
                <input name="type" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Price</label>
                <input type="number" name="price" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Description</label>
                <textarea name="description" rows="4" class="form-control"></textarea>
            </div>

            <div class="form-group mb-4">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
