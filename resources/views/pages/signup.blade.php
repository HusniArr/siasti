@extends('template.layout-auth')

@section('auth-content')

@if(Session::has('status'))
<div class="position-relative" aria-live="polite" aria-atomic="true">
    <div class="toast-container top-0 end-0 p-3">
        <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="2000" >
            <div class="toast-body  bg-primary text-white">
                <i class="fas fa-circle-check fa-fw"></i>
                {{ Session::get('status') }}
                <button type="button" class="btn-close btn-sm btn-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>

</div>
@endif
@if(Session::has('error'))
<div class="position-relative" aria-live="polite" aria-atomic="true">
    <div class="toast-container top-0 end-0 p-3">
        <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="2000" >
            <div class="toast-body  bg-danger text-white">
                <i class="fas fa-circle-check fa-fw"></i>
                {{ Session::get('error') }}
                <button type="button" class="btn-close btn-sm btn-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>

</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-body">
                    <div class="mx-auto mb-2 mb-md-3" style="width: fit-content">
                        <a href="#">
                            <img src="{{ asset('logo/techno-informatika.png')}}" alt="techno-informatika">
                        </a>
                    </div>
                    <div class="d-block mb-3 text-center">
                        <h6 class="card-title">CREATE ACCOUNT</h6>
                        <P>Welcome to SIASTI System</P>
                    </div>
                    <form method="POST" action="{{ url('user/store')}}">
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
                            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >Create Account</button></div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="{{ route('login') }}">Have an account? Go to login</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

