<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
// FRONTEND
$routes->get('/', 'Frontend::login');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/register', 'Frontend::register');
$routes->get('/forgot_password', 'Frontend::forgot_password');
$routes->get('/recover_password/(:any)', 'Frontend::recover_password/$1');
$routes->get('/auth/recover_password/(:any)', 'Auth::recover_password/$1');
$routes->get('/logout', 'Auth::logout');

// BACKEND
//// LAGU
$routes->get('/lagu', 'CtrlrLagu::index');
$routes->get('/lagu/create', 'CtrlrLagu::create');
$routes->post('/lagu/save', 'CtrlrLagu::save');
$routes->get('/lagu/edit/(:segment)', 'CtrlrLagu::edit/$1');
$routes->delete('/lagu/(:num)', 'CtrlrLagu::delete/$1');
$routes->get('/lagu/(:any)', 'CtrlrLagu::detail/$1');

//// USER
$routes->get('/user', 'CtrlrUser::index');
