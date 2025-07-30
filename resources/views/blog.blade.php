@extends('layout.main')

@section('main-section')
<main>
    <!-- Hero Section -->
    <div class="slider-area2">
        <div class="single-slider slider-height2 hero-overly d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap">
                            <h2>Our Blog</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Area -->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <!-- Left Blog Content -->
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">

                        @foreach ($blogs as $blog)
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="{{ $blog->title }}">
                                <a href="#" class="blog_item_date">
                                    <h3>{{ \Carbon\Carbon::parse($blog->published_at)->format('d') }}</h3>
                                    <p>{{ \Carbon\Carbon::parse($blog->published_at)->format('M') }}</p>
                                </a>
                            </div>
                            <div class="blog_details">
                                <a class="d-inline-block" href="{{ route('blogs.show', $blog->slug) }}">
                                    <h2 class="blog-head">{{ $blog->title }}</h2>
                                </a>
                                <p>{{ Str::limit($blog->short_description, 150) }}</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> {{ $blog->category }}</a></li>
                                    <li><a href="#"><i class="fa fa-user"></i> By {{ $blog->author_name }}</a></li>
                                </ul>
                            </div>
                        </article>
                        @endforeach

                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $blogs->links() }}
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar -->
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">

                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search Keyword">
                                        <div class="input-group-append">
                                            <button class="btns" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Categories</h4>
                            <ul class="list cat-list">
                                @php
                                    $categories = \App\Models\Blog::select('category')->distinct()->get();
                                @endphp
                                @foreach ($categories as $cat)
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>{{ $cat->category }}</p>
                                        <p>({{ \App\Models\Blog::where('category', $cat->category)->count() }})</p>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Posts</h3>
                            @php
                                $recentPosts = \App\Models\Blog::orderBy('published_at', 'desc')->take(3)->get();
                            @endphp
                            @foreach ($recentPosts as $recent)
                            <div class="media post_item">
                                <img src="{{ asset('uploads/blogs/' . $recent->image) }}" width="80" alt="{{ $recent->title }}">
                                <div class="media-body">
                                    <a href="{{ route('blogs.show', $recent->slug) }}">
                                        <h3>{{ Str::limit($recent->title, 40) }}</h3>
                                    </a>
                                    <p>{{ \Carbon\Carbon::parse($recent->published_at)->diffForHumans() }}</p>

                                </div>
                            </div>
                            @endforeach
                        </aside>

                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Subscribe</h4>

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                                <form action="{{ route('subscribe.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                                    </div>
                                    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Subscribe</button>
                                </form>
                                @if(session('success'))
                                    <p style="color:green;">{{ session('success') }}</p>
                                @endif
                        </aside>


                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
