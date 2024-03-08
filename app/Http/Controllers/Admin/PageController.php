<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Lang;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Classes\SkFileUpload;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.page.index',['data'=>Page::orderBy('sort_index','desc')->get()]);
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
    public function store(StorePageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('admin.page.edit',['data'=>$page]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request, Page $page,SkFileUpload $skFileUpload)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();
            Page::query()->where("id",$page->id)->update([
                "title"=>$request->title,
                "title_2"=>$request->title_2,
                "details"=>$request->details,
            ]);
            if ($request->hasFile("image")) {
                $skFileUpload->imageUpload(
                    image:$request->image,
                    data:$page,
                    folder:"page",
                    width:1900
                );
            }
            DB::commit();
            Toastr::success('Page Updated Successfully', 'Title', ["positionClass" => "toast-top-center"]);
            return redirect(route("admin.page.index"));
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
    public function destroy(Page $page)
    {
        //
    }
}
