<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'DashboardController::index', ['as' => 'dashboard.index', 'filter' => 'auth']);

$routes->get('login', 'AuthController::login', ['as' => 'login.index']);
$routes->post('login', 'AuthController::loginAction', ['as' => 'login.action']);
$routes->get('logout', 'AuthController::logout', ['as' => 'logout.index']);
$routes->get('edit-password', 'AuthController::editPassword', ['as' => 'password.edit']);
$routes->post('edit-password', 'AuthController::updatePassword', ['as' => 'password.update']);

$routes->group('pengguna', function($routes) {
    $routes->get('/', 'PenggunaController::index', ['as' => 'pengguna.index']);
    $routes->post('create', 'PenggunaController::store', ['as' =>'pengguna.store']);
    $routes->get('detail/(:any)', 'PenggunaController::detail/$1', ['as' => 'pengguna.detail']);
    $routes->put('edit/(:any)', 'PenggunaController::update/$1', ['as' => 'pengguna.update']);
    $routes->delete('delete/(:any)', 'PenggunaController::delete/$1', ['as' => 'pengguna.delete']);
});

$routes->group('cuti', function($routes) {
    $routes->get('/', 'CutiController::index', ['as' => 'cuti.index']);
    $routes->get('(:any)', 'CutiController::detail/$1', ['as' => 'cuti.detail']);
    $routes->post('create', 'CutiController::store', ['as' =>'cuti.store']);
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}