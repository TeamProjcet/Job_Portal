<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\files;
use App\Supports\Helper;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    use Helper;

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $size = $file->getSize();
            $filePath = "app/public/uploads";
            $file->move(storage_path($filePath), $name);

            $fileRecord = files::create([
                'name' => $name,
                'extension' => $extension,
                'size' => $size,
            ]);


            $files = [
                'name' => $fileRecord->name,
                'extension' => $fileRecord->extension,
                'size' => $fileRecord->size,
                'path' => "/uploads/$name",
            ];

            return $this->returnData(2000, $files);
        }
    }


}
