<?php

namespace App\Traits;

trait ImageUpload
{
    public function uploadImage($request, $upload_path = 'uploads', $field = 'image', $disk = 'public') {
        if(!$request->hasFile($field)) {
            return null;
        }

        $file = $request->file($field);

        return $file->store($upload_path, [
            'disk' => $disk
        ]);
    }
}
