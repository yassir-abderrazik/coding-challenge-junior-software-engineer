<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryInterface
{
    public function getCategories(): Collection;
    
    public function getCategoriesInOrder(string $sortBy, string $type): Collection;

    public function createCategory(array $categoryDetails): Category;

    public function deleteCategory(int $categoryId): bool;

}