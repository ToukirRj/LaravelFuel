<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Support\Str;
use App\Classes\SkFileUpload;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Lang;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.testimonial.index',['data'=>Testimonial::orderBy('sort_index','desc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestimonialRequest $request,SkFileUpload $skFileUpload)
    {
        try {
            DB::beginTransaction();
            $testimonial = Testimonial::query()->create([
                "name"=>$request->name,
                "sort_index"=>$request->sort_index,
                "status"=>$request->status ?1:0,
                "message"=>$request->message,
                "designation"=>$request->designation,
            ]);
            if ($request->hasFile("image")) {
                $skFileUpload->imageUpload(
                    image:$request->image,
                    data:$testimonial,
                    folder:"testimonial",
                    width:100
                );
            }
            DB::commit();
            Toastr::success('Testimonial Created Successfully', 'Title', ["positionClass" => "toast-top-center"]);
            return redirect(route("admin.testimonial.index"));
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
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit',['data'=>$testimonial]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial,SkFileUpload $skFileUpload)
    {
        try {
            DB::beginTransaction();
            Testimonial::query()->where("id",$testimonial->id)->update([
                "name"=>$request->name,
                "sort_index"=>$request->sort_index,
                "status"=>$request->status ?1:0,
                "message"=>$request->message,
                "designation"=>$request->designation,
            ]);
            if ($request->hasFile("image")) {
                $skFileUpload->imageUpload(
                    image:$request->image,
                    data:$testimonial,
                    folder:"testimonial",
                    width:100
                );
            }
            DB::commit();
            Toastr::success('Testimonial Updated Successfully', 'Title', ["positionClass" => "toast-top-center"]);
            return redirect(route("admin.testimonial.index"));
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
    public function destroy(Testimonial $testimonial)
    {
        try {
            DB::beginTransaction();
            Testimonial::query()->where("id",$testimonial->id)->delete();
            DB::commit();
            Toastr::success('Testimonial Deleted Successfully', 'Title', ["positionClass" => "toast-top-center"]);
            return redirect(route("admin.testimonial.index"));
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            $err_message = Lang::get($th->getMessage());
            Toastr::error($err_message,'Title', ["positionClass" => "toast-top-center"]);
            return back();
        }
    }
}
