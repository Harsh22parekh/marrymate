@extends('layout.main')

@section('head')
<style>
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        transition: 0.3s ease-in-out;
    }

    .card-img-top {
        transition: transform 0.3s ease;
    }

    .card:hover .card-img-top {
        transform: scale(1.05);
    }

    .btn-custom {
        background-color: #ff5f8d;
        color: white;
        transition: background-color 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #e64575;
        color: white;
    }
</style>
@endsection

@section('main-section')
<main>
    <section class="py-5">
        <div class="container">
            <h2 class="mb-4 text-capitalize text-center">{{ $type }} Packages</h2>
            
            @php
                $label = 'Price';
                if (strtolower($type) === 'invitation-card') {
                    $label = 'Per 100 Cards';
                }
            @endphp

            <div class="row">
                @forelse ($packages as $item)
                    <div class="col-md-4 mb-4 d-flex align-items-stretch">
                        <div class="card shadow h-100">
                            <img src="{{ asset('uploads/packages/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}" style="height: 250px; object-fit: contain;">
                            <div class="card-body d-flex flex-column">
                                <h4 class="text-center">{{ $item->name }}</h4>
                                <p class="flex-grow-1">{{ $item->description }}</p>
                               <p class="text-center"><strong>{{ $label }}:</strong> ₹{{ number_format($item->price) }}</p>

                             <a href="{{ route('cart.add.package', ['id' => $item->id]) }}" class="btn btn-custom mt-auto">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No {{ $type }} packages found.</p>
                @endforelse
            </div>
        </div>
    </section>
</main>
@endsection
