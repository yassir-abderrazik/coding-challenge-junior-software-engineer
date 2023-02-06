<?php

namespace App\Manager;

use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class CategoryManager
{
    public function __construct(
        private CategoryRepository $categoryRepository
    ) {
    }

    public function getCategories(): Collection
    {
        return $this->categoryRepository->getCategories();
    }
    
    public function getCategoriesInOrder(string $sortBy, string $type): Collection
    {
        return $this->categoryRepository->getCategoriesInOrder($sortBy, $type);
    }

    public function createCategory(array $categoryDetails): Category
    {
        return $this->categoryRepository->createCategory($categoryDetails);
    }

    public function deleteCategory(int $categoryId): bool
    {
        return $this->categoryRepository->deleteCategory($categoryId);
    }
}
