@extends('admin.layouts.master')
@section('content')

<div class="br-pagetitle">
  <i class="fa fa-industry" aria-hidden="true"></i>
  <div>
    <h4>Web Info</h4>
    <p class="mg-b-0"></p>
  </div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <dib class="col-6">
            
        <h6 class="br-section-label">Settings</h6>
        <p class="br-section-text"></p>
      </dib>
      <dib class="col-6">
        {{-- <a href="{{ route('admin.webs.index') }}" class="btn btn-primary float-right">web List</a> --}}
      </dib>
    </div>
    <form action="{{ route('admin.web.update') }}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="form-layout form-layout-1">
      <div class="row mg-b-25">
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="name" value="{{ $web->name }}" placeholder="Enter Name " required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="email" value="{{ $web->email }}" placeholder="Enter Email " required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="phone" value="{{ $web->phone }}" placeholder="Enter Phone " required>
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Address <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="address" value="{{ $web->address }}" placeholder="Enter address " required>
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label class="form-control-label">Facebook: </label>
            <input class="form-control" type="text" name="fb" value="{{ $web->fb }}" placeholder="Enter Facebook ">
            @error('fb')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label class="form-control-label">Whatsapp: </label>
            <input class="form-control" type="text" name="whatsapp" value="{{ $web->whatsapp }}" placeholder="Enter Whatsapp ">
            @error('whatsapp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label class="form-control-label">Insta: </label>
            <input class="form-control" type="text" name="insta" value="{{ $web->insta }}" placeholder="Enter Insta ">
            @error('insta')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label class="form-control-label">Youtube: </label>
            <input class="form-control" type="text" name="youtube" value="{{ $web->youtube }}" placeholder="Enter Youtube">
            @error('youtube')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        {{-- <div class="col-lg-12">
          <div class="form-group">
              <label class="form-control-label">About Us : </label>
            <textarea name="about_us" class="form-control" id="about_us" cols="30" rows="10">{!! $web->about_us !!}</textarea>
            @error('about_us')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
          </div>
        </div> --}}
        <div class="col-lg-6">
          <div class="form-group">
              <label class="form-control-label">Iframe : </label>
            <textarea name="iframe" class="form-control" id="iframe" cols="30" rows="2">{!! $web->iframe !!}</textarea>
            @error('iframe')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
              <label class="form-control-label">Youtube Iframe : </label>
            <textarea name="video_url" class="form-control" id="video_url" cols="30" rows="2">{!! $web->video_url !!}</textarea>
            @error('video_url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group row">
            <div class="col-6">
              <label class="form-control-label">Contact Page Image: </label>
            <input class="" type="file" name="image_1" value="" placeholder="Enter Logo"  accept="image/x-png,image/gif,image/jpeg" > 
            <span class="text-info m-3">Image Size Maximum 1mb </span> 
            @error('image_1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            @if($web->image_1)
            <div class="col-6">
              <img src="{{ asset($web->image_1) }}" width="80" alt="">
              <span>Old Logo</span>
            </div>@endif
            
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group row">
            <div class="col-6">
              <label class="form-control-label">Logo: </label>
            <input class="" type="file" name="logo" value="" placeholder="Enter Logo"  accept="image/x-png,image/gif,image/jpeg" > 
            <span class="text-info m-3">Image Size Maximum 1mb </span> 
            @error('logo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            @if($web->logo)
            <div class="col-6">
              <img src="{{ asset($web->logo) }}" width="80" alt="">
              <span>Old Logo</span>
            </div>@endif
            
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group row">
            <div class="col-6">
              <label class="form-control-label">Icon: </label>
            <input class="" type="file" name="icon" value="" placeholder="Enter Icon"  accept="image/x-png,image/gif,image/jpeg" >  
            <span class="text-info m-3">Image Size Maximum 1mb </span> 
            @error('icon')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            @if($web->icon)
            <div class="col-6">
              <img src="{{ asset($web->icon) }}" width="80" alt="">
              <span>Old Icon</span>
            </div>@endif
            
          </div>
        </div>
        {{-- <div class="col-lg-6">
          <div class="form-group row">
            <div class="col-6">
              <label class="form-control-label">File: </label>
            <input class="" type="file" name="file" value="" placeholder="Enter File" >  
            @error('file')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            @if($web->file)
            <div class="col-6">
              <img src="" width="80" alt="">
              <a href="{{ asset($web->file) }}" class="btn btn-outline-info" target="_blank"> 
              <i class="fa fa-download"></i> Download</a>
            </div>@endif
            
          </div>
        </div> --}}
      </div><!-- row -->

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

@push('title','Web Info Edit')
@push('js')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
document.addEventListener( 'DOMContentLoaded',function()
{

 CKEDITOR.replace( 'about_us' , {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
});
</script>


@endpush
@push('css')

@endpush

