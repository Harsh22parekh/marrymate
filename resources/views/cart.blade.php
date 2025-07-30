@extends('layout.main')

@section('main-section')
<div class="container py-5">
    <div class="card shadow-lg p-4">
        <h2 class="mb-4">Your Cart</h2>

        @if(session('cart') && count(session('cart')) > 0)
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $grand = 0; @endphp
                        @foreach($cart as $id => $item)
                            @php $total = $item['qty'] * $item['price']; $grand += $total; @endphp
                            <tr>
                                <td>
                                    @php
                                        $folder = ($item['type'] === 'package') ? 'packages' : 'services';
                                    @endphp
                                    <img src="{{ asset('uploads/' . $folder . '/' . $item['image']) }}" alt="Image" width="80" class="rounded shadow">
                                </td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['type'] ?? '-' }}</td>

                                <td>
                                    <form action="{{ url('/cart/update') }}" method="POST" class="d-flex justify-content-center align-items-center gap-1">
                                        @csrf
                                       <input type="hidden" name="id" value="{{ $id }}">
                                        <input type="number" name="qty" value="{{ $item['qty'] }}" min="1" style="width: 60px;" class="form-control form-control-sm">
                                        <button type="submit" class="btn btn-sm px-3 py-4" style="font-size: 15px; margin-left:10px; background-color: #ffc107; border-color: #ffc107; color: #000;">
                                            Update
                                        </button>
                                    </form>
                                </td>

                                <td>₹{{ $item['price'] }}</td>
                                <td>₹{{ $total }}</td>
                                <td>
                                    <form method="POST" action="{{ url('/remove-from-cart') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="text-end"><strong>Grand Total:</strong></td>
                            <td colspan="2"><strong>₹{{ $grand }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <form action="{{ route('clear.cart') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        Clear Cart
                    </button>
                </form>

                <a href="{{ url('/checkout') }}" class="btn btn-success">
                    Proceed to Checkout
                </a>
            </div>

        @else
            <div class="alert alert-info text-center">
                Your cart is empty.
            </div>
        @endif
    </div>
</div>
@endsection
