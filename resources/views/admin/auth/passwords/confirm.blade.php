@extends('admin.auth.app')

@section('title', __('Confirm Password'))
@section('content')

<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div<a href="{{ route('admin.home') }}">
            {!! logoText() !!}
        {{-- <img src="{{ showLogo(null) }}" width="60%" alt="" > --}}
        </a>
        </div>
        <div class="tx-center mg-b-10">{{ __('Confirm Password') }}<br></div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        <form action="{{ route('admin.password.confirm') }}" method="POST">
          @csrf
            <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-info btn-block">{{ __('Confirm Password') }}</button>
            @if (Route::has('password.request'))
                <div class="mg-t-10 tx-center">
                    <a class="tx-info tx-12 d-block mg-t-10" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                </div>
            @endif
        </form>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

@endsection
