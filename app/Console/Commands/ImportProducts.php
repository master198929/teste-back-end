<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportProducts extends Command
{
    protected $signature = 'products:import';
    protected $description = 'Import products from an external API';

    public function handle()
    {
        $id = $this->option('id');

        if ($id) {
            $this->importSingleProduct($id);
        } else {
            $this->importAllProducts();
        }
    }

    private function importAllProducts()
    {
        $response = Http::get('https://fakestoreapi.com/products');
        
        if ($response->successful()) {
            $products = $response->json();

            foreach ($products as $productData) {
                Product::updateOrCreate(
                    ['id' => $productData['id']], // Para evitar duplicatas
                    [
                        'name' => $productData['title'],
                        'price' => $productData['price'],
                        'description' => $productData['description'],
                        'category' => $productData['category'],
                        'image_url' => $productData['image'],
                    ]
                );
            }

            $this->info('All products imported successfully!');
        } else {
            $this->error('Failed to fetch products from the API.');
        }
    }

    private function importSingleProduct($id)
    {
        $response = Http::get("https://fakestoreapi.com/products/{$id}");

        if ($response->successful()) {
            $productData = $response->json();

            Product::updateOrCreate(
                ['id' => $productData['id']], // Para evitar duplicatas
                [
                    'name' => $productData['title'],
                    'price' => $productData['price'],
                    'description' => $productData['description'],
                    'category' => $productData['category'],
                    'image_url' => $productData['image'],
                ]
            );

            $this->info("Product {$id} imported successfully!");
        } else {
            $this->error("Failed to fetch product with ID {$id} from the API.");
	}
    }
}
