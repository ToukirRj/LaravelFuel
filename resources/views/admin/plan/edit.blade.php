@extends('admin.layouts.master') @section('content')

<div class="br-pagetitle">
    <div class="custom-page-title">
        <h4 class="float-left">Edit Plan</h4>
        <a href="{{ route('admin.plan.index') }}" class="btn btn-info btn-sm float-right">Plans List</a>
        <p class="mg-b-0"></p>
    </div>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">
        <form action="{{ route('admin.plan.update',$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="row mg-b-25">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Name: </label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="EX: Basic Plan" value="{{ old('name',$data->name) }}" required />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Type: </label>
                        <input class="form-control @error('type') is-invalid @enderror" type="text" name="type" placeholder="EX: Per Month" value="{{ old('type',$data->type) }}" required />
                        @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-control-label">Price (USD): </label>
                        <input class="form-control @error('price') is-invalid @enderror" type="number" step="any" name="price" placeholder="EX: 8.00" value="{{ old('price',$data->price) }}" required />
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-control-label">Validity (Days): </label>
                        <input class="form-control @error('validity') is-invalid @enderror" type="number" name="validity" min="30" value="{{ old('validity',$data->validity) }}" required />
                        @error('validity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="form-control-label">Sort Index: </label>
                        <input class="form-control @error('sort_index') is-invalid @enderror" type="number" name="sort_index" value="{{ old('sort_index',$data->sort_index) }}" />
                        @error('sort_index')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="form-control-label">Status: </label>
                        <input class="" type="checkbox" {{ $data->status ? "checked" : "" }}  name="status" value="1" />
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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

@push('title','Plan Edit')
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
