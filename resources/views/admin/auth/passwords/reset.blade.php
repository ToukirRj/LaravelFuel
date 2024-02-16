@extends('admin.auth.app')

@section('title', __('Reset Password'))
@section('content')

<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
            <a href="{{ route('admin.home') }}">
               {{--  <span class="logo-text_1" >Ideal</span> 
                <span class="logo-text_2" >Com</span> --}}
            <img src="{{ showLogo($info->logo) }}" width="60%" alt="" >
            </a>
        </div>
        <div class="tx-center mg-b-10">{{ __('Reset Password') }}</div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        <form action="{{ route('admin.password.update') }}" method="POST">
            <input type="hidden" name="token" value="{{ $token }}">
          @csrf
        <div class="form-group mg-t-10">
          <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" placeholder="Enter your Email" required>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div><!-- form-group -->


    <div class="form-group">
        <input id="password" type="password" placeholder="Enter New Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <input id="password-confirm" type="password" placeholder="Enter Password Again" class="form-control" name="password_confirmation" required autocomplete="new-password">
        @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
        <button type="submit" class="btn btn-info btn-block">{{ __('Reset Password') }}</button>
         <div class="mg-t-10 tx-center"><a href="{{ route('admin.login') }}" class="tx-info tx-12 d-block mg-t-10">{{ __('Login') }}</a></div>
         </form>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->
@endsection
