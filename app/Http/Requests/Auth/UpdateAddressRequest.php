<?php

namespace App\Http\Requests\Auth;

use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAddressRequest extends FormRequest
{
    use FormRequestTrait;

    public function rules()
    {
        return [
            'post_code' => ['string'],
            'street' => ['string'],
            'city_id' => [
                'required', 'number', Rule::exists('cities', 'id')
            ],
        ];
    }
}
