@extends('admin.layouts.master') @section('content')
    <div class="br-pagetitle">
        <h4 class="float-left">Orders List</h4>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="rounded table-responsive">
                <table class="table mg-b-0" id="myTable">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>ID</th>
                            <th>User Information</th>
                            <th class="text-center">Image</th>
                            <th title="Vehicle Information">V.I</th>
                            <th colspan="2">Service</th>
                            <th class="text-center">Date & Time</th>
                            <th>Delivery Address</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $row)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <th scope="row">#{{ $row->id }}</th>
                                <td>
                                    {{ $row->user?->name }} <br>
                                    {{ $row->user?->phone }}<br>
                                    {{ $row->user?->email }}<br>
                                </td>
                                <td class="text-center">
                                    <img src="{{ asset($row->image ?? 'frontend//img/noimg.png') }}" alt="img"
                                        width="60" height="40" />
                                </td>
                                <td colspan="2">
                                    {{ $row->vehicle_name }} <br>
                                    License plate No: {{ $row->vehicle_model }}
                                </td>
                                <td>
                                    @if($row->qty == 0)
                                    Full Tank, {{ $row->service?->short_name ?? $row->service?->name }}
                                    @else
                                        {{ $row->qty }} {{ $row->unit ?? $row->service?->unit }} {{ $row->service?->short_name ?? $row->service?->name }} <br>
                                        {{-- Price: {{ $row->price }}<br>
                                        Total: {{ $row->total }}<br> --}}
                                    @endif
                                </td>
                                <td class="text-center">{{ date('M-d-Y  H:i:s', strtotime($row->delivery_date_time)) }}</td>
                                <td>{{ $row->address }}</td>
                                <td class="text-center">{{ $row->status }}</td>
                                <td class="text-center">
                                    @if($row->status == "Pending")
                                    <a class="btn btn-info btn-sm" href="javascript:void()" onclick="status_deleverd({{ $row }})" class="ml-2">Make Delivered</a>
                                    @else
                                        {{-- <a class="nav-link" href="javascript:void()" onclick="status_deleverd()" class="ml-2">Make Delivered</a> --}}
                                    @endif
                                    {{-- <a class="nav-link" href="{{ route('admin.order.show', $row->id) }}"
                                        class="ml-2"> <i class="icon ion-ios-person"></i> View
                                        Order</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="make-deleverd">
        <div class="modal-dialog" role="document">
            <form action="{{ route("admin.order.status.change") }}" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Make Delivery</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                    @csrf
                    <input type="hidden" name="order_id" id="order_id">
                    <input type="hidden" name="status" id="status">
                    <div class="row mg-b-25">
                        <div class="col-md-12">
                            <label class="form-control-label">name: </label>
                            <p class="form-control" id="name"  > </p>

                            <label class="form-control-label">Phone : </label>
                            <p class="form-control" id="phone"  > </p>

                            <div class="form-group">
                                <label class="form-control-label">Gas  (Gallon): </label>
                                <input class="form-control @error('qty') is-invalid @enderror" id="qty" oninput="calculate()" type="number" step="any" name="qty" min="0"  value="0" required />
                                @error('qty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Per Unit ($): </label>
                                <input class="form-control @error('price') is-invalid @enderror" id="price" type="number" step="any"  value="0" readonly />
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Total Price: </label>
                                <input class="form-control @error('total') is-invalid @enderror" id="total" type="number" step="any" name="total" min="0"  value="0" readonly />
                                @error('total')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Confirm Delivery</button>
            </div>
          </div>

        </form>
        </div>
      </div>
@endsection

@push('title', 'orders List')
@push('js')

<script>
    function status_deleverd(data){
        $("#name").html(data.user.name)
        $("#phone").html(data.user.phone)
        $("#address").html(data.user.address)
        $("#delivery_date_time").html(data.delivery_date_time)
        $("#vehicle_name").html(data.vehicle_name)
        $("#vehicle_model").html(data.vehicle_model)




        $("#order_id").val(data.id)
        $("#status").val("Delivered")

        $("#qty").val(data.qty)

        $("#qty").prev('label').text(`${data.service.short_name}  (${data.service.unit}):`);
        $("#price").val(data.price)

        $("#price").prev('label').text(`Per Unit (${data.service.unit}):`);
        $("#total").val(data.total)

        $("#make-deleverd").modal("show")
        console.log("sssssssssssss");
    }
    function calculate(){
         let qty = $("#qty").val()
         let price = $("#price").val()
         let total = Number(Number(qty).toFixed(2) * Number(price).toFixed(2))+0 ;
         $("#total").val(total)
    }
</script>
@endpush
@push('css')
@endpush
