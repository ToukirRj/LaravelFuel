@extends('admin.layouts.master')
@section('content')

<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('home') }}">Bracket</a>
    <a class="breadcrumb-item" href="{{ route('admin.sliders.create') }}">Slider</a>
    <span class="breadcrumb-item active">Add</span>
  </nav>
</div><!-- br-pageheader -->
<div class="br-pagetitle">
  <i class="fa fa-industry" aria-hidden="true"></i>
  <div>
    <h4>Slider Add</h4>
    <p class="mg-b-0"></p>
  </div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <dib class="col-6">
            
        <h6 class="br-section-label">Slider Add</h6>
        <p class="br-section-text"></p>
      </dib>
      <dib class="col-6">
        <a href="{{ route('admin.sliders.index') }}" class="btn btn-primary float-right">Slider List</a>
      </dib>
    </div>
    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="form-layout form-layout-1">
      <div class="row mg-b-25">
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Slogan: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="slogan" value="{{ old('slogan') }}" placeholder="Enter Slogan " required>
            @error('slogan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Text:</label>
            <input class="form-control" type="text" name="text" value="{{ old('text') }}" placeholder="Enter Text">
            @error('text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Button Url:</label>
            <input class="form-control" type="text" name="url" value="{{ old('url') }}" placeholder="Enter Button Url">
            @error('url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->

        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Youtube Watch Link:</label>
            <input class="form-control" type="text" name="watch_link" value="{{ old('watch_link') }}" placeholder="Enter Youtube Watch Link">
            @error('watch_link')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-12">
          <div class="form-group row">
            <div class="col-6">
              <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
            <input class="" type="file" name="image" value="" placeholder="Enter Image"  accept="image/x-png,image/gif,image/jpeg" >  
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-6">
              
            </div>
            
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-12">
          <div class="form-group row">
            <div class="col-6">
              <label class="form-control-label">More Images: <span class="tx-danger">*</span></label>
            <input class="" type="file" name="images[]" value="" placeholder="Enter Image"  accept="image/x-png,image/gif,image/jpeg" multiple>  
            @error('images')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-6">              
            </div>            
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Status: </label>
            <input class=""  type="checkbox" checked name="status" value="1">
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
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

@push('title','Slider Add')
@push('js')

<script>
document.addEventListener( 'DOMContentLoaded',function()
{

 CKEDITOR.replace( 'content' , {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });

});
</script>


@endpush
@push('css')

@endpush