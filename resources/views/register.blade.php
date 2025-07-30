@extends('layout.main')

@section('main-section')
<div class="container min-vh-100 d-flex justify-content-center align-items-center pt-5">
    <div class="card shadow p-4" style="width: 420px;">
        <h2 class="text-center mb-4">Create your Marry&nbsp;Mate account</h2>

        {{-- Success / error flash messages --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Validation errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            {{-- Name --}}
            <div class="form-group">
                <label for="name">Full name</label>
                <input type="text"
                       id="name"
                       name="name"
                       value="{{ old('name') }}"
                       class="form-control"
                       required>
            </div>

            {{-- Email --}}
            <div class="form-group mt-3">
                <label for="email">Email address</label>
                <input type="email"
                       id="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="form-control"
                       required>
            </div>

            {{-- Password --}}
            <div class="form-group mt-3">
                <label for="password">Password</label>
                <input type="password"
                       id="password"
                       name="password"
                       class="form-control"
                       required>
            </div>

            {{-- Confirm password --}}
            <div class="form-group mt-3">
                <label for="password_confirmation">Confirm password</label>
                <input type="password"
                       id="password_confirmation"
                       name="password_confirmation"
                       class="form-control"
                       required>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-4">Register</button>
        </form>

        <div class="text-center mt-3">
            <small>Already have an account?
                <a href="{{ route('login') }}" style="color: #007bff;">Login here</a>
            </small>
        </div>
    </div>
</div>
@endsection
