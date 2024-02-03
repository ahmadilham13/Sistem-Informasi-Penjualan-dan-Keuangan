<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransaksiRequest;
use App\Interfaces\KasirInterface;
use App\Interfaces\ProductInterface;
use App\Interfaces\TransaksiInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransaksiController extends BaseController
{
    public function __construct(TransaksiInterface $transaksi, ProductInterface $product, KasirInterface $kasir)
    {
        parent::__construct($transaksi, $product, $kasir);

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

        $data = $this->transaksi->GetPaginatedTransaksi(
            search: $this->search, 
            perPage: $this->pageSize, 
            currentPage: $this->page,
            sortBy: $this->sortBy,
            sortDirection: $this->sortDirection
        );

        return view('transaksi.index', [
            'data'  => $data,
            'search'    => $this->search,
            'sortChoices' => $this->sortChoices,
            'sortBy' => $this->sortBy . '-' . $this->sortDirection
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) : View
    {
        $this->setSearch($request);
        $this->setPagination($request);
        $this->setSort($request);

        $products = $this->product->GetAllProduct(search: $this->search);
        $kasirs = $this->kasir->GetAllKasirData();
        
        return view('transaksi.manage', [
            'products'  => $products,
            'kasirs'    => $kasirs,
            'search'    => $this->search
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransaksiRequest $request) 
    {
        // return redirect()->route('transaksi.create')->with('status', 'saldo-added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
