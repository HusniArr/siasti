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
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <form action="{{ route('admin.update',$user->id)}}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                    <input class="form-control @error('username') is-invalid @enderror" id="username" name="username" type="text" value="{{ old('username',$user->username) }}" autocomplete="off" autofocus/>
                    <label for="username">Usename</label>
                </div>
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email',$user->email) }}" autocomplete="off" autofocus/>
                    <label for="email">Email</label>
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="text"  autocomplete="off" autofocus/>
                    <label for="password">Password</label>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" type="password_confirmation" autocomplete="off" autofocus/>
                    <label for="password_confirmation">Ulangi Password</label>
                </div>
            </div>
        </div>
        <input type="hidden" name="id" id="id" value="{{ $user->id }}">
        <div class="mt-4 mb-0">
            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >SIMPAN DATA</button></div>
        </div>
    </form>
</div>
@endsection
