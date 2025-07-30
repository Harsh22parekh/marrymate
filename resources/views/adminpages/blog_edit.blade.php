@extends('admin.main')

@section('main-section')
<div class="container mt-5">
    <h2>Edit Blog</h2>
    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ $blog->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Slug</label>
            <input type="text" name="slug" value="{{ $blog->slug }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" value="{{ $blog->category }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Short Description</label>
            <textarea name="short_description" class="form-control" rows="3" required>{{ $blog->short_description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="6" required>{{ $blog->content }}</textarea>
        </div>

        <div class="mb-3">
            <label>Author Name</label>
            <input type="text" name="author_name" value="{{ $blog->author_name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Published At</label>
            <input type="datetime-local" name="published_at" value="{{ \Carbon\Carbon::parse($blog->published_at)->format('Y-m-d\TH:i') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Current Image:</label><br>
            <img src="{{ asset('uploads/blogs/' . $blog->image) }}" width="150">
        </div>

        <div class="mb-3">
            <label>Change Image (optional):</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Blog</button>
    </form>
</div>
@endsection
