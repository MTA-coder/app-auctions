<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{

    private  Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function create(CreateCategoryRequest $request)
    {
        $data = $request->validated();
        $result =  $this->category->create($data);

        return empty($result)
            ? ResponseHelper::operationFail()
            : ResponseHelper::operationSuccess($result);
    }
}
