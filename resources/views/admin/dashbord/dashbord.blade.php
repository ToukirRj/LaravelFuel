@extends('admin.layouts.master')
@section('content')

<div class="d-flex align-items-center justify-content-center" style="padding-top:150px">
    <div class="text-center" style="background:#18232B;padding:30px;width:460px;max-width:100%;border-radius:20px">
        <img src="{{ showLogo(null) }}" width="200" alt="" >
        <h4 class="text-center pt-3" style="color:#fff">Welcome to Admin Dashboard!</h4>
    </div>
</div>

<div class="br-pagebody">
</div><!-- br-pagebody -->

@endsection
@push('title','Home')

@push('js')


@endpush

@push('css')

@endpush