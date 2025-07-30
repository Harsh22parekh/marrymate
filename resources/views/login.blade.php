@extends('layout.main') 
@section('main-section')

<div class="container min-vh-100 d-flex justify-content-center align-items-center pt-5">
    <div class="card shadow p-4" style="width: 400px;">
        <h2 class="text-center mb-4">Login to Marry Mate</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>

            <div class="form-group mt-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
        </form>

        <div class="text-center mt-3">
            <small>Don't have an account? 
            <a href="{{ route('register') }}" style="color: #007bff;">Register here</a>
            </small>
        </div>
    </div>
</div>

@endsection
