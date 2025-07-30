@extends('admin.main')

@section('main-section')
<div class="container py-5">
    <div class="card shadow p-4">
        <h2 class="mb-4 text-center">All Services</h2>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('services.index') }}" class="mb-4 d-flex align-items-center gap-2 flex-wrap">
            <select name="type" class="form-select w-auto">
                <option value="">-- Filter by Type --</option>
                <option value="catering" {{ request('type') == 'catering' ? 'selected' : '' }}>Catering</option>
                <option value="photography" {{ request('type') == 'photography' ? 'selected' : '' }}>Photography</option>
                <option value="transportation" {{ request('type') == 'transportation' ? 'selected' : '' }}>Transportation</option>
            </select>
            <button class="btn btn-primary">Search</button>
            <a href="{{ route('services.index') }}" class="btn btn-secondary">Reset</a>
        </form>

        <a href="{{ route('services.create') }}" class="btn btn-success mb-3">Add New Service</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($services as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->type }}</td>
                        <td>₹{{ number_format($item->price) }}</td>
                        <td>{{ $item->description }}</td>
                        <td><img src="{{ asset('uploads/services/' . $item->image) }}" width="80"></td>
                        <td>
                            <a href="{{ route('services.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('services.destroy', $item->id) }}" method="POST" style="display:inline-block; margin-top:10px;">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
