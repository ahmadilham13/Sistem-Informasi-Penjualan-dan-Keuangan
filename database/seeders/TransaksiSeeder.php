<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // jam random
        $jam_acak = Carbon::createFromTime(rand(0, 23), rand(0, 59), rand(0, 59));

        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Ida Ayu Putri',
            'product_bibits_id' => 13,
            'quantity' => 10,
            'user_id' => 2,
            'created_at' => Carbon::create(2021, 1, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Agus Susanto',
            'product_bibits_id' => 28,
            'quantity' => 2,
            'user_id' => 2,
            'created_at' => Carbon::create(2021, 1, 2)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Ahmad Hidayat',
            'product_bibits_id' => 12,
            'quantity' => 12,
            'user_id' => 2,
            'created_at' => Carbon::create(2021, 1, 4)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Made Wijaya',
            'product_bibits_id' => 4,
            'quantity' => 12,
            'user_id' => 2,
            'created_at' => Carbon::create(2021, 1, 16)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Rini Indriani',
            'product_bibits_id' => 20,
            'quantity' => 20,
            'user_id' => 2,
            'created_at' => Carbon::create(2021, 1, 21)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Ahmad Hidayat',
            'product_bibits_id' => 11,
            'quantity' => 3,
            'user_id' => 2,
            'created_at' => Carbon::create(2021, 2, 6)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Made Wijaya',
            'product_bibits_id' => 6,
            'quantity' => 9,
            'user_id' => 2,
            'created_at' => Carbon::create(2021, 2, 19)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Rini Indriani',
            'product_bibits_id' => 8,
            'quantity' => 20,
            'user_id' => 2,
            'created_at' => Carbon::create(2021, 2, 23)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Budi Santoso',
            'product_bibits_id' => 12,
            'quantity' => 3,
            'user_id' => 2,
            'created_at' => Carbon::create(2021, 5, 2)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Ani Fatimah',
            'product_bibits_id' => 1,
            'quantity' => 4,
            'user_id' => 2,
            'created_at' => Carbon::create(2021, 5, 13)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Rini Indriani',
            'product_bibits_id' => 3,
            'quantity' => 10,
            'user_id' => 2,
            'created_at' => Carbon::create(2021, 5, 26)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Ahmad Bustami',
            'product_bibits_id' => 13,
            'quantity' => 6,
            'user_id' => 2,
            'created_at' => Carbon::create(2021, 7, 6)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Ani Fatimah',
            'product_bibits_id' => 2,
            'quantity' => 5,
            'user_id' => 2,
            'created_at' => Carbon::create(2021, 7, 14)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Agus Susanto',
            'product_bibits_id' => 8,
            'quantity' => 8,
            'user_id' => 2,
            'created_at' => Carbon::create(2021, 7, 22)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Ahmad Hidayat',
            'product_bibits_id' => 28,
            'quantity' => 6,
            'user_id' => 2,
            'created_at' => Carbon::create(2021, 11, 2)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Putra Jaya',
            'product_bibits_id' => 27,
            'quantity' => 9,
            'user_id' => 2,
            'created_at' => Carbon::create(2021, 11, 16)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Agus Susanto',
            'product_bibits_id' => 10,
            'quantity' => 8,
            'user_id' => 2,
            'created_at' => Carbon::create(2021, 11, 29)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Siti Rahayu',
            'product_bibits_id' => 12,
            'quantity' => 2,
            'user_id' => 2,
            'created_at' => Carbon::create(2022, 1, 4)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Setyagus',
            'product_bibits_id' => 21,
            'quantity' => 7,
            'user_id' => 2,
            'created_at' => Carbon::create(2022, 1, 18)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Ahmad Hidayat',
            'product_bibits_id' => 6,
            'quantity' => 8,
            'user_id' => 2,
            'created_at' => Carbon::create(2022, 1, 19)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Setyagus',
            'product_bibits_id' => 12,
            'quantity' => 4,
            'user_id' => 2,
            'created_at' => Carbon::create(2022, 3, 6)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Anto',
            'product_bibits_id' => 22,
            'quantity' => 2,
            'user_id' => 2,
            'created_at' => Carbon::create(2022, 3, 11)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Aji Bayu',
            'product_bibits_id' => 9,
            'quantity' => 2,
            'user_id' => 2,
            'created_at' => Carbon::create(2022, 3, 21)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Ahmad Hidayat',
            'product_bibits_id' => 12,
            'quantity' => 4,
            'user_id' => 2,
            'created_at' => Carbon::create(2022, 6, 4)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Made Wijaya',
            'product_bibits_id' => 12,
            'quantity' => 4,
            'user_id' => 2,
            'created_at' => Carbon::create(2022, 6, 12)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Rini Indriani',
            'product_bibits_id' => 26,
            'quantity' => 2,
            'user_id' => 2,
            'created_at' => Carbon::create(2022, 6, 23)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Agus Susanto',
            'product_bibits_id' => 15,
            'quantity' => 2,
            'user_id' => 2,
            'created_at' => Carbon::create(2022, 8, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Putra Jaya',
            'product_bibits_id' => 13,
            'quantity' => 3,
            'user_id' => 2,
            'created_at' => Carbon::create(2022, 8, 14)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Ida Ayu Putri',
            'product_bibits_id' => 24,
            'quantity' => 2,
            'user_id' => 2,
            'created_at' => Carbon::create(2022, 8, 25)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Budi Santoso',
            'product_bibits_id' => 17,
            'quantity' => 7,
            'user_id' => 2,
            'created_at' => Carbon::create(2022, 12, 1)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Putra Jaya',
            'product_bibits_id' => 18,
            'quantity' => 10,
            'user_id' => 2,
            'created_at' => Carbon::create(2022, 12, 16)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
        DB::table('transaksis')->insert([
            'kode_transaksi'    => "TRN" . uniqid(),
            'customer_name' => 'Ahmad Hidayat',
            'product_bibits_id' => 25,
            'quantity' => 7,
            'user_id' => 2,
            'created_at' => Carbon::create(2022, 12, 27)->copy()->setTime($jam_acak->hour, $jam_acak->minute, $jam_acak->second),
        ]);
    }
}
