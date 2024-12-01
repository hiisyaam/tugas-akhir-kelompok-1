<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('', ['filter' => 'login'], function ($routes) {
    $routes->group('', ['filter' => 'role:admin'], function ($routes) {
        $routes->get('/admin', 'User::admin');
        $routes->get('/admin/add', 'User::adminAdd');
        $routes->get( 'user/hapus/(:num)', 'User::hapus/$1');
        $routes->post('/user/acceptPesanan/(:num)', 'User::acceptPemesanan/$1');
        $routes->post('/user/rejectPesanan/(:num)', 'User::rejectPemesanan/$1');
    });
});

$routes->get('/', 'Home::index');
$routes->get('/artikel', 'Home::artikel');
$routes->get('/faq', 'Home::faq');
$routes->get('/cari', 'Home::cari');

$routes->get('/profile', 'User::profile',['filer' => 'login']);
$routes->post('/profile/update', 'User::update',['filer' => 'login']);
$routes->post('/profile/saveKomentar', 'User::saveKomentar',['filer' => 'login']);

$routes->get('/ruang/(:segment)', 'Ruangan::index/$1');
$routes->post('/ruang/proses', 'Ruangan::tambahPesanan',['filer' => 'login']);
