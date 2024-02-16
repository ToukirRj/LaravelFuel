<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Classes\SkFileUpload;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Lang;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        return view('admin.order.index',[
            'data'=>Order::with([
                    "user"
                ])->orderBy('id','desc')->paginate( $request->par_page ?? 25)
            ]);
    }
    public function payments()
    {
        $request = request();
        return view('admin.order.payments',[
            'data'=>Order::with([
                    "user"
                ])->orderBy('id','desc')->where("payment_date","!=",null)->paginate( $request->par_page ?? 25)
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request,SkFileUpload $skFileUpload)
    {
        try {
            DB::beginTransaction();
               $order =  Order::create([
                    "vehicle_name" =>$request->vehicle_name,
                    "vehicle_model" =>$request->vehicle_model,
                    "delivery_date_time" =>$request->delivery_date_time,
                    "address" =>$request->address,
                    "user_id" =>$request->user()->id,
               ]);
                if ($request->hasFile("image")) {
                    $skFileUpload->imageUpload(
                        image:$request->image,
                        data:$order,
                        folder:"order",
                        width:600
                    );
                }
            DB::commit();
            Toastr::success('Order Created Successfully', 'Title', ["positionClass" => "toast-top-center"]);

        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            $err_message = Lang::get($th->getMessage());
            Toastr::error($err_message,'Title', ["positionClass" => "toast-top-center"]);
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('admin.order.show',['data'=>$order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function status_change()
    {
        $request = request();
        // order_id
        // status
        try {
            DB::beginTransaction();
               $order =  Order::where([
                "id"=>$request->order_id,
               ])->firstOrFail();
               $order->qty = $request->qty;
               $order->price = $request->price;
               $order->total = $request->total;
               $order->paid_amount = $request->total;
            //    $order->due_amount = $request->due_amount;
               $order->payment_date = date("Y-m-d");
               $order->status = "Delivered";
               $order->save();
               $order->user->debitBalance($request->total * 100, 'Gasoline Order Payment id:#'.$order->id);
            DB::commit();
            Toastr::success('Status Changed Successfully', 'Title', ["positionClass" => "toast-top-center"]);

        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            $err_message = Lang::get($th->getMessage());
            Toastr::error($err_message,'Title', ["positionClass" => "toast-top-center"]);
        }

        return back();
    }
}
