<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Lang;
use App\Http\Requests\StoreContactUsRequest;
use App\Http\Requests\UpdateContactUsRequest;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        return view('admin.contactmessage.index',[
            'data'=>ContactUs::orderBy('id','desc')->paginate( $request->par_page ?? 25)
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
    public function store(StoreContactUsRequest $request)
    {
        try {
            DB::beginTransaction();
               ContactUs::create([
                "name" =>$request->name,
                "email" =>$request->email,
                "phone" =>$request->phone,
                "message" =>$request->message,
               ]);
                
            DB::commit();
            Toastr::success('Message Created Successfully', 'Title', ["positionClass" => "toast-top-center"]);

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
    public function show(ContactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactUsRequest $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactUs $contactUs)
    {
        //
    }
}
