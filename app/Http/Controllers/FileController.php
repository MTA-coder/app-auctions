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
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        try {
            Storage::disk('public')->put($fileName, file_get_contents($file));
            return ResponseHelper::operationSuccess($fileName);
        } catch (\Exception $th) {
            return ResponseHelper::operationFail($th->getMessage());
        }
    }
}
