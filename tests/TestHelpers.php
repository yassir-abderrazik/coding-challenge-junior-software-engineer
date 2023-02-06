<?php

namespace Tests;

use App\Services\CategoryService;
use App\Services\ProductService;
use Tests\TestCase;

class TestHelpers extends TestCase
{
    private ProductService $productService;
    private CategoryService $categoryService;

    protected function create_category(string $name, int $parent_id = 0)
    {
        return $this->categoryService->createCategory($name, $parent_id);
    }

    protected function create_product(string $name, string $description, int $price, $file, array $categories)
    {
        return $this->productService->createProduct($name, $description, $price, $file, $categories);
    }
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->categoryService = $this->app->make('App\Services\CategoryService');
        $this->productService = $this->app->make('App\Services\ProductService');
    }
}
