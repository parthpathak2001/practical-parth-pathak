@extends('layouts.app')

@section('content')
<div class="container" style="min-height: 80vh;">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-6">
            <div class="text-center border p-4 shadow-sm rounded bg-white">
                <h3 class="mb-3">
                    <i class="fa-solid fa-user-check text-success me-2"></i>
                    Welcome, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                </h3>
                <p class="text-muted">You're logged in successfully.</p>

                <form action="{{ route('logout') }}" method="POST" class="d-inline-block mt-3">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
