<?php
namespace App\Repositories\Eloquent;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{

    public function __construct(private Product $product)
    {}

    public function all(): Collection
    {
        // TODO
    }

    public function findById(int $id): ?Product
    {
       // TODO
    }

    public function create(array $data): Product
    {
       // TODO
    }

    
    public function update(Product $product, array $data): Product
    {
       // TODO
    }

    public function delete(Product $product): bool
    {
        // TODO
    }

    public function search(string $query): Collection
    {
       // TODO    
    }


    
}