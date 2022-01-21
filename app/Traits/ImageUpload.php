<?php
namespace App\Traits;

use Illuminate\Support\Facades\File;
 use App\FileUploadPath\FileConstant;

trait ImageUpload{

    public function deleteExistingImage($data){
        $filename = public_path() . '/upload/' . $data;
        File::delete($filename);
    }

    public function uploadImage($query)
    {
        $image = mt_rand() . "_" . $query->getClientOriginalName();
        $query->move(public_path('upload'), $image);
        return $image;
    }

}
