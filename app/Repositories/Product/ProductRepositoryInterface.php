<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface
{
    public function getAllProducts(): Collection | Product;

    public function createProduct(array $productDetails): Product;

    public function deleteProduct(int $productId): bool;

    public function getProductsInOrder(string $sortBy, string $type): Collection;

}
