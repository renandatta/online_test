<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::select(
            'barcode',
            DB::raw('count(*) as jumlah'),
            DB::raw('sum(price) as total_harga'),
        )->groupBy('barcode')->get();
        foreach ($products as $product) {
            $product->ready_count = Product::where('barcode', $product->barcode)->status('READY')->count();
            $product->onhold_count = Product::where('barcode', $product->barcode)->status('ONHOLD')->count();
            $product->delivered_count = Product::where('barcode', $product->barcode)->status('DELIVERED')->count();
            $product->packing_count = Product::where('barcode', $product->barcode)->status('PACKING')->count();
            $product->sent_count = Product::where('barcode', $product->barcode)->status('SENT')->count();
        }
        return view('home', compact('products'));
    }

    public function using_array()
    {
        $data = array(
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
        );
        $list_barcode = [];
        foreach ($data as $key => $value) if (!in_array($value['barcode'], $list_barcode)) array_push($list_barcode, $value['barcode']);

        $products = [];
        foreach ($list_barcode as $barcode) {
            $product_data = array_filter($data, function ($item) use ($barcode) {
                if ($item['barcode'] == $barcode) return $item;
            });
            $total_harga = 0;
            foreach ($product_data as $item) $total_harga += $item['price'];

            array_push($products, [
                'barcode' => $barcode,
                'jumlah' => count($product_data),
                'total_harga' => $total_harga,
                'ready_count' => $this->count_status($data, $barcode, 'READY'),
                'onhold_count' => $this->count_status($data, $barcode, 'ONHOLD'),
                'delivered_count' => $this->count_status($data, $barcode, 'DELIVERED'),
                'packing_count' => $this->count_status($data, $barcode, 'PACKING'),
                'sent_count' => $this->count_status($data, $barcode, 'SENT'),
            ]);
        }

        return view('home_array', compact('products'));
    }

    public function count_status($data, $barcode, $status)
    {
        $product_data = array_filter($data, function ($item) use ($barcode, $status) {
            if ($item['barcode'] == $barcode && $item['status'] == $status) return $item;
        });
        return count($product_data);
    }


    public function test2()
    {
        $data = [1, -1, 3, -4, 5, -2, 7, 4, 2];
        $result = [];
        foreach ($data as $item) {
            if (in_array(($item * -1), $data) && $item > 0) array_push($result, $item);
        }
        sort($result);
        return view('test2', compact('result', 'data'));
    }
}
