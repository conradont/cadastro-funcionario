<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');    // pode ser alterado se quiser
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true); // cuidado ao usar em produção

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Rota inicial (opcional)
$routes->get('/', 'Home::index');

// Rotas para FuncionarioController CRUD
$routes->get('/funcionarios', 'FuncionarioController::index');
$routes->get('/funcionarios/create', 'FuncionarioController::create');
$routes->post('/funcionarios/store', 'FuncionarioController::store');
$routes->get('/funcionarios/delete/(:num)', 'FuncionarioController::delete/$1');

// Rotas para edição e atualização
$routes->get('/funcionarios/edit/(:num)', 'FuncionarioController::edit/$1');
$routes->post('/funcionarios/update/(:num)', 'FuncionarioController::update/$1');

/*
 * --------------------------------------------------------------------
 * Environment based routes
 * --------------------------------------------------------------------
 * 
 * If you need different routes based on environment, include them here.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
