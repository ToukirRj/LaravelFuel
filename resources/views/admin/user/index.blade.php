@extends('admin.layouts.master')
@section('content')
    <div class="br-pagetitle">
        <h4>Users List</h4>
    </div><!-- d-flex -->

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="bd bd-gray-300 rounded table-responsive">
                <table class="table mg-b-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th class="text-center">Subscription</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Total Order</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $row)
                            <tr style="verticle-align:middle">
                                <th scope="row">{{ $key + 1 }}</th>
                                <td><img src="{{ asset($row->image ?? 'avater.webp') }}" width="80" alt=""></td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->address }}</td>
                                @php
                                    $subscription = $row->subscriptions->where('stripe_status', 'active')?->first();

                                    $plan = planByStripePrice($subscription?->stripe_price);
                                @endphp
                                <td class="text-center">{{ $plan?->name ?? $subscription?->stripe_price }}</td>
                                <td class="text-center">${{ $plan?->price ?? 0 }}</td>
                                <td class="text-center">{{ $row?->orders_count }}</td>
                                <td class="text-center">

                                    <div class="dropdown">
                                        <a href="javascript:void(0)" class="tx-gray-800 d-inline-block" data-toggle="dropdown">
                                            <div class="ht-45 pd-x-20 bd d-flex align-items-center justify-content-center">
                                                <span class="mg-r-10 tx-13 tx-medium">Action</span>
                                                <i class="fa fa-angle-down mg-l-10"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu pd-10 wd-200">
                                            <nav class="nav nav-style-2 flex-column">
                                                <!-- <a class="nav-link" href="{{ route('admin.user.show', $row->id) }}" class="ml-2"> <i class="icon ion-ios-person"></i> View
                                                    Profile</a> -->
                                                {{-- <a class="nav-link" href="{{ route('admin.user.edit',$row->id) }}" class="ml-2">Edit</a> --}}
                                                <a class="nav-link" href="{{ route('admin.user.destroy', $row->id) }}" class="ml-2"
                                                    onclick="event.preventDefault();
                                document.getElementById('delete-form{{ $row->id }}').submit();">
                                                    <i class="icon ion-ios-gear"></i>
                                                    {{ $row->status ? 'Deactive' : 'Active' }}</a>

                                                <form id="delete-form{{ $row->id }}"
                                                    action="{{ route('admin.user.destroy', $row->id) }}" method="POST">
                                                    @csrf @method('delete')</form>
                                            </nav>
                                        </div><!-- dropdown-menu -->
                                    </div><!-- dropdown -->

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div><!-- bd -->

        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->
@endsection

@push('title', 'Users List')
@push('js')


@endpush
@push('css')

@endpush
