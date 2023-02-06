<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $productService
    ) {
    }
    
    public function index(Request $request) 
    {
        return ProductResource::collection($this->productService->getProductsInOrder($request->query('sortBy') ?? 'name', $request->query('sortingType') ?? 'asc'));
    }

    public function store(CreateProductRequest $request)
    {
        return $this->productService->createProduct($request->name, $request->description, $request->price, $request->image, $request->categories);  
    }

    public function destroy($id)
    {
        return $this->productService->deleteProduct($id);
    }
}
