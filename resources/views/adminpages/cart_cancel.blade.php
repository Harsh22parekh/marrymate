@extends('admin.main')

@section('main-section')
<div class="container-xl  py-5">
    <h3 class="mb-4">❌ Cancelled Bookings</h3>

    @if($orders->count())
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Payment ID</th>
                    <th>Status</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->booking_date }}</td>
                    <td>₹{{ number_format($order->total) }}</td>
                    <td>{{ $order->payment_id }}</td>
                    <td><span class="badge bg-danger">{{ ucfirst($order->status) }}</span></td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">No cancelled bookings found.</div>
    @endif
</div>
@endsection
