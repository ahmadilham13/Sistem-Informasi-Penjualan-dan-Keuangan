<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Http\Requests\KasirRequest;
use App\Models\Kasir;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KasirController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KasirRequest $request) : RedirectResponse
    {
        $this->kasir->AddProductToKasir($request);

        return redirect()->route('transaksi.create')->with('status', 'kasir-added');
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
    public function destroy(Kasir $kasir) : RedirectResponse
    {
        $this->kasir->DeleteProduct($kasir);
        return redirect()->route('transaksi.create')->with('status', 'kasir-deleted');
    }
}
