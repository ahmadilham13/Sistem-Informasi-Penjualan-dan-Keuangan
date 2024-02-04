<?php 

namespace App\Interfaces;

use App\Http\Requests\KasirRequest;
use App\Http\Resources\KasirResource;
use App\Models\Kasir;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface KasirInterface
{
    public function GetAllKasirData(): AnonymousResourceCollection;   
    public function AddProductToKasir(KasirRequest $request) : KasirResource;
    public function DeleteProduct(Kasir $kasir);
    public function DeleteAllProduct();
}

?>