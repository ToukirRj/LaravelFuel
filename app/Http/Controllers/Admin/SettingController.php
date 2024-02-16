<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Classes\SkFileUpload;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Lang;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::query()->first();
        return view("admin.setting.edit",[
            "data"=>$setting
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
    public function store(StoreSettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingRequest $request, Setting $setting,SkFileUpload $skFileUpload)
    {
        try {
            DB::beginTransaction();
            Setting::query()->first()->update([
                "name"=>$request->name,
                "phone"=>$request->phone,
                "email"=>$request->email,
                "address"=>$request->address,
                "short_description"=>$request->short_description,
                "header_script"=>$request->header_script,
                "footer_script"=>$request->footer_script,
            ]);
            if ($request->hasFile("logo")) {
                $skFileUpload->imageUpload(
                    image:$request->logo,
                    property:"logo",
                    data:$setting,
                    folder:"setting",
                    width:100
                );
            }
            if ($request->hasFile("icon")) {
                $skFileUpload->imageUpload(
                    image:$request->icon,
                    property:"icon",
                    data:$setting,
                    folder:"setting",
                    width:100
                );
            }
            DB::commit();
            Toastr::success('Settings Updated Successfully', 'Title', ["positionClass" => "toast-top-center"]);
            return redirect(route("admin.setting.index"));
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
    public function destroy(Setting $setting)
    {
        //
    }
}
