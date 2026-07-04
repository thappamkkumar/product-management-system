<?php
namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    
    public function __construct(private ProductRepositoryInterface $productRepository)
    {}

    public function getAllProducts(): Collection
    {
        // TODO
    }

    public function getProductById(int $id): ?Product
    {
       // TODO
    }

    public function createProduct(array $data): Product
    {
       // TODO
    }

    
    public function updateProduct(Product $product, array $data): Product
    {
       // TODO
    }

    public function deleteProduct(Product $product): bool
    {
        // TODO
    }

    public function searchProducts(string $query): Collection
    {
       // TODO    
    }

}