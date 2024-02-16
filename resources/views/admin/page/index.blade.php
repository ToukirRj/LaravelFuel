@extends('admin.layouts.master')
@section('content')

<div class="br-pagetitle">
    <h4>Page Sections</h4>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
      <div class="bd bd-gray-300 rounded table-responsive">
        <table class="table mg-b-0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Image</th>
              <th>Title</th>
              <th>Content</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $key => $row)
            <tr>
              <th scope="row">{{ $key+1 }}</th>
              <th > <img src="{{ showImage($row->image) }}" width="80" alt=""></th>
              <td>{{ $row->title }}</td>
              <td>{{ Str::limit(strip_tags($row->details), 150, $end='...') }}</td>
              <td class="text-center">
                <a href="{{ route('admin.page.edit',$row->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div><!-- bd -->
  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->
@endsection

@push('title','Page List')
@push('js')


@endpush
@push('css')

@endpush