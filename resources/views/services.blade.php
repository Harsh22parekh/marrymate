@extends('layout.main')

@section('main-section')
<main>

    <div class="slider-area2">
        <div class="single-slider slider-height2 hero-overly d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap">
                            <h2>{{ $type }} Services</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="service-section py-5">
        <div class="container">
            <div class="row">
                @php
                    $label = 'Cost';
                    if (strtolower($type) === 'catering') {
                        $label = 'Per Plate Cost';
                    } elseif (strtolower($type) === 'photography') {
                        $label = 'Starting Price';
                    } elseif (strtolower($type) === 'transportation') {
                        $label = 'Cost';
                    }
                @endphp

                @forelse ($services as $item)
                    <div class="col-md-4 mb-4 d-flex align-items-stretch">
                        <div class="card shadow h-100">
                            <img src="{{ asset('uploads/services/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title text-center">{{ $item->name }}</h4>
                                <p class="card-text flex-grow-1">{{ $item->description }}</p>
                               <p class="text-center"><strong>{{ $label }}:</strong> ₹{{ number_format($item->price) }}</p>
                               <a href="{{ route('cart.add.service', ['id' => $item->id]) }}" class="btn btn-custom mt-auto">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No {{ strtolower($type) }} services found.</p>
                @endforelse
            </div>
        </div>
    </section>

</main>
@endsection
