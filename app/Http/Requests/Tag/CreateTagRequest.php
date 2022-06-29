<?php

namespace App\Http\Requests\Tag;

use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class CreateTagRequest extends FormRequest
{
    use FormRequestTrait;
    public function rules()
    {
        return [
            'name' => ['required', 'string']
        ];
    }
}
