@extends('admin.layouts.master') @section('content')
    <div class="br-pagetitle">
        <h4 class="float-left">Payments List</h4>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="rounded table-responsive">
                <table class="table mg-b-0" id="myTable">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th class="text-center">User Information</th>
                            <th class="text-center">Date & Time</th>
                            <th class="text-center">Payment Date</th>
                            <th class="text-center">Gas Qty(Gallon)</th>
                            <th class="text-center">Per Gallon</th>
                            <th class="text-center">Total Paid Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $row)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td class="text-center">{{ $row->user?->name }} &nbsp ({{ $row->user?->phone }})</td>
                                <td class="text-center">{{ $row->delivery_date_time }}</td>
                                <td class="text-center">{{ $row->payment_date }}</td>
                                <td class="text-center">{{ $row->qty }}</td>
                                <td class="text-center">{{ $row->price }}</td>
                                <td class="text-center">{{ $row->paid_amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div>

@endsection

@push('title', 'orders List')
@push('js')


@endpush
@push('css')
@endpush
