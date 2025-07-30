@extends('admin.main') 
@section('main-section')

<div class="container mt-4">
    <h2>Edit About Us</h2>

    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-group mb-3">
            <label>Main Title</label>
            <input type="text" name="main_title" value="{{ $about->main_title }}" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Main Description</label>
            <textarea name="main_description" class="form-control" rows="4">{{ $about->main_description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Mission Title</label>
            <input type="text" name="mission_title" value="{{ $about->mission_title }}" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Mission Content 1</label>
            <textarea name="mission_content_1" class="form-control" rows="3">{{ $about->mission_content_1 }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Mission Content 2</label>
            <textarea name="mission_content_2" class="form-control" rows="3">{{ $about->mission_content_2 }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Main Image</label><br>
            @if($about->main_image)
                <img src="{{ asset('uploads/about/' . $about->main_image) }}" width="120" class="mb-2">
            @endif
            <input type="file" name="main_image" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Mission Image</label><br>
            @if($about->mission_image)
                <img src="{{ asset('uploads/about/' . $about->mission_image) }}" width="120" class="mb-2">
            @endif
            <input type="file" name="mission_image" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Mission BG Image</label><br>
            @if($about->mission_bg_image)
                <img src="{{ asset('uploads/about/' . $about->mission_bg_image) }}" width="120" class="mb-2">
            @endif
            <input type="file" name="mission_bg_image" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Features (one per line, format: icon | text)</label>
            <textarea name="features" class="form-control" rows="5">@foreach($features as $feature){{ $feature['icon'] }} | {{ $feature['text'] }}
@endforeach</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>

@endsection
