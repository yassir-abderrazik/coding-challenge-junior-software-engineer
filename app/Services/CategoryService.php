<?php

namespace App\Services;

use App\Manager\CategoryManager;
use App\Models\Category;
use App\Validators\CategoryValidator;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function __construct(
        private CategoryManager $categoryManager,
    ) {
    }

    public function getCategories(): Collection
    {
        return $this->categoryManager->getCategories();
    }

    public function getCategoriesInOrder(string $sortBy, string $type): Collection
    {
        return $this->categoryManager->getCategoriesInOrder($sortBy, $type);
    }

    public function createCategory(string $name, int $parent): Category
    {
        return $this->categoryManager->createCategory(['name' => $name, 'parent_category' => $parent ? $parent : null]);
    }

    public function deleteCategory(int $categoryId): bool
    {
        return $this->categoryManager->deleteCategory($categoryId);
    }
}
