@extends('admin.layouts.master')
@section('content')


<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name', 'BMC Journal') }}</a>
    <a class="breadcrumb-item" href="#">Users</a>
    <span class="breadcrumb-item active">List</span>
  </nav>
</div><!-- br-pageheader -->
<div class="br-pagetitle">
  <i class="fa fa-industry" aria-hidden="true"></i>
  <div>
    <h4>Users List</h4>
    <p class="mg-b-0"></p>
  </div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <div class="col-6">
            
        <h6 class="br-section-label">Users List</h6>
        <p class="br-section-text"></p>
      </div>
      <div class="col-6">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary float-right">Add New</a>
      </div>
    </div>

          <div class="bd bd-gray-300 rounded table-responsive">
            <table class="table mg-b-0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @isset($users)
                @foreach($users as $key => $row)
                <tr>
                  <th scope="row">{{ $key+1 }}</th>
                  <td><img src="{{ asset($row->photo) }}" width="80" alt=""></td>
                  <td>{{ $row->name }}</td>
                  <td>
                    @php
                    $user_roles = $row->roles;
                    @endphp
                    @if(count($user_roles)>0)
                    @foreach($user_roles as $key => $user_role)
                    <span class="text-info">{{ $user_role->name }}@if($key+1<count($user_roles)),@endif</span>
                    @endforeach
                    @endif
                  </td>
                  <td class="text-center">
                    {{-- <a href="{{ route('admin.users.show',$row->id) }}" class="ml-2">View</a> --}}
                    <a href="{{ route('admin.users.edit',$row->id) }}" class="ml-2">Edit</a>
                    <a href="{{ route('admin.users.destroy',$row->id) }}" class="ml-2" onclick="event.preventDefault();
                                                     document.getElementById('delete-form{{ $row->id }}').submit();">Delete</a>
                    <form id="delete-form{{ $row->id }}" action="{{ route('admin.users.destroy',$row->id) }}" method="POST">@csrf @method('delete')</form>
                  </td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div><!-- bd -->

  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->
@endsection

@push('title','users List')
@push('js')


@endpush
@push('css')

@endpush