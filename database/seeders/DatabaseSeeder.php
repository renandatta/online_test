<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::insert(array(
            ['barcode' => '1111', 'product_name' => 'APPLE', 'price' => 10, 'status' => 'READY'],
            ['barcode' => '1111', 'product_name' => 'APPLE', 'price' => 20, 'status' => 'DELIVERED'],
            ['barcode' => '1111', 'product_name' => 'APPLE', 'price' => 30, 'status' => 'SENT'],
            ['barcode' => '1111', 'product_name' => 'APPLE', 'price' => 10, 'status' => 'ONHOLD'],
            ['barcode' => '1111', 'product_name' => 'APPLE', 'price' => 20, 'status' => 'PACKING'],
            ['barcode' => '1111', 'product_name' => 'APPLE', 'price' => 40, 'status' => 'SENT'],
            ['barcode' => '1111', 'product_name' => 'APPLE', 'price' => 40, 'status' => 'SENT'],
            ['barcode' => '1122', 'product_name' => 'PINAPPLE', 'price' => 10, 'status' => 'READY'],
            ['barcode' => '1122', 'product_name' => 'PINAPPLE', 'price' => 10, 'status' => 'DELIVERED'],
            ['barcode' => '1122', 'product_name' => 'PINAPPLE', 'price' => 10, 'status' => 'PACKING'],
            ['barcode' => '1122', 'product_name' => 'PINAPPLE', 'price' => 10, 'status' => 'DELIVERED'],
        ));
    }
}
