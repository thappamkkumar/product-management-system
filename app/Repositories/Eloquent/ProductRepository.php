<?php
namespace App\Repositories\Eloquent;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{

    public function __construct(private Product $product)
    {}

    public function all(): LengthAwarePaginator
    {
         return $this->product->latest()->paginate(10);
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

    public function search(string $query): LengthAwarePaginator
    {
         return  $this->product->where('title', 'like', "%{$query}%")
                                  ->orWhere('description', 'like', "%{$query}%")
                                  ->latest()
                                  ->paginate(10)
                                  ->withQueryString();
        
    }


    
}