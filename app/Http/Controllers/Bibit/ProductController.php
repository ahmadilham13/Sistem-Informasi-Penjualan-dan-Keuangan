<?php

namespace App\Http\Controllers\Bibit;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Interfaces\ProductInterface;
use App\Models\ProductBibit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends BaseController
{
    public function __construct(ProductInterface $product)
    {
        parent::__construct($product);

        $this->setSortChoices([
            'created_at-asc' => 'Oldest',
            'created_at-desc' => 'Newest',
            'name-desc' => 'Z-A',
            'name-asc' => 'A-Z',
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : View
    {
        $this->setSearch($request);
        $this->setPagination($request);
        $this->setSort($request);

        $data = $this->product->GetPaginatedProduct(
            search: $this->search, 
            perPage: $this->pageSize, 
            currentPage: $this->page,
            sortBy: $this->sortBy,
            sortDirection: $this->sortDirection
        );

        return view('product.index', [
            'data'  => $data,
            'search'    => $this->search,
            'sortChoices' => $this->sortChoices,
            'sortBy' => $this->sortBy . '-' . $this->sortDirection
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('product.manage');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request) : RedirectResponse
    {
        $this->product->CreateProduct($request);

        return redirect()->route('product.index')->with('status', 'product-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductBibit $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductBibit $product) : View
    {
        return view('product.manage', [
            'data'  => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, ProductBibit $product) : RedirectResponse
    {
        $this->product->UpdateUser($product->id, $request);

        return redirect()->route('product.index')->with('status', 'product-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductBibit $product) : RedirectResponse
    {
        $this->product->DeleteProduct($product);

        return redirect()->route('product.index')->with('status', 'product-deleted');
    }
}
