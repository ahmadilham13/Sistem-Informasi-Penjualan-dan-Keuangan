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

        // for transaksi
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 1,
            'created_at' => Carbon::create(2021, 1, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 2,
            'created_at' => Carbon::create(2021, 1, 2)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 3,
            'created_at' => Carbon::create(2021, 1, 4)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 4,
            'created_at' => Carbon::create(2021, 1, 16)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 5,
            'created_at' => Carbon::create(2021, 1, 21)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 6,
            'created_at' => Carbon::create(2021, 2, 6)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 7,
            'created_at' => Carbon::create(2021, 2, 19)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 8,
            'created_at' => Carbon::create(2021, 2, 23)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 9,
            'created_at' => Carbon::create(2021, 5, 2)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 10,
            'created_at' => Carbon::create(2021, 5, 13)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 11,
            'created_at' => Carbon::create(2021, 5, 26)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 12,
            'created_at' => Carbon::create(2021, 7, 6)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 13,
            'created_at' => Carbon::create(2021, 7, 14)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 14,
            'created_at' => Carbon::create(2021, 7, 22)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 15,
            'created_at' => Carbon::create(2021, 11, 2)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 16,
            'created_at' => Carbon::create(2021, 11, 16)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 17,
            'created_at' => Carbon::create(2021, 11, 29)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 18,
            'created_at' => Carbon::create(2022, 1, 4)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 19,
            'created_at' => Carbon::create(2022, 1, 18)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 20,
            'created_at' => Carbon::create(2022, 1, 19)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 21,
            'created_at' => Carbon::create(2022, 3, 6)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 22,
            'created_at' => Carbon::create(2022, 3, 11)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 23,
            'created_at' => Carbon::create(2022, 3, 21)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 24,
            'created_at' => Carbon::create(2022, 6, 4)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 25,
            'created_at' => Carbon::create(2022, 6, 12)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 26,
            'created_at' => Carbon::create(2022, 6, 23)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 27,
            'created_at' => Carbon::create(2022, 8, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 28,
            'created_at' => Carbon::create(2022, 8, 14)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 29,
            'created_at' => Carbon::create(2022, 8, 25)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 30,
            'created_at' => Carbon::create(2022, 12, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 31,
            'created_at' => Carbon::create(2022, 12, 16)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('activities')->insert([
            'type' => ActivityTypes::TRANSAKSI,
            'user_id'   => 2,
            'transaksi_id'  => 32,
            'created_at' => Carbon::create(2022, 12, 27)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
    }
}
