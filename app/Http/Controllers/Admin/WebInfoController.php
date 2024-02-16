<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WebInfo;
use Auth;
use Image;
use File;

class WebInfoController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$web = WebInfo::first();
    	if ($web==null) {
    		$web = new WebInfo;
    		$web->save();
    	}
        return view('admin.web.index',compact('web'));
    }
    public function update(Request $request)
    {
        try {

            $web = WebInfo::first();
            WebInfo::first()->update($request->except('_token','logo','icon','icon','file'));

            if ($request->logo !=null) {
                $photoUrl = 'image_logo'.'_'.time().'.png';
                $path = public_path().'/uploads/images/web/';
                $url = '/uploads/images/web/';
                Image::make(file_get_contents($request->logo))->save($path.$photoUrl);
               $web->logo = $url.$photoUrl;
               $web->save();
            }
            if ($request->image_1 !=null) {
               $web->image_1 = $this->uploadImage($request,'image_1','900','400');
               $web->save();
            }
            if ($request->icon !=null) {
               $web->icon = $this->uploadImage($request,'icon','200','85');
               $web->save();
            }

            if ($request->file !=null) {
                $path = public_path().$web->file;
                if (file_exists($path) and $web->file !=null) {
                    unlink($path);
                }
                    $image = $request->file('file');
                    $fileInfo = $image->getClientOriginalName();
                    $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
                    $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
                    $file_name= $filename.'-'.time().'.'.$extension;
                    $image->move(public_path('uploads/files'),$file_name);
                    $web->file =  'uploads/files/'.$file_name;
                    $web->save();
            }
            toastr()->success('Saved Successfully');
            return back();
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());

             $err_message = \Lang::get($e->getMessage());
            toastr()->warning($err_message);
            return back();
        }
    }

    public function uploadImage($request,$type,$width,$hight)
    {
    	if ($request->$type !=null) {
             $photoUrl = 'image'.$type.'_'.time().'.png';
            $path = public_path().'/uploads/images/web/';
            $url = '/uploads/images/web/';
            Image::make(file_get_contents($request->$type))->resize($width, $hight)->save($path.$photoUrl);
          return $url.$photoUrl;
        }else{
        	return null;
        }
    }
}
