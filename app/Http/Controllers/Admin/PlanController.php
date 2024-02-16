<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Lang;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;

class PlanController extends Controller
{
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.plan.index',['data'=>Plan::orderBy('sort_index','desc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.plan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlanRequest $request)
    {
        try {
            DB::beginTransaction();
            $plan = Plan::query()->create([
                "name"=>$request->name,
                "slug"=>Str::slug($request->name),
                "type"=>$request->type,
                "price"=>$request->price,
                "validity"=>$request->validity,
                "sort_index"=>$request->sort_index,
                "status"=>$request->status ?1:0,
                "details"=>$request->details,
            ]);
            DB::commit();
            Toastr::success('Plan Created Successfully', 'Title', ["positionClass" => "toast-top-center"]);
            return redirect(route("admin.plan.index"));
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
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        return view('admin.plan.edit',['data'=>$plan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        try {
            DB::beginTransaction();
            Plan::query()->where("id",$plan->id)->update([
                "name"=>$request->name,
                "slug"=>Str::slug($request->name),
                "type"=>$request->type,
                "price"=>$request->price,
                "validity"=>$request->validity,
                "sort_index"=>$request->sort_index,
                "status"=>$request->status ?1:0,
                "details"=>$request->details,
            ]);
            DB::commit();
            Toastr::success('Plan Updated Successfully', 'Title', ["positionClass" => "toast-top-center"]);
            return redirect(route("admin.plan.index"));
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
    public function destroy(Plan $plan)
    {
        try {
            DB::beginTransaction();
            Plan::query()->where("id",$plan->id)->delete();
            DB::commit();
            Toastr::success('Plan Deleted Successfully', 'Title', ["positionClass" => "toast-top-center"]);
            return redirect(route("admin.plan.index"));
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            $err_message = Lang::get($th->getMessage());
            Toastr::error($err_message,'Title', ["positionClass" => "toast-top-center"]);
            return back();
        }
    }
}
