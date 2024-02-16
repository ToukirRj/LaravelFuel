<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Lang;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        return view('admin.user.index',[
            'data'=>User::withCount([
                    "orders"
                ])->orderBy('id','desc')->paginate( $request->par_page ?? 25)
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $user = User::query()->where("id",$id)->first();
            $user->status = $user->status ==1 ? 0:1;
            $user->save();
            DB::commit();
            Toastr::success('User Status Changed Successfully', 'Title', ["positionClass" => "toast-top-center"]);
            return redirect(route("admin.user.index"));
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            $err_message = Lang::get($th->getMessage());
            Toastr::error($err_message,'Title', ["positionClass" => "toast-top-center"]);
            return back();
        }
    }
}
