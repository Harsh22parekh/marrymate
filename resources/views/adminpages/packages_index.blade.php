@extends('admin.main')

@section('main-section')
<div class="container py-5">
    <div class="card shadow p-4">
        <h2 class="mb-4 text-center">All Packages</h2>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('packages.index') }}" class="mb-4 d-flex align-items-center gap-2 flex-wrap">
            <select name="type" class="form-select w-auto">
                <option value="">-- Filter by Type --</option>
                <option value="venue" {{ request('type') == 'venue' ? 'selected' : '' }}>Venue</option>
                <option value="music" {{ request('type') == 'music' ? 'selected' : '' }}>Music</option>
                <option value="makeup-styling" {{ request('type') == 'makeup-styling' ? 'selected' : '' }}>Makeup</option>
                <option value="wedding-dress" {{ request('type') == 'wedding-dress' ? 'selected' : '' }}>Dress</option>
                <option value="invitation-card" {{ request('type') == 'invitation-card' ? 'selected' : '' }}>Invitation</option>
            </select>
            <button class="btn btn-primary">Search</button>
            <a href="{{ route('packages.index') }}" class="btn btn-secondary">Reset</a>
        </form>

        <!-- Add Button -->
        <a href="{{ route('packages.create') }}" class="btn btn-success mb-3">Add New Package</a>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Package Table -->
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Gender</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($packages as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->gender ?? '-' }}</td>
                        <td>₹{{number_format($item->price) }}</td>
                        <td>{{ $item->description }}</td>
                        <td><img src="{{ asset('uploads/packages/' . $item->image) }}" width="80"></td>
                        <td>
                            <a href="{{ route('packages.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('packages.destroy', $item->id) }}" method="POST"  style="display:inline-block; margin-top:10px;">
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
