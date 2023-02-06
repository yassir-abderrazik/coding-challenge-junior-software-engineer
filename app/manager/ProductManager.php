<?php

namespace App\Manager;

use App\Models\Product;
use App\Repositories\Product\ProductRepository;
use Illuminate\Database\Eloquent\Collection;

class ProductManager
{
    public function __construct(
        private ProductRepository $productRepository
    ) {
    }

    public function createProduct(array $productDetails): Product
    {
        return $this->productRepository->createProduct($productDetails);
    }

    public function deleteProduct(int $productId): bool{
        return $this->productRepository->deleteProduct($productId);
    }

    public function getProductsInOrder(string $sortBy, string $type): Collection{
        return $this->productRepository->getProductsInOrder($sortBy, $type);
    }
}
