@extends('admin.layouts.master') @section('content')

<div class="br-pagetitle">
    <div class="custom-page-title pl-0">
        <h4 class="float-left">Date Manage</h4>
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
                        <th>Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>@foreach($data as $key => $row)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <th>{{  date('M-d-Y', strtotime($row->date)) }} ({{  date('l', strtotime($row->date)) }})</th>
                        <td class="text-center">
                            <a
                                href="{{ route('admin.date.destroy',$row->id) }}"
                                class="btn {{$row->status == 1? "btn btn-sm btn-success" :  "btn btn-sm btn-warning" }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('delete-form{{ $row->id }}').submit();"
                            >
                                {{$row->status == 1? "Activated" :  "Deactivated" }}
                            </a>
                            <form id="delete-form{{ $row->id }}" action="{{ route('admin.date.destroy',$row->id) }}" method="POST">@csrf @method("DELETE")</form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection
@push('title','Date List')
@push('js')
@endpush
@push('css')
@endpush
