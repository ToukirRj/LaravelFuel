@extends('admin.auth.app')

@section('title', __('Reset Password'))
@section('content')

<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
            <a href="{{ route('admin.home') }}">
                {!! logoText() !!}
            {{-- <img src="{{ showLogo(null) }}" width="60%" alt="" > --}}
            </a>
        </div>
        <div class="tx-center mg-b-10">{{ __('Reset Password') }}</div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        <form action="{{ route('admin.password.email') }}" method="POST">
          @csrf
        <div class="form-group mg-t-10">
          <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter your Email" required>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">{{ __('Send Password Reset Link') }}</button>
         <div class="mg-t-10 tx-center"><a href="{{ route('admin.login') }}" class="tx-info tx-12 d-block mg-t-10">{{ __('Login') }}</a></div>
         </form>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->
@endsection
