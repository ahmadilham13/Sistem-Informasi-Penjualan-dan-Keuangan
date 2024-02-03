<?php 

namespace App\Repositories;

use App\Http\Requests\KasirRequest;
use App\Http\Resources\KasirResource;
use App\Interfaces\KasirInterface;
use App\Models\Kasir;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KasirRepository implements KasirInterface
{
    public function GetAllKasirData(): AnonymousResourceCollection
    {
        $collection = Kasir::query()
            ->where('user_id', '=', Auth::user()->id)
            ->with('productBibit')
            ->get();
        
        return KasirResource::collection($collection);
    }

    public function AddProductToKasir(KasirRequest $request) : KasirResource
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;

        $kasir = DB::transaction(function () use($data, $request) {
            // check the producs has been added or not
            if($oldKasir = $this->getProduct($request->product_bibits_id)) {
                // update
                $oldKasir['quantity'] += $request->quantity;
                $oldKasir->update();
            } else {
                // create
                $kasir = Kasir::query()->create($data);
                return $kasir;
            }

        });

        return new KasirResource($kasir);
    }

    public function DeleteProduct(Kasir $kasir)
    {
        return $kasir->delete();
    }

    // private method
    private function getProduct(int $product_id)
    {
        return Kasir::query()
            ->where('product_bibits_id', '=', $product_id)
            ->where('user_id', '=', Auth::user()->id)
            ->first();
    }
}

?>