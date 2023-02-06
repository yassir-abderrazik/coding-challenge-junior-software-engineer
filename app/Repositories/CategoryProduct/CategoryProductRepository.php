<?php

namespace App\Repositories\CategoryProduct;

use App\Models\Product;

class CategoryProductRepository implements CategoryProductRepositoryInterface
{
    public function addProductCategories($productId, $categories): array
    {
        return Product::query()->find($productId)->categories()->sync($categories);
    }
}
