<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts(): Collection | Product
    {
        return Product::with('categories')->orderBy('updated_at', 'desc')->all();
    }

    public function createProduct(array $productDetails): Product
    {
        return Product::query()->create($productDetails);
    }

    public function deleteProduct(int $productId): bool
    {
        return Product::query()->findOrFail($productId)->delete();
    }

    public function getProductsInOrder(string $sortBy, string $type): Collection
    {
        return Product::query()->orderBy($sortBy, $type)->get();
    }
}