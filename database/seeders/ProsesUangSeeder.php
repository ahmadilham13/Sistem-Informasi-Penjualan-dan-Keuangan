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
    }
}
