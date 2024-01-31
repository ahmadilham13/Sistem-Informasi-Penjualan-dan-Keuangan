<?php 

namespace App\Interfaces;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\ProductBibit;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductInterface
{
    public function GetPaginatedProduct(string $search, string $sortBy, string $sortDirection, int $perPage = 10, int $currentPage = 1) : LengthAwarePaginator;
    public function CreateProduct(ProductRequest $request) : ProductResource;
    public function UpdateUser(int $productId, ProductRequest $request) : ProductResource;
    public function DeleteProduct(ProductBibit $product);
}

?>