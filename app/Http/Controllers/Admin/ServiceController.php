<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Support\Str;
use App\Classes\SkFileUpload;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Lang;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.service.index',['data'=>Service::orderBy('sort_index','desc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request,SkFileUpload $skFileUpload)
    {
        try {
            DB::beginTransaction();
            $service = Service::query()->create([
                "name"=>$request->name,
                "short_name"=>$request->short_name,
                "price"=>$request->price,
                "unit"=>$request->unit,
                "sort_index"=>$request->sort_index,
                "status"=>$request->status ?1:0,
                "details"=>$request->details,
            ]);
            if ($request->hasFile("image")) {
                $skFileUpload->imageUpload(
                    image:$request->image,
                    data:$service,
                    folder:"service",
                    width:100
                );
            }
            DB::commit();
            Toastr::success('Service Created Successfully', 'Title', ["positionClass" => "toast-top-center"]);
            return redirect(route("admin.service.index"));
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            $err_message = Lang::get($th->getMessage());
            Toastr::error($err_message,'Title', ["positionClass" => "toast-top-center"]);
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.service.edit',['data'=>$service]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service,SkFileUpload $skFileUpload)
    {
        try {
            DB::beginTransaction();
            Service::query()->where("id",$service->id)->update([
                "name"=>$request->name,
                "short_name"=>$request->short_name,
                "price"=>$request->price,
                "unit"=>$request->unit,
                "slug"=>Str::slug($request->name),
                "sort_index"=>$request->sort_index,
                "status"=>$request->status ?1:0,
                "details"=>$request->details,
            ]);
            if ($request->hasFile("image")) {
                $skFileUpload->imageUpload(
                    image:$request->image,
                    data:$service,
                    folder:"service",
                    width:100
                );
            }
            DB::commit();
            Toastr::success('Service Updated Successfully', 'Title', ["positionClass" => "toast-top-center"]);
            return redirect(route("admin.service.index"));
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            $err_message = Lang::get($th->getMessage());
            Toastr::error($err_message,'Title', ["positionClass" => "toast-top-center"]);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        try {
            DB::beginTransaction();
            Service::query()->where("id",$service->id)->delete();
            DB::commit();
            Toastr::success('service Deleted Successfully', 'Title', ["positionClass" => "toast-top-center"]);
            return redirect(route("admin.service.index"));
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            $err_message = Lang::get($th->getMessage());
            Toastr::error($err_message,'Title', ["positionClass" => "toast-top-center"]);
            return back();
        }
    }
}
