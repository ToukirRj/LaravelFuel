<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Classes\SkFileUpload;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\PasswordUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        $user = $request->user();
        return view('web.userprofile', [
            'user' => $user,
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request,SkFileUpload $skFileUpload): RedirectResponse
    {
        // dd($request->all());
        try {
            DB::beginTransaction();
                $request->user()->fill($request->validated());

                if ($request->user()->isDirty('email')) {
                    $request->user()->email_verified_at = null;
                }

                $request->user()->save();
                if ($request->hasFile("image")) {
                    $skFileUpload->imageUpload(
                        image:$request->image,
                        data:$request->user(),
                        folder:"user",
                        width:100
                    );
                }
            DB::commit();
            Toastr::success('Profile Created Successfully', 'Title', ["positionClass" => "toast-top-center"]);

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            $err_message = Lang::get($th->getMessage());
            Toastr::error($err_message,'Title', ["positionClass" => "toast-top-center"]);
        }

        return back();


        // return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    public function change_password(PasswordUpdateRequest $request)
    {

    	//attempt login.
    	$user = User::findOrFail(Auth::id());
        if(Auth::attempt(['email' => $user->email, 'password' => $request->password])){
            //Authenticated
	            try {
	            $user->password = Hash::make($request->new_password);
	            $user->save();

	            Toastr::success('Password Changed successfully');

	            return back();
	        }catch (\Exception $e) {
	            $err_message = Lang::get($e->getMessage());
	            Toastr::error($err_message,'Title', ["positionClass" => "toast-top-center"]);
	            return back();
	        }

        }else{
        	Toastr::warning('Password Dose Not Match');
            return back();
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
