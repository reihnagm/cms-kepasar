<?php 
namespace Config;

$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers\Admin\Dashboard');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->group('admin', function($routes) {
  $routes->get('/', 'Dashboard::index', ['namespace' => 'App\Controllers\Admin\Dashboard']);
  $routes->get('dashboard', 'Dashboard::index', ['namespace' => 'App\Controllers\Admin\Dashboard']);
  $routes->group('auth', function($routes) {
    $routes->get('login', 'Login::index', ['namespace' => 'App\Controllers\Admin\Auth']);
    $routes->post('login', 'Login::store', ['namespace' => 'App\Controllers\Admin\Auth']);
    $routes->post('logout', 'Logout::logout', ['namespace' => 'App\Controllers\Admin\Auth']);
  });
  $routes->group('products', function($routes) {
    $routes->get('datatables', 'Product::datatables', ['namespace' => 'App\Controllers\Admin\Product']);
    $routes->get('list', 'Product::index', ['namespace' => 'App\Controllers\Admin\Product']);
    $routes->post('/', 'Product::store', ['namespace' => 'App\Controllers\Admin\Product']);
    $routes->put('/(:any)', 'Product::update', ['namespace' => 'App\Controllers\Admin\Product']);
  });
});



if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
