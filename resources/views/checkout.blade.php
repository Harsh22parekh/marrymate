@extends('layout.main')

@section('main-section')
<div class="container py-5" style="max-width: 1000px;">
    <div class="card shadow-lg p-4">
        <h2 class="mb-4">Checkout</h2>

        {{-- ✅ One Unified Form --}}
        <form action="{{ url('/place-order') }}" method="POST" id="rzp-form">
            @csrf

            {{-- User Details --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control" required />
                </div>

                <div class="col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required />
                </div>

                <div class="col-md-6 mb-3">
                    <label for="phone">Mobile Number</label>
                    <input type="text" name="phone" id="phone" class="form-control" required />
                </div>

                <div class="col-md-6 mb-3">
                    <label for="booking_date">Booking Date</label>
                    <input type="date" name="booking_date" id="booking_date" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" class="form-control" rows="3" required></textarea>
                </div>
            </div>

            {{-- Hidden Razorpay Fields --}}
            <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
            <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">

            {{-- Cart Summary --}}
            <h4 class="mt-4">Your Services</h4>
            <ul class="list-group mb-4">
                @foreach($cart as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            @php
                                $folder = ($item['type'] === 'package') ? 'packages' : 'services';
                                $imageUrl = asset('uploads/' . $folder . '/' . $item['image']);
                            @endphp 

                            <img src="{{ $imageUrl }}" alt="{{ $item['name'] }}" style="width: 70px; height: 70px; object-fit: cover; border-radius: 10px; margin-right: 15px;">
                            <div>
                                <strong>{{ $item['name'] }}</strong><br>
                                <small>{{ $item['qty'] }} x ₹{{ $item['price'] }}</small>
                            </div>
                        </div>
                        <div>₹{{ $item['qty'] * $item['price'] }}</div>
                    </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <strong>Total</strong>
                    <strong>₹{{ $total }}</strong>
                </li>
            </ul>

            {{-- Razorpay Button --}}
            <button id="pay-btn" class="btn btn-primary w-100">Pay with Razorpay</button>
        </form>
    </div>
</div>

{{-- Razorpay Script --}}
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
document.getElementById('pay-btn').onclick = function(e){
    e.preventDefault();

    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let phone = document.getElementById('phone').value;
    let booking_date = document.getElementById('booking_date').value;
    let address = document.getElementById('address').value;

    if (!name || !email || !phone || !booking_date || !address) {
        alert("Please fill all fields.");
        return;
    }

    fetch("{{ url('/api/create-razorpay-order') }}", {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ amount: {{ $total }} })
    })
    .then(res => res.json())
    .then(data => {
        let options = {
            "key": "{{ env('RAZORPAY_KEY') }}",
            "amount": data.amount,
            "currency": "INR",
            "name": "MarryMate",
            "description": "Wedding Booking",
            "order_id": data.id,
            "prefill": {
                "name": name,
                "email": email,
                "contact": phone
            },
            "handler": function (response){
                document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
                document.getElementById('rzp-form').submit();
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    })
    .catch(err => {
        alert("Something went wrong creating Razorpay order.");
        console.error(err);
    });
};
</script>

@endsection
