<?php 

namespace App\Repositories;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Interfaces\ProductInterface;
use App\Models\ProductBibit;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductInterface
{
    public function GetPaginatedProduct(string $search, string $sortBy, string $sortDirection, int $perPage = 10, int $currentPage = 1): LengthAwarePaginator
    {
        return ProductBibit::query()
            ->when(!empty($search), fn(Builder $query) => $query->where(DB::raw('lower(product_name)'), 'like', '%' . strtolower($search) . '%')->orWhere(DB::raw('lower(product_id)'), 'like', '%' . strtolower($search) . '%'))
            ->when(! empty($sortBy) && ! empty($sortDirection), fn (Builder $query) => $query->orderBy($sortBy, $sortDirection))
            ->when(empty($sortBy) && empty($sortDirection), fn (Builder $query) => $query->oldest())
            ->paginate(perPage: $perPage, page: $currentPage);
    }

    public function CreateProduct(ProductRequest $request): ProductResource
    {
        $data = $request->validated();

        $product = DB::transaction(function () use($data, $request) {
            $product = ProductBibit::query()->create($data);
            if($request->hasFile('product_image')) {
                $product->addMediaFromRequest('product_image')
                    ->toMediaCollection();
            }
            return $product;
        });

        return new ProductResource($product);
    }

    public function UpdateUser(int $productId, ProductRequest $request): ProductResource
    {
        $product = ProductBibit::query()
            ->where('id', '=', $productId)
            ->first();

        $data = $request->validated();
        $product = DB::transaction(function () use ($product, $data, $request) {
            $product->update($data);
            if($request->hasFile('product_image')) {
                $product->media()->delete();
                $product->addMediaFromRequest('product_image')
                    ->toMediaCollection();
            }
            return $product;
        });

        return new ProductResource($product);
    }

    public function DeleteProduct(ProductBibit $product)
    {
        return $product->delete();
    }
}

?>