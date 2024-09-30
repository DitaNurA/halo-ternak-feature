<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HewanTernakModel;
use App\Models\TransaksiPeternakModel;
use CodeIgniter\HTTP\ResponseInterface;

class RiwayatPesanan extends BaseController
{
    public function index()
    {
        //
    }

    public function detail() {
        $data = [
            'title' => 'Detail Pesanan'
        ];

        return view('peternak/order/detail', $data);
    }

    public function track() {
        $data = [
            'title' => 'Track Pesanan',
            'hideNavbar' => true
        ];

        return view('peternak/order/track', $data);
    }

    public function ternak_sakit($id = null) {
        $hewanTernak = new HewanTernakModel();
        $find = $hewanTernak->getHewanTernak($id);

        if ( $find['id_hewan'] ) {
            $transaksiPeternak = new TransaksiPeternakModel();

            $data = [
                'title' => 'Detail Ternak Sakit',
                'id_layanan' => 1,
                'data' => $find,
                'transaksi_peternak' => $transaksiPeternak->getTransaksi()->paginate(10)
            ];

            return view('peternak/hewan/detail-ternak-sakit', $data);
        } else {
            return redirect()->to(role_url());
        }
    }

    public function ternak_kawin($id = null) {
        $hewanTernak = new HewanTernakModel();
        $transaksiPeternak = new TransaksiPeternakModel();
        $find = $hewanTernak->getHewanTernak($id);

        if ( $find['id_hewan'] ) {
            $data = [
                'title' => 'Detail Ternak Kawin',
                'id_layanan' => 2,
                'data' => $find,
                'transaksi_peternak' => $transaksiPeternak->getTransaksi()->paginate(10)
            ];

            return view('peternak/hewan/detail-ternak-kawin', $data);
        } else {
            return redirect()->to(role_url());
        }
    }

    public function periksa_bunting($id = null) {
        $hewanTernak = new HewanTernakModel();
        $transaksiPeternak = new TransaksiPeternakModel();
        $find = $hewanTernak->getHewanTernak($id);

        if ( $find['id_hewan'] ) {
            $data = [
                'title' => 'Detail Periksa Bunting',
                'id_layanan' => 3,
                'data' => $find,
                'transaksi_peternak' => $transaksiPeternak->getTransaksi()->paginate(10)
            ];

            return view('peternak/hewan/detail-periksa-bunting', $data);
        } else {
            return redirect()->to(role_url());
        }
    }

    public function success()
    {
        $data = [
            'title' => 'Success',
            'hideNavbar' => true,
            'hideFooter' => true
        ];

        return view('peternak/order/success', $data);
    }
}
