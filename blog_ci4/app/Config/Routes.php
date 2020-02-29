<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

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
$routes->setDefaultController('Blog');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->addPlaceholder('uuid', '[0-9]{4}-[a-f]{4}');

$routes->get('/', 'Blog::index');
$routes->get('blog/uuid/(:uuid)', 'Blog::getPostByUUID/$1');
$routes->get('blog/https', 'Blog::https');
$routes->get('blog/(:any)', 'Blog::ler/$1');
$routes->get('blog/categoria/(:any)/(:num)', 'Blog::posts/$1/$2');

$routes->add('autores/perfil', 'Blog::autor', ['as' => 'perfil']);

// Redirecionamento para o nome da rota
$routes->addRedirect('autor/sobre', 'perfil');
// Redirecionamento para o URI
$routes->addRedirect('autor/sobre', 'autores/perfil');

$routes->environment('development', function ($routes) {
	$routes->add('logs', 'Log::index');
});

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
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
