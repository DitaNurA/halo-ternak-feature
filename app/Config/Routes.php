<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Auth
$routes->group('', static function($route) {
    $route->group('login', ['filter' => 'guest_filter'], static function($route) {
        $route->get('/', 'Auth\Login::index');
        $route->post('/', 'Auth\Login::store');
    });

    $route->group('register', ['filter' => 'guest_filter'], static function($route) {
        $route->get('/', 'Auth\Register::index');
        $route->post('/', 'Auth\Register::store');
    });

    $route->get('logout', function() {
        session()->destroy();
        unset($_COOKIE['id_user']);
        return redirect()->to('/login');
    });

    // Forgot Password
    $route->group('forgot-password', static function($route) {
        $route->get('/', 'Auth\ForgotPassword::index');
        $route->get('verify', 'Auth\ForgotPassword::verify');
        $route->get('new', 'Auth\ForgotPassword::new_password');
    });
});

/* User Umum */
$routes->get('obat', 'Obat::index');

$routes->get('layanan', 'Layanan::index');
$routes->get('ternak', 'HewanTernak::index');

$routes->post('kotak-saran', 'KotakSaran::store');
/* End user Umum */

// User
$routes->post('profil/edit', 'User::update');

/* Role Peternak */
$routes->group('peternak', ['filter' => 'peternak_filter'], static function($route) {
    $route->get('/', 'Peternak::index');
    $route->get('profil/edit', 'Peternak::profil_edit');

    // Kandang
    $route->group('kandang', static function($route) {
        $route->get('search', 'KandangTernak::search');
        $route->group('add', static function($route) {
            $route->get('/', 'KandangTernak::add');
            $route->post('/', 'KandangTernak::store');
        });
        $route->get('edit/(:segment)', 'KandangTernak::edit/$1');
        $route->post('edit/(:segment)', 'KandangTernak::update/$1');
        $route->get('detail/(:segment)', 'KandangTernak::detail/$1');
        $route->get('delete/(:segment)', 'KandangTernak::delete/$1');
    });

    // Hewan
    $route->group('hewan', static function($route) {
        $route->get('search', 'HewanTernak::search');

        $route->get('add/(:segment)', 'HewanTernak::add/$1');
        $route->post('add/(:segment)', 'HewanTernak::store/$1');

        $route->get('edit/(:segment)', 'HewanTernak::edit/$1');
        $route->post('edit/(:segment)', 'HewanTernak::update/$1');

        $route->get('detail/(:segment)', 'HewanTernak::detail/$1');
        $route->get('delete/(:segment)', 'HewanTernak::delete/$1');

        $route->get('jual/(:segment)', 'HewanTernak::jual/$1');
        $route->get('tidak-dijual/(:segment)', 'HewanTernak::tidak_dijual/$1');
    });

    // Maps
    $route->group('maps', static function($route) {
        $route->get('01', 'Peternak::map_01');
        $route->get('02', 'Peternak::map_02');
    });

    // Pesanan
    $route->group('order', static function($route) {
        $route->get('ternak-sakit/(:segment)', 'RiwayatPesanan::ternak_sakit/$1');
        $route->get('ternak-kawin/(:segment)', 'RiwayatPesanan::ternak_kawin/$1');
        $route->get('periksa-bunting/(:segment)', 'RiwayatPesanan::periksa_bunting/$1');

        $route->post('layanan/(:segment)', 'TransaksiPeternak::store/$1');

        $route->get('detail', 'RiwayatPesanan::detail');
        $route->get('track', 'RiwayatPesanan::track');

        $route->get('success', 'RiwayatPesanan::success');
    });
});
/* End Role Peternak */

/* Role Admin */
$routes->group('admin', ['filter' => 'admin_filter'], static function($route) {
    $route->get('/', 'Admin\Dashboard::dashboard');
});

$routes->get('admin/petugas', 'Admin\Petugas::index');
$routes->get('admin/petugas/create', 'Admin\Petugas::createForm');  // Route untuk menampilkan form create
$routes->post('admin/petugas/create', 'Admin\Petugas::store'); // Route untuk memproses form create (POST)
$routes->get('admin/petugas/detail/(:num)', 'Admin\Petugas::edit/$1');
$routes->post('admin/petugas/update/(:segment)', 'Admin\Petugas::update/$1');
$routes->post('admin/petugas/delete/(:num)', 'Admin\Petugas::delete/$1');

$routes->get('admin/peternak', 'Admin\Peternak::index');
$routes->get('admin/peternak/detail/(:num)', 'Admin\Peternak::detail/$1');
$routes->post('admin/peternak/update/(:num)', 'Admin\Peternak::update/$1');

$routes->get('admin/obat', 'Admin\Obat::index');
$routes->get('admin/obat/create', 'Admin\Obat::create');
$routes->post('admin/obat/create', 'Admin\Obat::store');
$routes->get('admin/detail_obat/(:num)', 'Admin\Obat::detail/$1');
$routes->post('admin/update_obat/(:num)', 'Admin\Obat::update/$1');

$routes->get('admin/edukasi', 'Admin\Edukasi::index');
$routes->get('admin/edukasi/create', 'Admin\Edukasi::create');
$routes->post('admin/edukasi/create', 'Admin\Edukasi::store');
$routes->get('admin/edukasi/detail/(:num)', 'Admin\Edukasi::detail/$1');
$routes->post('admin/edukasi/update/(:num)', 'Admin\Edukasi::update/$1');

$routes->get('admin/kotak-saran', 'Admin\KotakSaran::index');