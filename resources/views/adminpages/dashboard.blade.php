@extends('admin.main')

@section('main-section')
<div class="container py-4">
    <h3 class="mb-4">Admin Dashboard</h3>

    {{-- 🔢 Summary Cards --}}
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <h6>Total Bookings</h6>
                    <h3>{{ $totalBookings }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success shadow">
                <div class="card-body">
                    <h6>Service Bookings</h6>
                    <h3>{{ $totalServiceBookings }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning shadow">
                <div class="card-body">
                    <h6>Package Bookings</h6>
                    <h3>{{ $totalPackageBookings }}</h3>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-3">
    <div class="card text-white" style="background-color: #6f42c1;"> 
        <div class="card-body">
            <h6>Total Users</h6>
            <h3>{{ $totalUsers }}</h3>
        </div>
    </div>
</div>

        <div class="col-md-3 mb-3">
            <div class="card text-white bg-info shadow">
                <div class="card-body">
                    <h6>Catering Services</h6>
                    <h3>{{ $cateringCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-secondary shadow">
                <div class="card-body">
                    <h6>Photography Services</h6>
                    <h3>{{ $photographyCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-danger shadow">
                <div class="card-body">
                    <h6>Total Revenue</h6>
                    <h3>₹{{ number_format($totalRevenue) }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- 📊 Booking Chart --}}
    <div class="card shadow">
        <div class="card-header bg-white">
            <h5 class="mb-0">Bookings Distribution</h5>
        </div>
        <div style="width: 300px; height: 300px; margin: auto;">
    <canvas id="bookingChart"></canvas>
</div>

    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('bookingChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Service Bookings', 'Package Bookings'],
            datasets: [{
                data: [{{ $totalServiceBookings }}, {{ $totalPackageBookings }}],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(255, 206, 86, 0.7)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endsection
