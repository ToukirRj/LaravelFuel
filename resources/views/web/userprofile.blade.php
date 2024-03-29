@extends('web.layouts.master')
@section('title', 'Profile')
@section('main')
    @php
    $bookAbleDays = bookAbleDays();
    $serviceTypes = serviceTypes();
    @endphp
    

    <main>
        <section class="profile-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="profile-info">
                            <div class="edit-profile">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#editProfile">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M15.137 3.47a.75.75 0 0 0-1.06 0l-9.193 9.192a.75.75 0 0 0-.195.34l-1 3.83a.75.75 0 0 0 .915.915l3.828-1a.75.75 0 0 0 .341-.196l9.192-9.192a.75.75 0 0 0 0-1.06zM6.088 13.579l8.519-8.518l1.767 1.767l-8.518 8.519l-2.393.625z"
                                            clip-rule="evenodd" />
                                        <path fill="currentColor" d="M4 19.25a.75.75 0 0 0 0 1.5h15a.75.75 0 0 0 0-1.5z" />
                                    </svg>
                                    Edit
                                </button>
                            </div>
                            <div class="profile-img">
                                <img src="{{ asset(auth()->user()->image ?? 'avater.webp') }}" alt="profile-img">
                            </div>
                            @php
                                $user = auth()->user();
                            @endphp
                            <h2>{{ $user->name }}</h2>
                            <p> {{ "@{$user->username}" }}</p>
                            <div class="profile-all-info">
                                <table>
                                    <tr>
                                        <td class="icon-title">Email</td>
                                        <td class="info">: {{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="icon-title">Phone</td>
                                        <td class="info">: {{ $user->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td class="icon-title">Location</td>
                                        <td class="info">: {{ $user->address }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="others-info">
                            <nav class="others-top-nav">
                                <div class="nav" id="nav-tab" role="tablist">
                                    <button class="active" id="tab1" data-bs-toggle="tab" data-bs-target="#navtab1" type="button"
                                        role="tab" aria-controls="tab1" aria-selected="true">Request Fuel</button>

                                    <button id="tab2" data-bs-toggle="tab" data-bs-target="#navtab2" type="button"
                                        role="tab" aria-controls="tab2" aria-selected="false">Membership Plans</button>

                                    <button id="tab3" data-bs-toggle="tab" data-bs-target="#navtab3" type="button"
                                        role="tab" aria-controls="tab3" aria-selected="false">Order History</button>

                                    <button id="tab4" data-bs-toggle="tab" data-bs-target="#navtab4" type="button"
                                        role="tab" aria-controls="tab4" aria-selected="false">Settings</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="navtab1" role="tabpanel" aria-labelledby="tab1"
                                    tabindex="0">
                                    <div class="tab-box">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Vehicle Image</th>
                                                    <th>Vehicle</th>
                                                    <th class="text-center">License plate No</th>
                                                    <th class="text-center">Date & Time</th>
                                                    <th>Delivery Address</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user->orders as $row)
                                                    <tr>
                                                        <td class="text-center"><img
                                                                src="{{ asset($row->image ?? "frontend//img/noimg.png") }}"
                                                                alt="img" width="60" height="40" /></td>
                                                        <td>{{ $row->vehicle_name }}</td>
                                                        <td class="text-center">{{ $row->vehicle_model }}</td>
                                                        <td class="text-center">{{ date('M-d-Y  H:i:s', strtotime($row->delivery_date_time)) }}</td>
                                                        <td>{{ $row->address }}</td>
                                                        <td class="text-center"><span class="{{ strtolower($row->status) }}">{{ $row->status }}</span></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group mt-5 mb-0 text-center">
                                                    @if ($user->validity && $user->validity >= date('Y-m-d'))
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#reqModal" class="start-btn btn2">
                                                            Create New Request
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                                    height="32" viewBox="0 0 1024 1024">
                                                                    <path fill="#18232b"
                                                                        d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    @else
                                                        <a href="{{ route('plans') }}" type="button"
                                                            class="start-btn btn2">Buy New Plan
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                                    height="32" viewBox="0 0 1024 1024">
                                                                    <path fill="#18232b"
                                                                        d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="navtab2" role="tabpanel" aria-labelledby="tab2"
                                    tabindex="0">
                                    <div class="tab-box">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Length</th>
                                                    <th class="text-center">Buy Date</th>
                                                    <th class="text-center">Expire Date</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user->subscriptions as $sp)
                                                    @php
                                                        $plan = planByStripePrice($sp->stripe_price);
                                                    @endphp
                                                    @if($plan)
                                                    <tr>
                                                        <td>{{ $plan?->name ?? $sp?->stripe_price }}</td>
                                                        <td>{{ daysInWords($plan?->validity ?? 30) }} Month</td>
                                                        <td class="text-center">{{ $sp->created_at->format('M-d-Y') }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $sp->ends_at ? $sp->ends_at->format('M-d-Y') : '-' }}</td>
                                                        <td class="text-center">
                                                            <span
                                                                class=" {{ $sp->stripe_status != 'active' ? 'expired' : 'running' }}">
                                                                {{ $sp->stripe_status != 'active' ? 'Expired' : 'Running' }}</span>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group mt-5 mb-0 text-center">
                                                    <a href="{{ route('plans') }}" type="button"
                                                        class="start-btn btn2">Buy New Plan
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                                height="32" viewBox="0 0 1024 1024">
                                                                <path fill="#18232b"
                                                                    d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="navtab3" role="tabpanel" aria-labelledby="tab3"
                                    tabindex="0">
                                    <div class="tab-box">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Paid Date</th>
                                                    <th class="text-center">Order Type</th>
                                                    <th class="text-center">Quantity (Gallon)</th>
                                                    <th class="text-center">Per Price</th>
                                                    <th class="text-center">Total Paid Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user->orders->where("payment_date","!=",null) as $row)
                                                    <tr>
                                                        <td class="text-center">{{ date('M-d-Y'), ($row->payment_date) }}</td>
                                                        <td class="text-center">GAS</td>
                                                        <td class="text-center">{{ $row->qty }}</td>
                                                        <td class="text-center">${{ $row->price }}</td>
                                                        <td class="text-center">${{ $row->total }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="navtab4" role="tabpanel" aria-labelledby="tab4"
                                    tabindex="0">
                                    <div class="d-flex justify-content-center">
                                        <form action="{{ route("profile.change-password") }}" method="POST" class="default-form" style="width:400px;border:0">
                                            @csrf
                                            <h4 class="text-center">Change Password</h4>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Existing Password</label>
                                                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                                            id="password" value="{{ old('password') }}" name="password"
                                                            placeholder="Type password" required>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input class="form-control @error('new_password') is-invalid @enderror" type="password"
                                                            id="new_password" value="{{ old('new_password') }}" name="new_password"
                                                            placeholder="Type New Password" required>
                                                        @error('new_password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Retype Password</label>
                                                        <input class="form-control @error('confirm_password') is-invalid @enderror" type="password"
                                                            id="confirm_password" value="{{ old('confirm_password') }}" name="confirm_password"
                                                            placeholder="Retype New Password" required>
                                                        @error('confirm_password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group mt-3 mb-0 text-center">
                                                        <button type="submit" class="start-btn btn2">Change Password
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                                    height="32" viewBox="0 0 1024 1024">
                                                                    <path fill="#18232b"
                                                                        d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-------EditProfile------>
    <div class="modal fade" id="editProfile" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="editProfile">
                    <form action="{{ route('profile.update') }}" class="default-form" method="POST"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <h5 class="modal-title">Edit Profile</h5>
                        <button type="button" class="modal-close" data-bs-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Profile Image</label>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="circle">
                                            <img class="profile_pic"
                                                src="{{ asset(auth()->user()->image ?? 'avater.webp') }}" />
                                            <label for="imgup" class="upload-button">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24">
                                                        <path fill="#F9C158"
                                                            d="M21.9 12c0-.11-.06-.22-.09-.33a4.17 4.17 0 0 0-.18-.57c-.05-.12-.12-.24-.18-.37s-.15-.3-.24-.44S21 10.08 21 10s-.2-.25-.31-.37s-.21-.2-.32-.3L20 9l-.36-.24a3.68 3.68 0 0 0-.44-.23l-.39-.18a4.13 4.13 0 0 0-.5-.15a3 3 0 0 0-.41-.09L17.67 8A6 6 0 0 0 6.33 8l-.18.05a3 3 0 0 0-.41.09a4.13 4.13 0 0 0-.5.15l-.39.18a3.68 3.68 0 0 0-.44.23l-.36.3l-.37.31c-.11.1-.22.19-.32.3s-.21.25-.31.37s-.18.23-.26.36s-.16.29-.24.44s-.13.25-.18.37a4.17 4.17 0 0 0-.18.57c0 .11-.07.22-.09.33A5.23 5.23 0 0 0 2 13a5.5 5.5 0 0 0 .09.91c0 .1.05.19.07.29a5.58 5.58 0 0 0 .18.58l.12.29a5 5 0 0 0 .3.56l.14.22a.56.56 0 0 0 .05.08L3 16a5 5 0 0 0 4 2h3v-1.37a2 2 0 0 1-1 .27a2.05 2.05 0 0 1-1.44-.61a2 2 0 0 1 .05-2.83l3-2.9A2 2 0 0 1 12 10a2 2 0 0 1 1.41.59l3 3a2 2 0 0 1 0 2.82A2 2 0 0 1 15 17a1.92 1.92 0 0 1-1-.27V18h3a5 5 0 0 0 4-2l.05-.05a.56.56 0 0 0 .05-.08l.14-.22a5 5 0 0 0 .3-.56l.12-.29a5.58 5.58 0 0 0 .18-.58c0-.1.05-.19.07-.29A5.5 5.5 0 0 0 22 13a5.23 5.23 0 0 0-.1-1" />
                                                        <path fill="#F9C158"
                                                            d="M12.71 11.29a1 1 0 0 0-1.4 0l-3 2.9a1 1 0 1 0 1.38 1.44L11 14.36V20a1 1 0 0 0 2 0v-5.59l1.29 1.3a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.42Z" />
                                                    </svg>
                                                    <input name="image" id="imgup" class="file-upload"
                                                        type="file" accept="image/*" />
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                        value="{{ $user->name }}" placeholder="Type full name" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="text" id="email" name="email"
                                        value="{{ $user->email }}" placeholder="Type email address" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Location Address</label>
                                    <input class="form-control" type="text" id="address" name="address"
                                        value="{{ $user->address }}" placeholder="Type address here" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-------RequestModal------>
    <div class="modal fade" id="reqModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="requestCanvas">
                    <form action="{{ route('order.store') }}" class="default-form" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h5 class="modal-title">Request Delivery Form</h5>
                        <p>Please fill up form bellow and submit us!</p>
                        <button type="button" class="modal-close" data-bs-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Vehicle Image</label>
                                    @error('image')
                                    <p class="time-schedule">{{ $message }}</p>
                                    @enderror
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="circle">
                                            <img class="vehicle_pic" src="{{ asset($lastorder?->image ?? 'frontend/img/noimg.png') }}" />
                                            <label for="imgup1" class="upload-button">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24">
                                                        <path fill="#F9C158"
                                                            d="M21.9 12c0-.11-.06-.22-.09-.33a4.17 4.17 0 0 0-.18-.57c-.05-.12-.12-.24-.18-.37s-.15-.3-.24-.44S21 10.08 21 10s-.2-.25-.31-.37s-.21-.2-.32-.3L20 9l-.36-.24a3.68 3.68 0 0 0-.44-.23l-.39-.18a4.13 4.13 0 0 0-.5-.15a3 3 0 0 0-.41-.09L17.67 8A6 6 0 0 0 6.33 8l-.18.05a3 3 0 0 0-.41.09a4.13 4.13 0 0 0-.5.15l-.39.18a3.68 3.68 0 0 0-.44.23l-.36.3l-.37.31c-.11.1-.22.19-.32.3s-.21.25-.31.37s-.18.23-.26.36s-.16.29-.24.44s-.13.25-.18.37a4.17 4.17 0 0 0-.18.57c0 .11-.07.22-.09.33A5.23 5.23 0 0 0 2 13a5.5 5.5 0 0 0 .09.91c0 .1.05.19.07.29a5.58 5.58 0 0 0 .18.58l.12.29a5 5 0 0 0 .3.56l.14.22a.56.56 0 0 0 .05.08L3 16a5 5 0 0 0 4 2h3v-1.37a2 2 0 0 1-1 .27a2.05 2.05 0 0 1-1.44-.61a2 2 0 0 1 .05-2.83l3-2.9A2 2 0 0 1 12 10a2 2 0 0 1 1.41.59l3 3a2 2 0 0 1 0 2.82A2 2 0 0 1 15 17a1.92 1.92 0 0 1-1-.27V18h3a5 5 0 0 0 4-2l.05-.05a.56.56 0 0 0 .05-.08l.14-.22a5 5 0 0 0 .3-.56l.12-.29a5.58 5.58 0 0 0 .18-.58c0-.1.05-.19.07-.29A5.5 5.5 0 0 0 22 13a5.23 5.23 0 0 0-.1-1" />
                                                        <path fill="#F9C158"
                                                            d="M12.71 11.29a1 1 0 0 0-1.4 0l-3 2.9a1 1 0 1 0 1.38 1.44L11 14.36V20a1 1 0 0 0 2 0v-5.59l1.29 1.3a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.42Z" />
                                                    </svg>
                                                    <input id="imgup1" name="image" class="vehicle-upload" type="file" value="{{$lastorder?->image}}" accept="image/*"/>
                                                    <input name="oldimg" type="hidden" value="{{$lastorder?->image}}"/>
                                                </div>
                                            </label>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Vehicle</label>
                                    <input class="form-control @error('vehicle_name') is-invalid @enderror" type="text"
                                        id="vehicle_name" value="{{ old('vehicle_name',$lastorder?->vehicle_name) }}" name="vehicle_name"
                                        placeholder="Type vehicle name" required>

                                    @error('vehicle_name')
                                    <p class="time-schedule">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>License plate No.</label>
                                    <input class="form-control @error('vehicle_model') is-invalid @enderror" type="text"
                                        id="vehicle_model" value="{{ old('vehicle_model',$lastorder?->vehicle_model) }}" name="vehicle_model"
                                        placeholder="Type model no." required>
                                    @error('vehicle_model')
                                    <p class="time-schedule">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Location Address</label>
                                    <input class="form-control @error('address') is-invalid @enderror" type="text"
                                        id="address" value="{{ old('address',$lastorder?->address) }}" name="address"
                                        placeholder="Type address here" required>
                                    @error('address')
                                    <p class="time-schedule">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Delivery Date</label>
                                    <select name="date_id" id="date_id" class="form-control @error('date_id') is-invalid @enderror" onChange="dateChanged()" required>
                                        @foreach($bookAbleDays as $date)
                                        <option value="{{$date->id}}">{{  date('m-d-Y', strtotime($date->date)) }} ({{  date('l', strtotime($date->date)) }})</option>
                                        @endforeach
                                    </select>

                                    @error('date_id')
                                    <p class="time-schedule">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Delivery Time</label>
                                    <p class="time-schedule">Please follow time schedule within 8am to 8pm</p>
                                    <select name="time_id" id="time_id" class="form-control @error('time_id') is-invalid @enderror" required>
                                        <option value="">Please Select Delevery Time</option>
                                        @php
                                        $date = $bookAbleDays->first();
                                        @endphp
                                        @foreach($date->times as $time)
                                        <option value="{{$time->id}}">{{ date("h:i A", strtotime($time->time))}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Order Type</label>
                                    <select class="form-select" id="service_id" name="service_id" onchange="serviceTypeChanged()" required>
                                            <option>Select Order Type</option>
                                        @foreach ($serviceTypes as $row)
                                            <option value="{{ $row->id }}">{{ $row->short_name ?? $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-group mt-2 p-2" style="background:#e8eaf2;border-radius:7px">
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="fillfullTank" name="fillfullTank" onchange="fullTank()">
                                        <label class="form-check-label mt-1 ms-2 mb-0" for="fillfullTank">
                                            Want to fill up tank fully
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Order Quantity (Gallon)</label>
                                    <input class="form-control" type="number" step="any" id="amount" name="amount" placeholder="Example: 5" oninput="orderAmountChanged()" min="0.1">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Per Unit Price ($)</label>
                                    <input class="form-control" type="number" step="any" id="price" value="0" name="price" readonly required disabled>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Total Price ($)</label>
                                    <input class="form-control" type="number" step="any" step="any" id="total" value="0" name="total" readonly disabled>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-group mb-0">
                                    <button type="submit" class="start-btn btn2">Request Submit
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 1024 1024">
                                                <path fill="#18232b"
                                                    d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z">
                                                </path>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const BOOK_ABLE_DATES = {!! $bookAbleDays !!};
        const SERVICE_TYPES = {!! $serviceTypes !!};
    </script>
     <script>
        function serviceTypeChanged(){
            let service_id = $("#service_id").val();
            console.log({service_id});
            console.log({SERVICE_TYPES});
            let service =  SERVICE_TYPES.find(date => date.id == service_id);
            $("#price").val(service.price);
            $("#price").prev('label').text(`Per ${service.unit} Price ($)`);
            $("#amount").val(0);
            $("#amount").prev('label').text(`Order Amount (${service.unit})`);
            $("#total").val(0);

        }
        function orderAmountChanged(){
            let service_id = $("#service_id").val();
            let service =  SERVICE_TYPES.find(date => date.id == service_id);
            let amount = $("#amount").val();
            let total = Number(Number(amount) * Number(service.price)).toFixed(2) +0;
            $("#total").val(total);

        }
        function dateChanged(){
            let date_id = $("#date_id").val();
            console.log({date_id});
            console.log({BOOK_ABLE_DATES});
            let selected_date =  BOOK_ABLE_DATES.find(date => date.id == date_id);
            html = '<option value="">Please Select Delevery Time</option>';
            selected_date.times.forEach(time => {
                formetedTime = timeFormet(time.time)
                html += ` <option value="${time.id}">${formetedTime}</option>`;
            });

            $("#time_id").html(html);
            $("#time_id").val('');

        }
        function timeFormet(timeString){
            // Split the time string into hours, minutes, and seconds
            const [hours, minutes] = timeString.split(':');

            // Create a new Date object to manipulate the time
            const date = new Date();
            date.setHours(hours);
            date.setMinutes(minutes);

            // Format the time to AM/PM format
            const formattedTime = date.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
            return formattedTime;
        }
    // Image Upload ==========>
	document.addEventListener("DOMContentLoaded", function() {
		// Event listener for profile image upload
		document.querySelector('.file-upload').addEventListener('change', function () {
			var reader = new FileReader();
			reader.onload = function (e) {
				document.querySelector('.profile_pic').src = e.target.result;
			};
			reader.readAsDataURL(this.files[0]);
		});

		// Event listener for vehicle image upload
		document.querySelector('.vehicle-upload').addEventListener('change', function () {
			var reader = new FileReader();
			reader.onload = function (e) {
				document.querySelector('.vehicle_pic').src = e.target.result;
			};
			reader.readAsDataURL(this.files[0]);
		});
	});
 </script>
 
 <script>
    document.addEventListener("DOMContentLoaded", function() {
        fullTank(); // Call the function after DOM is fully loaded
    });
    
    function fullTank() {
        var checkbox = document.getElementById("fillfullTank");
        if (checkbox.checked) {
            $("#amount").prop('disabled', true);
            $("#amount").val(0);
            $("#total").val(0);
        } else {
            $("#amount").prop('disabled', false);
            $("#amount").val(0);
            $("#total").val(0);
        }
    }
</script>
 
 
@endsection














