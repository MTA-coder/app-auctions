<?php

namespace App\Http\Requests\Auction;

use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateAuctionRequest extends FormRequest
{
    use FormRequestTrait;

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:1'],
            'minimum_bid' => ['required', 'numeric', 'min:1'],
            'end_time' => ['required', 'date_format:H:i:s'],
            'tag_id' => ['required', 'integer', Rule::exists('tags', 'id')],
            'category_id' => ['required', 'integer', Rule::exists('categories', 'id')],
        ];
    }
}
