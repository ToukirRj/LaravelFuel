@extends('admin.layouts.master') @section('content')

<div class="br-pagetitle">
    <h4 class="float-left">Settings</h4>
    <p class="mg-b-0"></p>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('admin.setting.update',$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="row mg-b-25">
              <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Name: </label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="EX: Basic service" value="{{ old('name',$data->name) }}" required />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Phone: </label>
                            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="EX: Basic service" value="{{ old('phone',$data->phone) }}" required />
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Email: </label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="EX: Basic service" value="{{ old('email',$data->email) }}" required />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Address: </label>
                            <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" placeholder="EX: Basic service" value="{{ old('address',$data->address) }}" required />
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Logo <span class="tx-danger">*</span></label>
                            <input class="form-control" type="file" name="logo" accept="image/x-png,image/gif,image/jpeg,image/webp">
                            @error('logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Old Photo <span class="tx-danger">*</span></label>
                            @if($data->logo)
                                <img src="{{ asset($data->logo) }}"  class="wd-80" width="80" class="m-3" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Icon <span class="tx-danger">*</span></label>
                            <input class="form-control" type="file" name="icon" accept="image/x-png,image/gif,image/jpeg,image/webp">
                            @error('icon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Old Photo <span class="tx-danger">*</span></label>
                            @if($data->icon)
                                <img src="{{ asset($data->icon) }}"  class="wd-30" width="30" class="m-3" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">Short Description: </label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror" name="short_description" id="short_description" cols="30" rows="4"
                            placeholder=""
                            >{!! old('short_description',$data->short_description) !!}</textarea>
                            @error('short_description')
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">Header Script: </label>
                            <textarea class="form-control @error('header_script') is-invalid @enderror" name="header_script" id="header_script" cols="30" rows="4"
                            placeholder=""
                            >{!! old('header_script',$data->header_script) !!}</textarea>
                            @error('header_script')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">Footer Script: </label>
                            <textarea class="form-control @error('footer_script') is-invalid @enderror" name="footer_script" id="footer_script" cols="30" rows="4"
                            placeholder=""
                            >{!! old('footer_script',$data->footer_script) !!}</textarea>
                            @error('footer_script')
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

@push('title','Seting')
@push('js')


@endpush

@push('css')
@endpush
