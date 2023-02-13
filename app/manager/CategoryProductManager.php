<?php

namespace App\Manager;

use App\Repositories\CategoryProduct\CategoryProductRepository;

class CategoryProductManager
{
    public function __construct(
        private CategoryProductRepository $categoryProductRepository
    ) {
    }

    public function addProductCategories(int $productId, array $categories): void
    {
        $this->categoryProductRepository->addProductCategories($productId, $categories);
    }
}
