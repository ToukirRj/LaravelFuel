@extends('admin.layouts.master') @section('content')

<div class="br-pagetitle">
    <h4 class="float-left">Page Section Edit</h4>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">
        <form action="{{ route('admin.page.update',$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="row mg-b-25">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-control-label">Section Title: </label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" placeholder="EX: " value="{{ old('title',$data->title) }}" required />
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-control-label">Another Section Title: </label>
                        <input class="form-control @error('title_2') is-invalid @enderror" type="text" name="title_2" placeholder="EX: " value="{{ old('title',$data->title_2) }}" required />
                        @error('title_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Section Image<span class="tx-danger">*</span></label>
                        <input class="form-control" type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/webp">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-control-label">Old Image</label>
                    <div class="form-group">
                        @if($data->image)
                            <img src="{{ asset($data->image) }}"  class="wd-80" width="80" class="m-3" alt="">
                        @endif
                    </div>
                </div>
                

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-control-label">Details: </label>
                        <textarea class="form-control @error('details') is-invalid @enderror" name="details" id="details" cols="30" rows="4"
                        placeholder=""
                        >{!! old('details',$data->details) !!}</textarea>
                        @error('details')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- row -->

            <div class="form-layout-footer">
                <button class="btn btn-secondary" type="reset">Reset</button>
                <button class="btn btn-info" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('title','service Edit')
@push('js')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        CKEDITOR.replace("details");
    });
</script>

@endpush

@push('css')
@endpush
