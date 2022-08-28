@extends('template.layout-auth')

@section('auth-content')

@if(Session::has('error'))
<div class="position-relative" aria-live="polite" aria-atomic="true" id="myToast">
    <div class="toast-container top-0 end-0 p-3">
        <div class="d-flex">
            <div  class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="2000">
                <div class="toast-body bg-danger text-white">
                    <i class="fas fa-circle-exclamation fa-fw"></i>
                    {{ Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>

        </div>

    </div>

</div>
@endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-body">
                        <div class="mx-auto mb-2 mb-md-3" style="width: fit-content">
                            <a href="#">
                                <img src="{{ asset('logo/techno-informatika.png')}}" alt="techno-informatika">
                            </a>
                        </div>
                        <div class="d-block mb-3 text-center">
                            <h6 class="card-title">LOGIN</h6>
                            <P>Welcome to SIASTI System</P>
                        </div>
                        <form action="{{ url('/login') }}" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" autocomplete="off" placeholder="name@example.com" />
                                <label for="email" >Email address</label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" autocomplete="off" placeholder="Password" />
                                <label for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex align-items-center justify-content-end mt-4 mb-0">

                                <button class="btn btn-primary btn-md" href="index.html"><i class="fas fa-sign-in-alt"></i> Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="{{ url('/register') }}">Need an account? Sign up!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
