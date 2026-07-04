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
         return $this->product->all();
    }

    public function findById(int $id): ?Product
    {
         return $this->product->find($id);
    }

    public function create(array $data): Product
    {
         return $this->product->create($data);   
    }

    
    public function update(Product $product, array $data): Product
    {
         $product->update($data);
         return $product;   
    }

    public function delete(Product $product): bool
    {
        return $product->delete();
    }

    public function search(string $query): Collection
    {
         return  $this->product->where('title', 'like', "%{$query}%")
                                  ->orWhere('description', 'like', "%{$query}%")
                                  ->get();
        
    }


    
}