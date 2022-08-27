@extends('template.layout-auth')

@section('auth-content')
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
                                <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" />
                                <label for="email" >Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                <label for="password">Password</label>
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
