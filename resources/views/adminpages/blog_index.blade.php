@extends('admin.main')

@section('main-section')
<div class="container mt-5">
    <h2>All Blogs</h2>
    <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">Add New Blog</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Author</th>
                <th>Published At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $key => $blog)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td><img src="{{ asset('uploads/blogs/' . $blog->image) }}" width="80"></td>
                <td>{{ $blog->title }}</td>
                 <td>{{ $blog->short_description }}</td>
                <td>{{ $blog->category }}</td>
                <td>{{ $blog->author_name }}</td>
                <td>{{ \Carbon\Carbon::parse($blog->published_at)->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline-block; margin-top:10px;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
