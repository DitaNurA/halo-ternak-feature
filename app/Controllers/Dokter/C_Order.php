<?php

namespace App\Controllers\Dokter;

use App\Controllers\BaseController;

class C_Order extends BaseController
{
    public function index1()
    {
        return view('dokter/order/index_o1', [
            'h_order1' => view('dokter/order/h_order1'),
        ]);
    }

    public function index2()
    {
        return view('dokter/order/index_o2', [
            'h_order2' => view('dokter/order/h_order2'),
        ]);
    }
    public function index3()
    {
        return view('dokter/order/index_o3', [
            'h_order3' => view('dokter/order/h_order3'),
        ]);
    }

    public function c_done()
    {
        return view('dokter/order/c_done'); // Menampilkan view selesai
    }
}
