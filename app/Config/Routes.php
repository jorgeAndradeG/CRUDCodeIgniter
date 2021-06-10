<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'App\Controllers\Home::index');
$routes->get('/usuarios', 'App\Controllers\UsersController::index');
$routes->get('/nuevoUsuario', 'App\Controllers\UsersController::create');
$routes->post('/guardarUsuario', 'App\Controllers\UsersController::store');
$routes->get('/deleteUsuario/(:any)', 'App\Controllers\UsersController::delete/$1');
$routes->get('/editUsuario/(:any)', 'App\Controllers\UsersController::edit/$1');
$routes->post('/editUsuario', 'App\Controllers\UsersController::edit');
$routes->get('/editUserNoAdmin', 'App\Controllers\UsersController::editNoAdmin');
$routes->post('/updateUsuario', 'App\Controllers\UsersController::update');
$routes->post('/login', 'App\Controllers\LoginController::auth');
$routes->get('/logout', 'App\Controllers\LoginController::close');
$routes->get('/welcome', 'App\Controllers\Home::welcome');
$routes->get('/cambiarPassword', 'App\Controllers\UsersController::password');
$routes->post('/updatePassword', 'App\Controllers\UsersController::updatePassword');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

