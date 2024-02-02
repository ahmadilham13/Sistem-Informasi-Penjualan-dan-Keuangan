<?php 

namespace App\Interfaces;

use App\Http\Requests\SaldoRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\SaldoResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface SaldoInterface
{
    public function GetSaldo() : SaldoResource;
    public function UpdateSaldo(SaldoRequest $request, bool $add=true) : SaldoResource;
    public function KurangSaldo(int $uang);
}

?>