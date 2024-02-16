<?php
namespace App\Helpers;
// Code within app\Helpers\SkImage.php
use File;
use Image;

class SkImage
{
    public static  function showImage($url=null)
    {
        if (File::exists($url)) {
            return asset($url);
        }else{
            return asset('/uploads/images/blank.png');
        }
    }
    public static function imageUpload($request,$data,$folder="sliders",$width=900,$hight=null)
    {
        $path = public_path().'/uploads/images/'.$folder;
        if (!is_dir($path)) {
            mkdir($path);
        }
        if ($request->file('image')) {
            if ($data->image and file_exists(public_path().$data->image)) {
                unlink(public_path().$data->image);
            }
                $path = public_path().$data->image;
                $photoUrl = 'image'.time().'.png';
                $path = public_path().'/uploads/images/'.$folder.'/';
                $url = '/uploads/images/'.$folder.'/';
                Image::make(file_get_contents($request->image))->resize($width, $hight, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($path.$photoUrl);
                $data->image =  $url.$photoUrl;
                $data->save();
        }
    }
    public static function logoUpload($request,$data,$folder="companies",$width=900,$hight=null)
    {
        $path = public_path().'/uploads/images/'.$folder;
        if (!is_dir($path)) {
            mkdir($path);
        }
        if ($request->file('logo')) {
            if ($data->logo and file_exists(public_path().$data->logo)) {
                unlink(public_path().$data->logo);
            }
                $path = public_path().$data->logo;
                $photoUrl = 'logo'.time().'.png';
                $path = public_path().'/uploads/images/'.$folder.'/';
                $url = 'uploads/images/'.$folder.'/';
                Image::make(file_get_contents($request->logo))->resize($width, $hight, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($path.$photoUrl);
                $data->logo =  $url.$photoUrl;
                $data->save();
        }
    }

    public static function imageUploadAdvertise($request,$data,$folder="sliders",$width=270,$hight=385)
    {
        $path = public_path().'/uploads/images/'.$folder;
        if (!is_dir($path)) {
            mkdir($path);
        }
        if ($request->file('image')) {
            if ($data->image and file_exists(public_path().$data->image)) {
                unlink(public_path().$data->image);
            }
                $path = public_path().$data->image;
                $photoUrl = 'image'.time().'.png';
                $path = public_path().'/uploads/images/'.$folder.'/';
                $url = '/uploads/images/'.$folder.'/';
                Image::make(file_get_contents($request->image))->resize($width, $hight)->save($path.$photoUrl);
                $data->image =  $url.$photoUrl;
                $data->save();
        }
    }
}
