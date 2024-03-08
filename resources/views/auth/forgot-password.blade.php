
@extends('web.layouts.master')
@section('title', 'forgot-password')
@section('main')

    <main>
        <section class="signinupup">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-4">
                        <form action="{{ route('password.email') }}" class="default-form" method="POST">
                            @csrf
                            <p class="text-center" style="font-size:14px;font-weight:400;text-align:start!important;color:#555">{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password 
                            reset link that will allow you to create a newer one password.') }}</p>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Account Used Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" type="text" id="email" name="email"
                                            placeholder="Type your account email" required>
                                        @error('email')
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
                                                <button type="submit" class="start-btn btn2">{{ __('Email Reset Link') }}
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
