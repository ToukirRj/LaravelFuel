@extends('web.layouts.master')
@section('title', 'Login')
@section('main')

    <main>
        <section class="signinupup">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-4">
                        <form action="{{ route('login') }}" class="default-form" method="POST">
                            @csrf
                            <h1 class="text-center">SignIn</h1>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Email or User Name</label>
                                        <input class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" type="text" id="email" name="email"
                                            placeholder="Type email or user name" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Password</label>

                                        <input class="form-control @error('password') is-invalid @enderror"
                                            value="{{ old('password') }}" type="password" id="password" name="password"
                                            placeholder="Type password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mt-3 mb-0 text-center">
                                        <div class="col-lg-12">
                                            <div class="form-group mt-3 mb-0 text-center">
                                                <button type="submit" class="start-btn btn2">Sign In
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                            height="32" viewBox="0 0 1024 1024" >
                                                            <path fill="#18232b"
                                                                d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z" />
                                                        </svg>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mt-4">
                                        <p class="last-rem">
                                            Not a member yet? &nbsp;
                                            <a href="{{ route('register') }}">Sign Up Now</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
