@extends('web.layouts.master')
@section('title', 'Register')
@section('main')

    <main>
        <section class="signinupup">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-5">
                        <form action="{{ route('register') }}" class="default-form" method="POST">
                            @csrf
                            <h1 class="text-center">SignUp</h1>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                            type="text" id="name" name="name" placeholder="Type full name"
                                            required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input class="form-control @error('username') is-invalid @enderror"
                                            value="{{ old('username') }}" type="text" id="username" name="username"
                                            placeholder="Type User name" required>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                            type="email" id="email" name="email" placeholder="Type Email Address"
                                            required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                                            type="text" id="phone" name="phone" placeholder="Type phone number"
                                            required>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Address</label>

                                        <input class="form-control @error('address') is-invalid @enderror"
                                            value="{{ old('address') }}" type="text" id="address" name="address"
                                            placeholder="Type address here" required>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>New Password</label>

                                        <input class="form-control @error('password') is-invalid @enderror"
                                            value="{{ old('password') }}" type="password" id="password" name="password"
                                            placeholder="Type new password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Retype Password</label>

                                        <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                            value="{{ old('password_confirmation') }}" type="password" id="password_confirmation"
                                            name="password_confirmation" placeholder="Type password again" required>
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mt-3 mb-0 text-center">
                                        <button type="submit" class="start-btn btn2">Sign Up
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                    viewBox="0 0 1024 1024" >
                                                    <path fill="#18232b"
                                                        d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mt-4">
                                        <p class="last-rem">
                                            Already member? &nbsp;
                                            <a href="{{ route('login') }}">Sign In Here</a>
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
