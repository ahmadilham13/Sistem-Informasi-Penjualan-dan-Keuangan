<?php

namespace App\Http\Controllers\Modal;

use App\Enums\NamaProses;
use App\Enums\TypeProses;
use App\Http\Controllers\Controller;
use App\Http\Requests\ModalRequest;
use App\Http\Requests\SaldoRequest;
use App\Interfaces\ModalInterface;
use App\Interfaces\ProsesUangInterface;
use App\Interfaces\SaldoInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModalController extends BaseController
{
    public function __construct(ModalInterface $modal, ProsesUangInterface $uang, SaldoInterface $saldo)
    {
        parent::__construct($modal, $uang, $saldo);

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

        $data = $this->modal->GetPaginatedModal(
            search: $this->search, 
            perPage: $this->pageSize, 
            currentPage: $this->page,
            sortBy: $this->sortBy,
            sortDirection: $this->sortDirection
        );
        return view('modal.index', [
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
        return view('modal.manage');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModalRequest $request) : RedirectResponse
    {
        $this->modal->CreateModal($request);
        $this->saldo->KurangSaldo($request->harga);
        $this->uang->CreateUangLog(namaProses: NamaProses::BELI, typeProses: TypeProses::KELUAR, nominal: $request->harga);


        return redirect()->route('modal.index')->with('status', 'modal-created');
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
