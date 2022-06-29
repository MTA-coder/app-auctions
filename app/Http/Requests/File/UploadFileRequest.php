<?php

namespace App\Http\Requests\File;

use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class UploadFileRequest extends FormRequest
{
    use FormRequestTrait;

    public function rules()
    {
        return [
            'images' => ['required', 'mimes:png,jpg,svg,jpeg']
        ];
    }
}
