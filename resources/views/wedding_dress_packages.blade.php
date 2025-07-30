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
            <h2 class="mb-5 text-center text-capitalize">{{ $type }} Packages</h2>

            {{-- For Men --}}
            <h3 class="mb-4">For Men</h3>
            <div class="row">
                @forelse ($menPackages as $item)
                    <div class="col-md-4 mb-4 d-flex align-items-stretch">
                        <div class="card shadow h-100">
                            <img src="{{ asset('uploads/packages/' . $item->image) }}" class="card-img-top" style="height:250px; object-fit:contain;" alt="{{ $item->name }}">
                            <div class="card-body d-flex flex-column">
                                <h4 class="text-center">{{ $item->name }}</h4>
                                <p class="flex-grow-1">{{ $item->description }}</p>
                                <p class="text-center"><strong>Price:</strong> ₹{{ number_format($item->price) }}</p>
                                <a href="{{ url('/add-package-to-cart/' . $item->id) }}" class="btn btn-custom mt-auto">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No men's wedding dress packages found.</p>
                @endforelse
            </div>

            {{-- For Women --}}
            <h3 class="mt-5 mb-4"> For Women</h3>
            <div class="row">
                @forelse ($womenPackages as $item)
                    <div class="col-md-4 mb-4 d-flex align-items-stretch">
                        <div class="card shadow h-100">
                            <img src="{{ asset('uploads/packages/' . $item->image) }}" class="card-img-top" style="height:250px; object-fit:contain;" alt="{{ $item->name }}">
                            <div class="card-body d-flex flex-column">
                                <h4 class="text-center">{{ $item->name }}</h4>
                                <p class="flex-grow-1">{{ $item->description }}</p>
                                <p class="text-center"><strong>Price:</strong> ₹{{ number_format($item->price) }}</p>
                                <a href="{{ route('cart.add.package', ['id' => $item->id]) }}" class="btn btn-custom mt-auto">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No women's wedding dress packages found.</p>
                @endforelse
            </div>
        </div>
    </section>
</main>
@endsection
