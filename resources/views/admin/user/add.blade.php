@extends('admin.layouts.master')
@section('content')

<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route("admin.index") }}">Bracket</a>
    <a class="breadcrumb-item" href="#">User</a>
    <span class="breadcrumb-item active">Add</span>
  </nav>
</div><!-- br-pageheader -->
<div class="br-pagetitle">
  <i class="fa fa-industry" aria-hidden="true"></i>
  <div>
    <h4>User Add</h4>
    <p class="mg-b-0"></p>
  </div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <dib class="col-6">

        <h6 class="br-section-label">User Add</h6>
        <p class="br-section-text"></p>
      </dib>
      <dib class="col-6">
        <a href="{{ route('admin.users.index') }}" class="btn btn-primary float-right">User List</a>
      </dib>
    </div>
    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="form-layout form-layout-1">
      <div class="row mg-b-25">
        <div class="col-12 row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">First Name: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="firstname" value="{{ old('firstname') }}" placeholder="Enter First Name" >
                @error('firstname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Last Name: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="lastname" value="{{ old('lastname') }}" placeholder="Enter Last Name" >
                @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div><!-- col-4 -->
        </div>
        <div class="col-12 row">

          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Company: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="company" value="{{ old('company') }}" placeholder="Enter Company Name">
              @error('company')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Gender: <span class="tx-danger">*</span></label>
              <select class="form-control" name="salutation" id="salutation">
                <option value="">-----Select----</option>
                <option value="M" @if(old('salutation') =='M') selected @endif>Male</option>
                <option value="F" @if(old('salutation') =='F') selected @endif>Female</option>
                <option value="C" @if(old('salutation') =='C') selected @endif>Company</option>
              </select>
              @error('salutation')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div><!-- col-4 -->
        </div>{{-- row end --}}
        <div class="col-12 row">
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Street: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="street" value="{{ old('street') }}" placeholder="Enter Street">
                @error('street')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Zip code: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="zipcode" value="{{ old('zipcode') }}" placeholder="Enter Zip Code" >
                @error('street')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">City: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="city" value="{{ old('city') }}" placeholder="Enter City">
                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
                <select name="country" id="country" class="form-control">
                <option value="">----select country----</option>
                  @foreach($countries as $country)
                  <option value="{{ $country->code }}" @if(old('country') == $country->code) selected @endif >{{ $country->name }}</option>
                  @endforeach
                </select>

                @error('country')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div><!-- col-4 -->
        </div>
        <div class="col-12 row">
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone">
              @error('phone')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Fax: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="fax" value="{{ old('fax') }}" placeholder="Enter Phone">
              @error('fax')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div><!-- col-4 -->
        </div>

        <div class="col-12">
          <div class="row">

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Enter Email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div><!-- col-6 -->

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                <input class="form-control" type="password" name="password"  placeholder="Enter Password" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div><!-- col-6 -->
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Photo <span class="tx-danger">*</span></label>
            <input class="" type="file" name="photo" accept="image/x-png,image/gif,image/jpeg">
            @error('active')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Active: <span class="tx-danger">*</span></label>
            <input class="" type="checkbox" name="active" value="1" @if(old('active')) checked @endif  placeholder="Enter active">
            @error('active')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
        <div class="col-12 mb-5">
          <h5>Roles:</h5>
            <div class="row">
              @foreach($roles as $key => $role)
              @php
              if (old('roles') !=null) {
                $check = in_array($role->name, old('roles')->toArray()) ? 'checked' : '';
              }else{
                $check = null;
              }

              @endphp
                <div class="col-3 row  @if($role->name =='Super Admin')  d-none  @endif">

                  <input type="checkbox"  value="{{ $role->name }}" {{ $check }} class="ml-3"  name="roles[]">
                  <label class="form-control-label text-uppercase text-dark ml-2">{{ $role->name }}</label>

                </div>
              @endforeach
            </div>
        </div>


      <div class="form-layout-footer">
        <button class="btn btn-secondary" type="reset">Reset</button>
        <button class="btn btn-outline-success" name="submit" value="s&c" type="submit">Save and Continew</button>
        <button class="btn btn-info" type="submit">Save</button>
      </div><!-- form-layout-footer -->
    </div><!-- form-layout -->
    </form>
  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->
@endsection

@push('title','User Add')
@push('js')


@endpush
@push('css')

@endpush
