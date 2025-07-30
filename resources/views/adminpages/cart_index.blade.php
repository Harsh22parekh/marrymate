@extends('admin.main')

@section('main-section')
<div class="container py-5">
    <div class="card shadow p-4">
        <h3 class="mb-4">Order Details (ID: {{ $order->id }})</h3>

        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>User Name:</strong> {{ $order->name }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $order->email }}</li>
            <li class="list-group-item"><strong>Phone:</strong> {{ $order->phone }}</li>
            <li class="list-group-item"><strong>Booking Date:</strong> {{ $order->booking_date }}</li>
            <li class="list-group-item"><strong>Address:</strong> {{ $order->address }}</li>
            <li class="list-group-item"><strong>Payment ID:</strong> {{ $order->payment_id }}</li>
            <li class="list-group-item"><strong>Total:</strong> ₹{{ number_format($order->total) }}</li>
            <li class="list-group-item">
                <strong>Status:</strong> 
                @if($order->status == 'pending')
                    <span class="badge bg-warning text-dark">Pending</span>
                @elseif($order->status == 'done')
                    <span class="badge bg-success">Done</span>
                @elseif($order->status == 'cancelled')
                    <span class="badge bg-danger">Cancelled</span>
                @else
                    <span class="badge bg-secondary">Unknown</span>
                @endif
            </li>
        </ul>

        <h5>Items:</h5>
        @if($order->bookingItems && $order->bookingItems->count())
            <table class="table table-bordered table-striped align-middle text-center mt-3">
                <thead class="table-secondary">
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->bookingItems as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->service_id ? 'Service' : 'Package' }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>₹{{ number_format($item->price) }}</td>
                            <td>
                                <img src="{{ $item->service_image }}" alt="img" width="60" class="rounded">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-muted">No items found in this booking.</p>
        @endif

        <a href="{{ route('admin.orders') }}" class="btn btn-secondary mt-3">Back to Orders</a>
    </div>
</div>
@endsection
