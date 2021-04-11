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
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
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
$routes->match(['get', 'post'], 'noticias/inserir', 'Noticias::inserir');
$routes->match(['get', 'post'], 'noticias/gravar', 'Noticias::gravar');
$routes->match(['get', 'post'], 'noticias/editar/(:num)', 'Noticias::editar/$1');
$routes->match(['get', 'post'], 'noticias/excluir/(:num)', 'Noticias::excluir/$1');
$routes->get('login', 'Usuarios::index');
$routes->get('usuarios/logout', 'Usuarios::logout');
$routes->get('noticias', 'Noticias::index');
$routes->get('noticias/(:segment)', 'Noticias::item/$1');
$routes->get('limparCache', 'Pages::limparCache');
$routes->get('adicionarCache', 'Pages::adicionarCache');
$routes->get('subtrairCache', 'Pages::subtrairCache');
$routes->get('/', 'Pages::mostrar');
$routes->get('(:any)', 'Pages::mostrar/$1');

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
