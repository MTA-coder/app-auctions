<?php

namespace App\Http\Requests\Auth;

use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    use FormRequestTrait;

    public function rules()
    {
        return [
            'first_name' => ['string'],
            'last_name' => ['string'],
            'phone' => ['string'],
            'wallet' => ['numeric', 'min:0']
        ];
    }
}
