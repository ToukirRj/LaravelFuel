@extends('admin.layouts.master') @section('content')

<div class="br-pagetitle">
    <div class="custom-page-title pl-0">
        <h4 class="float-left">Add Testimonial</h4>
        <a href="{{ route('admin.testimonial.index') }}" class="btn btn-info btn-sm float-right">Testimonial List</a>
        <p class="mg-b-0"></p>
    </div>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">
        <form action="{{ route('admin.testimonial.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mg-b-25">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Name: </label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="EX: Jon Do" value="{{ old('name') }}" required />
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Designation: </label>
                                <input class="form-control @error('designation') is-invalid @enderror" type="text" name="designation" placeholder="EX: CEO OF XYZ Ltd" value="{{ old('designation') }}" required />
                                @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Message: </label>
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" cols="30" rows="4"
                                placeholder=""
                                >{!! old('message') !!}</textarea>
                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-2 d-none">
                            <div class="form-group">
                                <label class="form-control-label">Sort Index: </label>
                                <input class="form-control @error('sort_index') is-invalid @enderror" type="number" name="sort_index" value="{{ old('sort_index',0) }}" />
                                @error('sort_index')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-2 d-none">
                            <div class="form-group">
                                <label class="form-control-label">Status: </label>
                                <input class="" type="checkbox" checked name="status" value="1" />
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="form-control-label">Image <span class="tx-danger">*</span></label>
                                <input class="form-control" type="file" name="image" accept="image/x-png,image/gif,image/jpeg" required>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
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

@push('title','testimonial Add')
@push('js')

@endpush

@push('css')
@endpush
