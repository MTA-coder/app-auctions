<?php

namespace App\Http\Requests\Auth;

use App\Enums\RoleEnum;
use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use BenSampo\Enum\Rules\EnumValue;


class RegisterRequest extends FormRequest
{
    use FormRequestTrait;

    public function rules()
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'phone' => ['required', 'string'],
            'shipping_address' => ['required', 'string'],
            'role' => ['required', 'string', new EnumValue(RoleEnum::class)],
            'password' => ['required', 'string'],
            'confirm_password' => ['required', 'string', 'same:password'],
        ];
    }
}
