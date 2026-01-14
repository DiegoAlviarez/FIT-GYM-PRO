<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('instalaciones', 'Home::verInstalaciones');
$routes->get('instructores', 'Home::verInstructores');
$routes->get('promociones', 'Home::verPromociones');
$routes->get('login', 'Panel::login');
$routes->get('gestion', 'Panel::index');
$routes->post('panel/validar', 'Panel::validar');
$routes->post('usuarios/guardar', 'Panel::guardar');
$routes->get('editar/(:num)', 'Panel::edit/$1');
$routes->post('usuarios/actualizar', 'Panel::actualizar');
$routes->get('gestion_instructores', 'Panel::instructores');
$routes->post('instructores/guardar', 'Panel::guardarInstructores');
$routes->get('editar_instructor/(:num)', 'Panel::editInstructores/$1');
$routes->post('instructores/actualizar', 'Panel::actualizarInstructores');



