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

    public function UpdateSaldo(SaldoRequest $request, bool $add=true): SaldoResource
    {
        $data = $request->validated();

        $saldo = Saldo::query()->first();
        
        if($saldo) {
            // tidak kosong
            $saldo_new = DB::transaction(function () use ($saldo, $data, $add) {
                if($add) {
                    $data['saldo'] += $saldo['saldo'];
                } else {
                    $data['saldo'] -= $saldo['saldo'];
                    // if minus
                    if(is_numeric($data['saldo']) && is_int($data['saldo'] + 0) && $data['saldo'] < 0) {
                        return redirect()->back()->with('status', 'saldo-minus');
                    }
                }
                $saldo->update($data);

                return $saldo;
            });
        } else {
            if($add) {
                $saldo_new = DB::transaction(function () use($data, $request) {
                    $saldo = Saldo::query()->create($data);
    
                    return $saldo;
                });
            } else {
                return redirect()->back()->with('status', 'saldo-minus');
            }
        }

        return new SaldoResource($saldo_new);
    }

    public function KurangSaldo(int $uang)
    {
        $saldo = Saldo::query()->first();

        if($saldo) {
            // tidak kosong
            $saldo_new = DB::transaction(function () use ($saldo, $uang) {
                    $saldo->saldo -= $uang;
                    $saldo->update();

                    return $saldo;
            });
        } else {
            $saldo_new = DB::transaction(function () use($uang) {
                $saldo = Saldo::query()->create([
                    'saldo' => -$uang
                ]);

                return $saldo;
            });
        }

        return new SaldoResource($saldo_new);
    }
}

?>