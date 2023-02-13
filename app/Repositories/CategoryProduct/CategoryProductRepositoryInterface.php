<?php

namespace App\Repositories\CategoryProduct;


interface CategoryProductRepositoryInterface
{
    public function addProductCategories(int $productId, array $categories): void;
}
