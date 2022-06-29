<?php

namespace App\Http\Requests\Category;

use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCategoryRequest extends FormRequest
{
    use FormRequestTrait;

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
        ];
    }
}
