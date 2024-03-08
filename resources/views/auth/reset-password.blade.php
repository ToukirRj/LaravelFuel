
@extends('web.layouts.master')
@section('title', 'forgot-password')
@section('main')

    <main>
        <section class="signinupup">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-4">
                        <form action="{{ route('password.store') }}" class="default-form" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <h1 class="text-center">{{ __('Reset Password') }}</h1>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', $request->email) }}" type="text" id="email" name="email"
                                            placeholder="Type your account email" required>
                                        @error('email')
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
                                        <div class="col-lg-12">
                                            <div class="form-group mt-3 mb-0 text-center">
                                                <button type="submit" class="start-btn btn2">{{ __('Reset Password') }}
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