<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // jam random
        $jam_acak = Carbon::createFromTime(rand(0, 23), rand(0, 59), rand(0, 59));

        DB::table('modals')->insert([
            'name'    => 'Pembuatan Pondok Toko',
            'harga' => 50000000,
            'created_at' => Carbon::create(2006, 12, 10)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('modals')->insert([
            'name'    => 'Modal Usaha Buah-Buahan',
            'harga' => 40000000,
            'created_at' => Carbon::create(2007, 1, 2)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('modals')->insert([
            'name'    => 'Tanah Pupuk',
            'harga' => 2000000,
            'created_at' => Carbon::create(2007, 1, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('modals')->insert([
            'name'    => 'Plastik Polybag',
            'harga' => 1500000,
            'created_at' => Carbon::create(2007, 1, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('modals')->insert([
            'name'    => 'Pot Bunga',
            'harga' => 4000000,
            'created_at' => Carbon::create(2007, 1, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('modals')->insert([
            'name'    => 'Zetpam (Mesin Air)',
            'harga' => 2500000,
            'created_at' => Carbon::create(2006, 12, 30)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('modals')->insert([
            'name'    => 'Slang Air',
            'harga' => 500000,
            'created_at' => Carbon::create(2006, 12, 30)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('modals')->insert([
            'name'    => 'Pupuk Buah-buahan',
            'harga' => 1000000,
            'created_at' => Carbon::create(2007, 1, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
    }
}
