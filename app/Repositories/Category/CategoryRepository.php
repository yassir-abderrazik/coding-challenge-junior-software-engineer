<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getCategories(): Collection
    {
        return Category::query()->with('getParentCategory')->get();
    }
    
    public function getCategoriesInOrder(string $sortBy, string $type): Collection
    {
        return Category::query()->orderBy($sortBy, $type)->get();
    }

    public function createCategory(array $categoryDetails): Category
    {
        return Category::query()->create($categoryDetails);
    }

    public function deleteCategory(int $categoryId): bool
    {
        return Category::query()->findOrFail($categoryId)->delete();
    }
}
