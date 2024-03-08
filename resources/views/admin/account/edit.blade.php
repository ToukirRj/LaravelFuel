@extends('admin.layouts.master')
@section('content')


<div class="br-pagebody">
    <div class="row">
        <div class="col-md-6">
            <div class="br-pagetitle">
                <h4>Edit Admin Profile</h4>
            </div>
            <div class="br-section-wrapper">
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
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
                        </div>
                        
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
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Photo <span class="tx-danger">*</span></label>
                                <input class="form-control" type="file" name="image" accept="image/x-png,image/gif,image/jpeg">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if($user->image)
                            <div class="form-group">
                                <label class="form-control-label">Old Photo</label>
                                <img src="{{ asset($user->image) }}"  class="wd-80 rounded-circle" width="80" class="m-3" alt="">
                            </div>
                            @endif
                        </div>
                
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
                        </div>
                        <div class="col-lg-12">
                            <div class="form-layout-footer">
                                <button class="btn btn-secondary" type="reset">Reset</button>
                                <button class="btn btn-info" name="submit" value="s&c" type="submit">Save</button>
                            </div><!-- form-layout-footer -->
                        </div>
                    </div><!-- form-layout -->
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="br-pagetitle">
                <h4>Change Password</h4>
            </div>
            <div class="br-section-wrapper">
                <form action="{{ route('admin.profile.change-password') }}" method="POST">
                    @csrf
                    <div class="row">
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
                    </div>
                        
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
                    </div>
                        
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
                    </div>
                        
                        <div class="col-lg-12">
                            <div class="form-layout-footer">
                                <button class="btn btn-secondary" type="reset">Reset</button>
                                <button class="btn btn-info" name="submit" value="s&c" type="submit">Save</button>
                            </div><!-- form-layout-footer -->
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- br-pagebody -->

@endsection

@push('title','User Edit')
@push('js')


@endpush
@push('css')

@endpush
