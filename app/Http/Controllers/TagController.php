<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\Tag\CreateTagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    private Tag $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function create(CreateTagRequest $request)
    {
        $data = $request->validated();
        $tag =  $this->tag->create($data);

        return empty($tag)
            ? ResponseHelper::operationFail()
            : ResponseHelper::operationSuccess($tag);
    }
}
