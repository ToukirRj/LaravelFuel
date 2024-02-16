@extends('admin.layouts.master') @section('content')

<div class="br-pagetitle">
    <i class="fa fa-sitemap"></i>
    <div class="custom-page-title">
        <h4 class="float-left">Rorls</h4>
        <a href="{{ route('admin.boards.index') }}" class="btn btn-info btn-sm float-right"> <i class="fa fa-list"></i> Rorls</a>

        <p class="mg-b-0"></p>
    </div>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Rorl Edit</h6>
        <form action="{{ route('admin.boards.update',$board->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Name: </label>
                            <input class="form-control" type="text" name="name" value="{{ $board->name }}" required />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">BN Name: </label>
                            <input class="form-control" type="text" name="bn_name" value="{{ $board->bn_name }}"  />
                            @error('bn_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="form-control-label">Status: </label>
                            <input class="" type="checkbox" @if($board->status ==1) checked @endif name="status" value="1"> @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="form-control-label">Sort Index: </label>
                            <input class="form-control" type="number" name="xsort" value="{{ $board->xsort }}" />
                            @error('xsort')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-layout-footer">
                    <button class="btn btn-secondary" type="reset">Reset</button>
                    <button class="btn btn-outline-success" name="submit" value="s&c" type="submit">Save and Continew</button>
                    <button class="btn btn-info" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection @push('title','board Add') @push('js')


@endpush @push('css') @endpush

