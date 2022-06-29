<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\File\UploadFileRequest;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(UploadFileRequest $request)
    {
        $request->validated();
        $file = $request->file('image');
        $folder = $request->get('folder');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $fullPath = $folder . '/' . $fileName;
        try {
            Storage::disk('public')->put($fullPath, file_get_contents($file));
            return ResponseHelper::operationSuccess($fullPath);
        } catch (\Exception $th) {
            return ResponseHelper::operationFail($th->getMessage());
        }
    }
}
