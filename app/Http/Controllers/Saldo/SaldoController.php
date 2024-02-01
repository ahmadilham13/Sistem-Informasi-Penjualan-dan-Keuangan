<?php

namespace App\Http\Controllers\Saldo;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaldoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SaldoController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $data = $this->saldo->GetSaldo();
        $activities = $this->uang->GetProsesUang();
        return view('saldo.index', [
            'data'  => $data,
            'activities'  => $activities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('saldo.manage');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaldoRequest $request) : RedirectResponse
    {
        $this->saldo->UpdateSaldo($request);
        return redirect()->route('saldo.index')->with('status', 'saldo-added');
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
