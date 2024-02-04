<?php

namespace Database\Seeders;

use App\Enums\ActivityTypes;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 28; $i++) { 
            DB::table('activities')->insert([
                'type' => ActivityTypes::PRODUCT,
                'user_id'   => 1,
                'product_bibits_id'  => $i,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
