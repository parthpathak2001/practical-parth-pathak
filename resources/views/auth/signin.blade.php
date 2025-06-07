@extends('layouts.app')
@section('content')
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-header text-center">Sign In</div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form id="signinForm" method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="form-check-label">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-success w-100"><i class="fa-solid fa-right-to-bracket me-1"></i> Login</button>
                <p class="text-center mt-3">
                    Don't have an account? <a href="{{ route('register') }}">Sign up here</a>
                </p>

            </form>
        </div>
    </div>

    <script>
        $('#signinForm').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: 'required'
            },
            errorClass: 'text-danger is-invalid',

        });
    </script>
@endsection
