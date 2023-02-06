<?php

namespace App\Services;

use App\Manager\CategoryProductManager;
use App\Manager\ProductManager;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\File\File;

class ProductService
{
    public function __construct(
        private ProductManager $productManager,
        private CategoryProductManager $categoryProductManager,
        private ImageService $imageService
    ) {
    }

    public function createProduct(string $name, string $description, float $price, File $image, array $categories = []): Product
    {
        $path = $this->imageService->saveImage($image);
        $product = $this->productManager->createProduct(['name' => $name, 'description' => $description, 'price' => $price, 'image' => $path]);
        if ($categories) {
            $this->categoryProductManager->addProductCategories($product->id, $categories);
        }

        return $product;
    }

    public function deleteProduct(int $id): bool
    {
        return $this->productManager->deleteProduct($id);
    }

    public function getProductsInOrder(string $sortBy, string $type): Collection
    {
        return $this->productManager->getProductsInOrder($sortBy, $type);
    }
}