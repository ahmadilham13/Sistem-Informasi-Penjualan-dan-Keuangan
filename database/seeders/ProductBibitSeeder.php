<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductBibitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00001',
            'product_name' => 'Jambu Biji Merah',
            'description' => "",
            'harga_jual'  => 70000,
            'stock' => 30,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00002',
            'product_name' => 'Jambu Krista;',
            'description' => "",
            'harga_jual'  => 70000,
            'stock' => 30,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00003',
            'product_name' => 'Jambu Bankok',
            'description' => "",
            'harga_jual'  => 70000,
            'stock' => 30,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00004',
            'product_name' => 'Jambu Madu',
            'description' => "",
            'harga_jual'  => 70000,
            'stock' => 30,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00005',
            'product_name' => 'Jambu Blacking',
            'description' => "",
            'harga_jual'  => 70000,
            'stock' => 30,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00006',
            'product_name' => 'Jambu Jamaika',
            'description' => "",
            'harga_jual'  => 70000,
            'stock' => 30,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00007',
            'product_name' => 'Jambu Jambak',
            'description' => "",
            'harga_jual'  => 70000,
            'stock' => 30,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00008',
            'product_name' => 'Lengkeng Merah',
            'description' => "",
            'harga_jual'  => 150000,
            'stock' => 50,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00009',
            'product_name' => 'Sao',
            'description' => "",
            'harga_jual'  => 100000,
            'stock' => 20,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00010',
            'product_name' => 'Belimbing',
            'description' => "",
            'harga_jual'  => 70000,
            'stock' => 20,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00011',
            'product_name' => 'Kedondong',
            'description' => "",
            'harga_jual'  => 70000,
            'stock' => 20,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00012',
            'product_name' => 'Lengkeng Pinang',
            'description' => "",
            'harga_jual'  => 75000,
            'stock' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00013',
            'product_name' => 'Manggis',
            'description' => "",
            'harga_jual'  => 75000,
            'stock' => 30,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00014',
            'product_name' => 'Rambutan Binjai',
            'description' => "",
            'harga_jual'  => 75000,
            'stock' => 30,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00015',
            'product_name' => 'Rambutan Rapiah',
            'description' => "",
            'harga_jual'  => 100000,
            'stock' => 30,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00016',
            'product_name' => 'Alpukat Metesa',
            'description' => "",
            'harga_jual'  => 100000,
            'stock' => 20,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00017',
            'product_name' => 'Nangka',
            'description' => "",
            'harga_jual'  => 75000,
            'stock' => 20,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00018',
            'product_name' => 'Sirsak',
            'description' => "",
            'harga_jual'  => 50000,
            'stock' => 20,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00019',
            'product_name' => 'Durian Musangkin',
            'description' => "",
            'harga_jual'  => 150000,
            'stock' => 50,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00020',
            'product_name' => 'Durian Tembago',
            'description' => "",
            'harga_jual'  => 150000,
            'stock' => 50,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00021',
            'product_name' => 'Durian Montong',
            'description' => "",
            'harga_jual'  => 150000,
            'stock' => 50,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00022',
            'product_name' => 'Jeruk Bali',
            'description' => "",
            'harga_jual'  => 125000,
            'stock' => 30,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00023',
            'product_name' => 'Jeruk Kesturi',
            'description' => "",
            'harga_jual'  => 75000,
            'stock' => 20,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00024',
            'product_name' => 'Jeruk Lemon',
            'description' => "",
            'harga_jual'  => 150000,
            'stock' => 20,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00025',
            'product_name' => 'Jeruk Madu',
            'description' => "",
            'harga_jual'  => 125000,
            'stock' => 20,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00026',
            'product_name' => 'Mangga Horomanis',
            'description' => "",
            'harga_jual'  => 150000,
            'stock' => 50,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00027',
            'product_name' => 'Mangga Madu',
            'description' => "",
            'harga_jual'  => 175000,
            'stock' => 50,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('product_bibits')->insert([
            'product_id'    => 'KD00028',
            'product_name' => 'Mengga Redbrazil',
            'description' => "",
            'harga_jual'  => 175000,
            'stock' => 50,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
