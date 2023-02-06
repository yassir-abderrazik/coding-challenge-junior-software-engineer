<?php

namespace App\Console\Commands;

use App\Services\ProductService;
use Exception;
use Illuminate\Console\Command;

class CreateProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:product {name} {description} {price} {--categories= : (optional)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create product';

    public function __construct(
        private ProductService $productService
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $file = new \Illuminate\Http\UploadedFile(
            storage_path('app/public/avatar.jpg'),
            'avatar.jpg',
            'image/jpeg',
            null,
            true
        );
        try {
            $categories = $this->option('categories') ? explode(',', $this->option('categories')) : [];
            $this->productService->createProduct(
                $this->argument('name'),
                $this->argument('description'),
                (float) $this->argument('price'),
                $file,
                $categories
            );
            $this->info('Product created');

            return 0;
        } catch (Exception $e) {
            $this->error($e->getMessage());

            return 1;
        }
    }
}
