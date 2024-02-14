<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // jam random
        $jam_acak = Carbon::createFromTime(rand(0, 23), rand(0, 59), rand(0, 59));
        
        DB::table('gajis')->insert([
            'karyawan_id'    => 2,
            'nominal' => 3000000,
            'created_at' => Carbon::create(2007, 2, 5)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('gajis')->insert([
            'karyawan_id'    => 2,
            'nominal' => 3000000,
            'created_at' => Carbon::create(2007, 3, 5)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('gajis')->insert([
            'karyawan_id'    => 2,
            'nominal' => 3000000,
            'created_at' => Carbon::create(2007, 4, 5)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
    }
}
