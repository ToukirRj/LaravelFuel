@extends('admin.auth.app')
@section('title', __('Log In'))
@section('content')
<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
            <a href="{{ route('admin.home') }}">
                {!! logoText() !!}
            {{-- <img src="{{ showLogo(null) }}" width="60%" alt="" > --}}
            </a>
        </div>

       {{--  <div class="tx-center mg-b-10 text-dark mt-3"><h4>{{ __('Log In') }}</h4></div> --}}

        <form action="{{ route('admin.login') }}" method="POST">
          @csrf
        <div class="form-group mg-t-10">
          <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter your Email" required>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Enter your password" required>
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div><!-- form-group -->
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-info btn-block">Log In</button>
         <div class="mg-t-10 tx-center"><a href="{{ route('admin.password.request') }}" class="tx-info tx-12 d-block mg-t-10">{{ __('Forgot Your Password?') }}</a></div>
         </form>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->
@endsection
