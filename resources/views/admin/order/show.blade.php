@extends('admin.layouts.master')
@section('content')
    @php
        $setting = setting();
        $user = $data->user;
    @endphp
            <div class="br-pagetitle">
                <i class="fa fa-sitemap"></i>
                <div class="custom-page-title pl-0">
                    <h4 class="float-left">)Order Details</h4>
                    <a href="{{ route('admin.order.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list"></i>Orders List</a>
                </div>
            </div>

    <div class="br-pagebody">

        <div class="card bd-0 shadow-base">
            <div class="card-body pd-30 pd-md-60">
                <div class="d-md-flex justify-content-between flex-row-reverse">
                    <h1 class="mg-b-0 tx-uppercase tx-gray-400 tx-mont tx-bold"
                        style="font-family: Montserrat, &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, Bangla1019, sans-serif;">
                        Order #{{ $data->id }}</h1>
                    <div class="mg-t-25 mg-md-t-0">
                        <h6 class="tx-primary">{{ $setting->name }}</h6>
                        <p class="lh-7">{{ $setting->address }}<br>
                            Tel No: {{ $setting->phone }}<br>
                            Email: {{ $setting->email }}</p>

                    </div>

                </div><!-- d-flex -->

                <div class="row mg-t-20">
                    <div class="col-md">
                        <label class="tx-uppercase tx-18 tx-bold mg-b-20">User Information</label>
                        <h6 class="tx-inverse">{{ $user->name }}</h6>
                        <p class="lh-7">
                            {{ "@".$user->username }} <br>
                            {{ $user->address }} <br>
                            Tel No: {{ $user->phone }}<br>
                            Email: {{ $user->email }}</p>
                            <br>
                        <p class="d-flex justify-content-between mg-b-5">
                            <span><img src="{{ asset($data->image ?? 'frontend//img/noimg.png') }}" alt="img" width="200" /></span>
                        </p>
                    </div><!-- col -->
                    <div class="col-md">
                        <label class="tx-uppercase tx-18 tx-bold mg-b-20">Order Information</label>
                        <p class="d-flex mg-b-5">
                            <span><b>Invoice No:&nbsp&nbsp</b></span>
                            <span>#{{ $data->id }}</span>
                        </p>
                        <p class="d-flex mg-b-5">
                            <span><b>Status:&nbsp&nbsp</b></span>
                            <span>#{{ $data->status }}</span>
                        </p>
                        <p class="d-flex mg-b-5">
                            <span><b>Order Date:&nbsp&nbsp</b></span>
                            <span>{{ $data->created_at->format('Y-M-d') }}</span>
                        </p>
                        <p class="d-flex mg-b-5">
                            <span><b>Delivery Date Time:&nbsp&nbsp</b></span>
                            <span>{{ $data->delivery_date_time }}</span>
                        </p>
                        <p class="d-flex mg-b-5">
                            <span><b>Vehicle Name:&nbsp&nbsp</b></span>
                            <span>{{ $data->vehicle_name }}</span>
                        </p>
                        <p class="d-flex mg-b-5">
                            <span><b>License plate No:&nbsp&nbsp</b></span>
                            <span>{{ $data->vehicle_model }}</span>
                        </p>
                        <p class="d-flex mg-b-5">
                            <span><b>Address:&nbsp&nbsp</b></span>
                            <span>{{ $data->address }}</span>
                        </p>

                    </div><!-- col -->
                </div><!-- row -->

            </div><!-- card-body -->
        </div><!-- card -->

    </div>
@endsection

@push('title', 'Orders View')
@push('js')
@endpush
@push('css')
@endpush
