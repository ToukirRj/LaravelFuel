<?php

namespace App\Http\Controllers\Admin;

use File;
use Hash;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Classes\SkFileUpload;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Intervention\Image\Laravel\Facades\Image;

class AccountController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
    	$user = Admin::findOrFail(Auth::id());
    	return view('admin.account.edit',compact('user'));
    }
    public function update(Request $request,SkFileUpload $skFileUpload)
    {
    	//attempt login.
    	$id = Auth::id();
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:admins,email,'.$id,
        ]);

    	$user = Admin::findOrFail(Auth::id());
        if(Auth::attempt(['email' => $user->email, 'password' => $request->password])){

	            try {
                    $user->name =  $request->name;
                    $user->email =  $request->email;

                    $user->save();
                    if ($request->hasFile("image")) {
                        $skFileUpload->imageUpload(
                            image:$request->image,
                            data:$user,
                            folder:"admin",
                            width:100
                        );
                    }


                Toastr::success('Profile Updated successfully', 'Title', ["positionClass" => "toast-top-center"]);

	            return back();
	        }catch (\Exception $e) {
	            $err_message = Lang::get($e->getMessage());
                Toastr::success($err_message,'Profile Updated successfully', 'Title', ["positionClass" => "toast-top-center"]);
	            return back();
	        }

        }else{
        	toastr()->warning('Password Dose Not Match');
            return back();
        }

    }
    public function change_password(Request $request)
    {

        $this->validate($request, [
            'new_password' => 'required|string|min:8|max:255',
            'confirm_password' => 'required_with:password|same:new_password|min:6',
        ]);

    	//attempt login.
    	$user = Admin::findOrFail(Auth::id());
        if(Auth::attempt(['email' => $user->email, 'password' => $request->password])){
            //Authenticated
	            try {
	            $user->password = Hash::make($request->new_password);
	            $user->save();

	            toastr()->success('Password Changed successfully');

	            return back();
	        }catch (\Exception $e) {
	            $err_message = \Lang::get($e->getMessage());
	            toastr()->warning($err_message);
	            return back();
	        }

        }else{
        	toastr()->warning('Password Dose Not Match');
            return back();
        }

    }
}
