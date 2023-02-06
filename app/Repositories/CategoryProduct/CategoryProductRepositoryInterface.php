<?php

namespace App\Repositories\CategoryProduct;


interface CategoryProductRepositoryInterface
{
    public function addProductCategories($productId, array $categories): array;
}
