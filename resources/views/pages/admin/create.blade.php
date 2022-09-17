@extends('template.layout-admin')

@section('content')
<div class="container-fluid px-4">
    @if(Session::has('success'))
    <div class="position-relative" aria-live="polite" aria-atomic="true">
        <div class="toast-container top-0 end-0">
            <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="2000" >
                <div class="toast-body  bg-primary text-white">
                    <i class="fas fa-circle-check fa-fw"></i>
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close btn-sm btn-white float-sm-end" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>

        </div>

    </div>
    @endif
    @if(Session::has('error'))
    <div class="position-relative" aria-live="polite" aria-atomic="true">
        <div class="toast-container top-0 end-0">
            <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="2000" >
                <div class="toast-body  bg-danger text-white">
                    <i class="fas fa-exclamation-circle fa-fw"></i>
                    {{ Session::get('error') }}
                    <button type="button" class="btn-close btn-sm btn-white float-sm-end" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>

        </div>

    </div>
    @endif
    <h1 class="mt-4">Admin</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>
    <form method="POST" action="{{ route('admin.simpan')}}">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control @error('username') is-invalid @enderror" id="username" name="username" type="text" placeholder="Enter your name" autocomplete="off"/>
                    <label for="name">Username</label>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="text" placeholder="name@example.com" autocomplete="off"/>
                    <label for="email">Email</label>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Create a password" />
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm password" />
                    <label for="password_confirmation">Ulangi Password</label>
                </div>

            </div>
        </div>
        <div class="mt-4 mb-0">
            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >Simpan</button></div>
        </div>
    </form>

</div>
@endsection
