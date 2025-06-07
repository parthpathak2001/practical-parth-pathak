@extends('layouts.app')
@section('content')
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-header text-center">Sign Up</div>
        <div class="card-body">
            <form id="signupForm" method="POST" action="{{ route('register.post') }}">
                @csrf
                <div class="mb-3">
                    <label>First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}"
                        class="form-control @error('first_name') is-invalid @enderror">
                    @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}"
                        class="form-control @error('last_name') is-invalid @enderror">
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label>Gender</label>
                    <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                        <option value="">Select Gender</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-user-plus me-1"></i> Register</button>
                <p class="text-center mt-3">
                    Already have an account? <a href="{{ route('login') }}">Sign in here</a>
                </p>

            </form>
        </div>
    </div>

    <script>
        $('#signupForm').validate({
            rules: {
                first_name: 'required',
                last_name: 'required',
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                password_confirmation: {
                    required: true,
                    equalTo: '[name="password"]'
                },
                gender: 'required'
            },
            errorClass: 'text-danger is-invalid',
        });
    </script>
@endsection
