@extends('layout.main')
@section('main-section')
<main>
    <!-- Slider Area Start -->
    <div class="slider-area2">
        <div class="single-slider slider-height2 hero-overly d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap">
                            <h2>About Us</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider End -->

    <!-- Our Story Start -->
    <div class="Our-story-area story-padding">
        <div class="container">
            <!-- Section Title -->
            <div class="row d-flex justify-content-center">
                <div class="col-xl-8 col-lg-9">
                    <div class="section-tittle text-center mb-70">
                        <h2>{{ $about->main_title ?? 'Welcome to Marry Mate' }}</h2>
                        <img src="{{ asset('wed-master/assets/img/gallery/tittle_img.png') }}" alt="">
                        <p>{{ $about->main_description ?? 'Default description here if not set.' }}</p>
                    </div>
                </div>
            </div>

            <!-- Our Mission and Features -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-5">
                    <div class="story-caption background-img mb-40" style="background-image: url('{{ asset('wed-master/assets/img/gallery/story2.jpg') }}');">
                        <div class="story-details">
                            <h4>{{ $about->mission_title ?? 'Our Mission' }}</h4>
                            <p>{{ $about->mission_content_1 ?? 'Default mission para 1.' }}</p>
                            <p>{{ $about->mission_content_2 ?? 'Default mission para 2.' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="story-img">
                        <img class="story2" style="margin-left:100px;" src="{{ asset('wed-master/assets/img/gallery/story1.jpg') }}" alt="">
                    </div>
                </div>
            </div>

            <!-- Why Choose Us -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-tittle text-center">
                        <h3>{{ $about->why_choose_title ?? 'Why Choose Marry Mate?' }}</h3>
                    </div>
                    <div class="row mt-4">
                    @php
                        // already passed from controller
                    @endphp


                      @foreach($features as $feature)
                        <div class="col-md-4 mb-4">
                            <div class="card p-3 text-center shadow-sm h-100" style="border-radius: 15px;">
                                <div style="font-size: 30px;">{{ $feature['icon'] }}</div>
                                <p class="mt-2">{{ $feature['text'] }}</p>
                            </div>
                        </div>
                    @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Story End -->

    <!-- Gallery Section Start -->
    <div class="gallery-area2 fix  mb-5">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="gallery-active owl-carousel">
                        @for($i = 1; $i <= 8; $i++)
                            <div class="gallery-img">
                                <a href="#"><img src="{{ asset('wed-master/assets/img/gallery/gallery0' . $i . '.png') }}" alt="gallery image {{ $i }}"></a>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Section End -->
</main>
@endsection
