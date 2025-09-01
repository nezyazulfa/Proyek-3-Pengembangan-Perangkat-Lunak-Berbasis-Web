<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('profile', 'Profile::index');
$routes->get('helloworld', 'HelloWorld::index');
$routes->get('tabel', 'Tabel::index');
$routes->get('tribuwono/(:num)', 'Tribuwono::detail/$1');
$routes->get('tribuwono/create', 'Tribuwono::create'); // Untuk menampilkan form
$routes->post('tribuwono/store', 'Tribuwono::store');   // Untuk menyimpan data