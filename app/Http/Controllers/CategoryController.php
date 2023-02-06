<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;

class CategoryController extends Controller
{    
    public function __construct(
        private CategoryService $CategoryService
    ) {
    }

    public function index()
    {
        return CategoryResource::collection($this->CategoryService->getCategories());
    }

    public function store(CreateCategoryRequest $request)
    {
        return $this->CategoryService->createCategory($request->name, $request->parent_category ?? 0);
    }

    public function destroy($id)
    {
        return $this->CategoryService->deleteCategory($id);
    }
}