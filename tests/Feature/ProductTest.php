<?php

namespace Tests\Feature;

use App\Services\ProductService;
use Tests\TestHelpers;

class ProductTest extends TestHelpers
{
    private ProductService $productService;
    
    public function test_create_product()
    {
        $file = new \Illuminate\Http\UploadedFile(
            storage_path('app/public/avatar.jpg'),
            'avatar.jpg',
            'image/jpeg',
            null,
            true
        );
        $category = $this->create_category('Category 1');
        $product = $this->create_product(
            'Product 1',
            'Product 1 description',
            100,
            $file,
            [$category->id]
        );
        $this->assertDatabaseCount('products', 1);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->productService = $this->app->make('App\Services\ProductService');
    }
}
