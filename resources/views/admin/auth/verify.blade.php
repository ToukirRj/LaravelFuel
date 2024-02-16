@extends('admin.auth.app')
@section('title', __('Verify Your Email Address'))
@section('content')

<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
            <a href="{{ route('admin.home') }}">
                {!! logoText() !!}
            {{-- <img src="{{ showLogo(null) }}" width="60%" alt="" > --}}
            </a>
        </div>

        <div class="tx-center mg-b-10">{{ __('Verify Your Email Address') }}</div>

            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
            {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('admin.verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-info btn-block">{{ __('click here to request another') }}</button>.
            </form>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

@endsection
