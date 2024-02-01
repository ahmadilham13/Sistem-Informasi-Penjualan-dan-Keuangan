<?php 

namespace App\Repositories;

use App\Http\Requests\SaldoRequest;
use App\Http\Resources\SaldoResource;
use App\Interfaces\SaldoInterface;
use App\Models\Saldo;
use Illuminate\Support\Facades\DB;

class SaldoRepository implements SaldoInterface
{
    public function GetSaldo(): SaldoResource
    {
        $data = Saldo::query()->first();

        return new SaldoResource($data);
    }

    public function UpdateSaldo(SaldoRequest $request): SaldoResource
    {
        $data = $request->validated();

        $saldo = Saldo::query()->first();
        
        if($saldo) {
            // tidak kosong
            $saldo_new = DB::transaction(function () use ($saldo, $data, $request) {
                $data['saldo'] += $saldo['saldo'];
                $saldo->update($data);

                return $saldo;
            });
        } else {
            $saldo_new = DB::transaction(function () use($data, $request) {
                $saldo = Saldo::query()->create($data);

                return $saldo;
            });
        }

        return new SaldoResource($saldo_new);
    }
}

?>