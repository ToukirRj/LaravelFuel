@extends('admin.layouts.master') @section('content')

<div class="br-pagetitle">
    <h4 class="float-left">Contact Messages</h4>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">
        <div class=" rounded table-responsive">
            <table class="table mg-b-0" id="myTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>@foreach($data as $key => $row)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <th>{{ $row->name }}</th>
                        <th>{{ $row->phone }}</th>
                        <th>{{ $row->email }}</th>
                        <th>{{ $row->message }}</th>                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection
@push('title','Messages List')
@push('js')
@endpush
@push('css')
@endpush
