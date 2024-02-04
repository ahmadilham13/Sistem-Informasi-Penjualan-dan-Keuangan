<?php 

namespace App\Repositories;

use App\Interfaces\ActivityInterface;
use App\Models\Activity;
use Illuminate\Pagination\LengthAwarePaginator;

class ActivityRepository implements ActivityInterface
{
    public function GetAllActivity(): LengthAwarePaginator
    {
        return Activity::query()
            ->withTrashed()
            ->with(['user', 'petugas', 'product_bibit', 'modal', 'transaksi'])
            ->orderBy('activities.id', 'desc')
            ->paginate(perPage: 10);
    }
}

?>