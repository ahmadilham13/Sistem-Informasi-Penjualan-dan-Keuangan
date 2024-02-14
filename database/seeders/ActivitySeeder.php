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
        // jam random
        $jam_acak = Carbon::createFromTime(rand(0, 23), rand(0, 59), rand(0, 59));

        // activities untuk modal
        DB::table('activities')->insert([
            'type' => ActivityTypes::MODAL,
            'user_id'   => 2,
            'modal_id'  => 1,
            'created_at' => Carbon::create(2006, 12, 10)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);

        DB::table('activities')->insert([
            'type' => ActivityTypes::MODAL,
            'user_id'   => 2,
            'modal_id'  => 2,
            'created_at' => Carbon::create(2007, 1, 2)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);

        DB::table('activities')->insert([
            'type' => ActivityTypes::MODAL,
            'user_id'   => 2,
            'modal_id'  => 3,
            'created_at' => Carbon::create(2007, 1, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);

        DB::table('activities')->insert([
            'type' => ActivityTypes::MODAL,
            'user_id'   => 2,
            'modal_id'  => 4,
            'created_at' => Carbon::create(2007, 1, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);

        DB::table('activities')->insert([
            'type' => ActivityTypes::MODAL,
            'user_id'   => 2,
            'modal_id'  => 5,
            'created_at' => Carbon::create(2007, 1, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);

        DB::table('activities')->insert([
            'type' => ActivityTypes::MODAL,
            'user_id'   => 2,
            'modal_id'  => 6,
            'created_at' => Carbon::create(2006, 12, 30)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);

        DB::table('activities')->insert([
            'type' => ActivityTypes::MODAL,
            'user_id'   => 2,
            'modal_id'  => 7,
            'created_at' => Carbon::create(2006, 12, 30)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);

        DB::table('activities')->insert([
            'type' => ActivityTypes::MODAL,
            'user_id'   => 2,
            'modal_id'  => 8,
            'created_at' => Carbon::create(2007, 1, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);


        // for product bibit
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
