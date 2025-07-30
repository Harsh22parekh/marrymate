@extends('layout.main')

@section('main-section')

<!-- ======= Blog Details Section ======= -->
<section class="container py-5">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">

            <!-- Blog Title -->
            <h1 class="mb-3">{{ $blog->title }}</h1>

            <!-- Author & Date -->
            <div class="mb-3 text-muted">
                By <strong>{{ $blog->author_name }}</strong> |
                {{ \Carbon\Carbon::parse($blog->published_at)->format('d M, Y') }}
            </div>

            <!-- Blog Image -->
            <div class="mb-4">
                <img src="{{ asset('uploads/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid rounded">
            </div>

            <!-- Blog Short Description -->
            <p class="lead">{{ $blog->short_description }}</p>

            <!-- Blog Full Content -->
            <div class="mt-4">
                {!! nl2br(e($blog->content)) !!}
            </div>

        </div>
    </div>
</section>

@endsection
