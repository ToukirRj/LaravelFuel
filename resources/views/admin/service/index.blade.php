@extends('admin.layouts.master') @section('content')

<div class="br-pagetitle">
    <div class="custom-page-title pl-0">
        <h4 class="float-left">Service and Prices</h4>
        <a href="{{ route('admin.service.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add New</a>
        <p class="mg-b-0"></p>
    </div>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">
        <div class=" rounded table-responsive">
            <table class="table mg-b-0" id="myTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Short Name</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>@foreach($data as $key => $row)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <th>{{ $row->name }}</th>
                        <th>{{ $row->short_name }}</th>
                        <th>{{ $row->unit }}</th>
                        <th>${{ $row->price }}</th>
                        <td>
                            @if($row->status==1)
                            <span class="btn btn-sm btn-success"><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
                            @else
                            <span class="btn btn-sm btn-warning"><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                            @endif
                        </td>
                        <td class="text-center">
                            {{-- <a href="{{ route('admin.service.show',$row->id) }}" class="btn btn-sm btn-success">View</a> --}}
                            <a href="{{ route('admin.service.edit',$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <a
                                href="{{ route('admin.service.destroy',$row->id) }}"
                                class="btn btn-sm btn-warning"
                                onclick="event.preventDefault();
                                                     document.getElementById('delete-form{{ $row->id }}').submit();"
                            >
                                Delete
                            </a>
                            <form id="delete-form{{ $row->id }}" action="{{ route('admin.service.destroy',$row->id) }}" method="POST">@csrf @method("DELETE")</form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('title','services List')
@push('js')
@endpush
@push('css')
@endpush
