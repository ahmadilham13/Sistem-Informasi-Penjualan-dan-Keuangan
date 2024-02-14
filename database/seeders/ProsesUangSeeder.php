<?php

namespace Database\Seeders;

use App\Enums\NamaProses;
use App\Enums\TypeProses;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProsesUangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // jam random
        $jam_acak = Carbon::createFromTime(rand(0, 23), rand(0, 59), rand(0, 59));

        // proses uang untuk modal
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::BELI,
            'type_proses'    => TypeProses::KELUAR,
            'user_id'      => 2,
            'nominal' => 50000000,
            'created_at' => Carbon::create(2006, 12, 10)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::BELI,
            'type_proses'    => TypeProses::KELUAR,
            'user_id'      => 2,
            'nominal' => 40000000,
            'created_at' => Carbon::create(2007, 1, 2)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::BELI,
            'type_proses'    => TypeProses::KELUAR,
            'user_id'      => 2,
            'nominal' => 2000000,
            'created_at' => Carbon::create(2007, 1, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::BELI,
            'type_proses'    => TypeProses::KELUAR,
            'user_id'      => 2,
            'nominal' => 1500000,
            'created_at' => Carbon::create(2007, 1, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::BELI,
            'type_proses'    => TypeProses::KELUAR,
            'user_id'      => 2,
            'nominal' => 4000000,
            'created_at' => Carbon::create(2007, 1, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::BELI,
            'type_proses'    => TypeProses::KELUAR,
            'user_id'      => 2,
            'nominal' => 2500000,
            'created_at' => Carbon::create(2006, 12, 30)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::BELI,
            'type_proses'    => TypeProses::KELUAR,
            'user_id'      => 2,
            'nominal' => 500000,
            'created_at' => Carbon::create(2006, 12, 30)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::BELI,
            'type_proses'    => TypeProses::KELUAR,
            'user_id'      => 2,
            'nominal' => 1000000,
            'created_at' => Carbon::create(2007, 1, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);

        // proses uang gaji
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::GAJI,
            'type_proses'    => TypeProses::KELUAR,
            'user_id'      => 1,
            'nominal' => 3000000,
            'created_at' => Carbon::create(2007, 2, 5)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::GAJI,
            'type_proses'    => TypeProses::KELUAR,
            'user_id'      => 1,
            'nominal' => 3000000,
            'created_at' => Carbon::create(2007, 3, 5)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::GAJI,
            'type_proses'    => TypeProses::KELUAR,
            'user_id'      => 1,
            'nominal' => 3000000,
            'created_at' => Carbon::create(2007, 4, 5)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);

        // proses transaksi
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 750000,
            'created_at' => Carbon::create(2021, 1, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 350000,
            'created_at' => Carbon::create(2021, 1, 2)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 900000,
            'created_at' => Carbon::create(2021, 1, 4)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 840000,
            'created_at' => Carbon::create(2021, 1, 16)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 3000000,
            'created_at' => Carbon::create(2021, 1, 21)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 210000,
            'created_at' => Carbon::create(2021, 2, 6)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 630000,
            'created_at' => Carbon::create(2021, 2, 19)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 3000000,
            'created_at' => Carbon::create(2021, 2, 23)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 36000,
            'created_at' => Carbon::create(2021, 5, 2)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 280000,
            'created_at' => Carbon::create(2021, 5, 13)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 700000,
            'created_at' => Carbon::create(2021, 5, 26)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 450000,
            'created_at' => Carbon::create(2021, 7, 6)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 350000,
            'created_at' => Carbon::create(2021, 7, 14)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 1200000,
            'created_at' => Carbon::create(2021, 7, 22)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 1050000,
            'created_at' => Carbon::create(2021, 11, 2)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 1575000,
            'created_at' => Carbon::create(2021, 11, 16)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 560000,
            'created_at' => Carbon::create(2021, 11, 29)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 150000,
            'created_at' => Carbon::create(2022, 1, 4)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 1050000,
            'created_at' => Carbon::create(2022, 1, 18)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 560000,
            'created_at' => Carbon::create(2022, 1, 19)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 300000,
            'created_at' => Carbon::create(2022, 3, 6)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 250000,
            'created_at' => Carbon::create(2022, 3, 11)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 200000,
            'created_at' => Carbon::create(2022, 3, 21)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 300000,
            'created_at' => Carbon::create(2022, 6, 4)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 300000,
            'created_at' => Carbon::create(2022, 6, 12)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 300000,
            'created_at' => Carbon::create(2022, 6, 23)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 200000,
            'created_at' => Carbon::create(2022, 8, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 225000,
            'created_at' => Carbon::create(2022, 8, 14)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 300000,
            'created_at' => Carbon::create(2022, 8, 25)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 525000,
            'created_at' => Carbon::create(2022, 12, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 500000,
            'created_at' => Carbon::create(2022, 12, 16)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('proses_uangs')->insert([
            'nama_proses'    => NamaProses::TRANSAKSI,
            'type_proses'    => TypeProses::MASUK,
            'user_id'      => 2,
            'nominal' => 875000,
            'created_at' => Carbon::create(2022, 12, 27)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
    }
}
