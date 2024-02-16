<?php

namespace App\Classes;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class SkFileUpload
{
    public function imageUpload(
        $image = null,
        $data = null,
        $folder = "other",
        $width = 900,
        $hight = null,
        $property = 'image',
        $fileName = null,
        $extension = null,
    ) {

        $url = "storage/uploads/{$property}/{$folder}/";
        $path = public_path($url);
        $extension = $extension ?? '.webp';
        $fileName = $fileName ?? "$property" . time() . rand() . $extension;
        if (!File::exists($path)) {
            // If it doesn't exist, create it
            File::makeDirectory($path, 0755, true, true);
        }


        if (request()->file($property) && !$image) {
            $image = request()->file($property);
        } elseif (!request()->file($property) && !$image) {
            throw new \InvalidArgumentException('No file');
        }

        if (is_string($image)) {
            // Base64 or Blob data
            $image = $this->convertAndSaveBase64($image, $fileName);
        }

        if (!is_a($image, UploadedFile::class)) {
            throw new \InvalidArgumentException('Unsupported data type for image upload.');
        }

        if ($data) {
            if ($data->$property and file_exists(public_path($data->$property))) {
                // unlink(public_path($data->$property));
                Storage::delete($data->$property);
                // dd("unlink x",$data->$property and file_exists(public_path($data->$property)));
            }
            // dd("unlink no");
        }

        $this->saveFile($image, $width, $hight, $path, $fileName);

        if ($data) {
            $data->$property =  $url . $fileName;
            $data->save();
        }
        return $url . $fileName;
    }

    protected function saveFile($image, $width, $hight, $path, $fileName)
    {
        try {
            Image::read($image)->scale($width)->save($path . $fileName);
        } catch (\Throwable $th) {
            throw $th;
            File::put($path . $fileName, file_get_contents($image));
        }
    }
    protected function convertAndSaveBase64($base64String, $filename)
    {
        // Remove the data URI scheme and save as a file
        $fileData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64String));
        $tempFilePath = tempnam(sys_get_temp_dir(), 'base64');
        file_put_contents($tempFilePath, $fileData);

        // Create an UploadedFile instance
        $file = new UploadedFile($tempFilePath, $filename);

        return $file;
    }
}
