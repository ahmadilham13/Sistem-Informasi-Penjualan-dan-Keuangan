<?php

namespace App\Http\Controllers\Gaji;

use App\Enums\NamaProses;
use App\Enums\TypeProses;
use App\Http\Controllers\Controller;
use App\Http\Requests\GajiRequest;
use App\Interfaces\GajiInterface;
use App\Interfaces\ProsesUangInterface;
use App\Interfaces\SaldoInterface;
use App\Interfaces\UserInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GajiController extends BaseController
{
    public function __construct(GajiInterface $gaji, UserInterface $user, ProsesUangInterface $uang, SaldoInterface $saldo)
    {
        parent::__construct($gaji, $user, $uang, $saldo);

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

        $data = $this->gaji->GetPaginatedGaji(
            search: $this->search, 
            perPage: $this->pageSize, 
            currentPage: $this->page,
            sortBy: $this->sortBy,
            sortDirection: $this->sortDirection
        );
        
        return  view('gaji.index', [
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
        $users = $this->user->GetAllUser();

        $userSelect = array();
        
        foreach($users as $key => $value) {
            $userSelect[$value->id] = $value->name;
        }

        return view('gaji.manage', [
            'users' => $userSelect,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GajiRequest $request) : RedirectResponse
    {
        $this->gaji->CreateGaji($request);
        $this->saldo->KurangSaldo($request->nominal);
        $this->uang->CreateUangLog(namaProses: NamaProses::GAJI, typeProses: TypeProses::KELUAR, nominal: $request->nominal);

        return redirect()->route('gaji.index')->with('status', 'gaji-sended');
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
