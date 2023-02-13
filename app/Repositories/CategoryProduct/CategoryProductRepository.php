<?php

namespace App\Repositories\CategoryProduct;

use App\Models\CategoryProduct;

class CategoryProductRepository implements CategoryProductRepositoryInterface
{
    public function addProductCategories(int $productId, array $categories): void
    {
        foreach ($categories as $category) {
            CategoryProduct::create([
                'category_id' => $category,
                'product_id' => $productId,
            ]);
        }
    }
}
