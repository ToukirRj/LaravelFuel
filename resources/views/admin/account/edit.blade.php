@extends('admin.layouts.master')
@section('content')

<div class="br-pagetitle">
  <i class="fa fa-industry" aria-hidden="true"></i>
  <div>
    <h4>Account Edit</h4>
    <p class="mg-b-0"></p>
  </div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <dib class="col-6">

        <h6 class="br-section-label">Edit Account</h6>
        <p class="br-section-text"></p>
      </dib>
      <dib class="col-6">
        {{-- <a href="{{ route('admin.profile.index') }}" class="btn btn-primary float-right">User List</a> --}}
      </dib>
    </div>
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="form-layout form-layout-1">
      <div class="row mg-b-25">

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="name" value="{{ $user->name }}" placeholder="Enter Name" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div><!-- col-4 -->


            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                <input class="form-control" type="email" name="email" value="{{ $user->email }}" placeholder="Enter Email" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div><!-- col-12 -->
        <div class="col-lg-12">
          <div class="form-group row">
            <div class="col-6">
                <label class="form-control-label">Photo <span class="tx-danger">*</span></label>
            <input class="" type="file" name="image" accept="image/x-png,image/gif,image/jpeg">
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            @if($user->image)
            <div class="col-6">
              <img src="{{ asset($user->image) }}"  class="wd-80 rounded-circle" width="80" class="m-3" alt="">
              <span>Old Photo</span>
            </div>
            @endif
          </div>
        </div><!-- col-4 -->

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                <input class="form-control" required type="password" name="password" placeholder="Enter Password" value="">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div><!-- col-12 -->


      <div class="form-layout-footer">
        <button class="btn btn-secondary" type="reset">Reset</button>
        <button class="btn btn-outline-success" name="submit" value="s&c" type="submit">Save</button>
      </div><!-- form-layout-footer -->
    </div><!-- form-layout -->
    </form>
  </div><!-- br-section-wrapper -->
  </div>
</div><!-- br-pagebody -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <dib class="col-6">

        <h6 class="br-section-label">Change Password</h6>
        <p class="br-section-text"></p>
      </dib>
    </div>
    <form action="{{ route('admin.profile.change-password') }}" method="POST">
      @csrf
    <div class="form-layout form-layout-1">
      <div class="row mg-b-25">


            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Old Password: <span class="tx-danger">*</span></label>
                <input class="form-control" type="password" name="password" placeholder="Enter Old Password" value="">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div><!-- col-12 -->

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">New Password: <span class="tx-danger">*</span></label>
                <input class="form-control" type="password" name="new_password" placeholder="Enter New Password" value="">
                @error('new_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div><!-- col-12 -->

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                <input class="form-control" type="password" name="confirm_password" placeholder="Enter New Password Again" value="">
                @error('confirm_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div><!-- col-12 -->


      <div class="form-layout-footer">
        <button class="btn btn-secondary" type="reset">Reset</button>
        <button class="btn btn-outline-success" name="submit" value="s&c" type="submit">Save</button>
      </div><!-- form-layout-footer -->
    </div><!-- form-layout -->
    </form>
  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->
@endsection

@push('title','User Edit')
@push('js')


@endpush
@push('css')

@endpush
