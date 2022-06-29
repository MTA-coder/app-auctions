<?php

namespace App\Http\Requests\Auction;

use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetAuctionRequest extends FormRequest
{
    use FormRequestTrait;

    public function rules()
    {
        return [
            'category_id' => ['integer', Rule::exists('categories', 'id')],
            'tag_id' => ['integer', Rule::exists('tags', 'id')],
            'low_price' => ['numeric'],
            'high_price' => ['numeric']
        ];
    }
}
