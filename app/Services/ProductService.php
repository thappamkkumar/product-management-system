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
         return $this->productRepository->all();
    }

    public function getProductById(int $id): ?Product
    {
       return $this->productRepository->findById($id);
    }

    public function createProduct(array $data): Product
    {
       return $this->productRepository->create($data);
    }

    
    public function updateProduct(Product $product, array $data): Product
    {
         return $this->productRepository->update($product, $data);
    }

    public function deleteProduct(Product $product): bool
    {
        return $this->productRepository->delete($product);
    }

    public function searchProducts(string $query): Collection
    {
       return $this->productRepository->search($query);
    }

}