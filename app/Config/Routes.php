<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/* Vistas Generales */
$routes->get('/', 'Home::index');
$routes->get('instalaciones', 'Home::verInstalaciones');
$routes->get('instructores', 'Home::verInstructores');
$routes->get('promociones', 'Home::verPromociones');

/* Vista del login */
$routes->get('login', 'Panel::login');
$routes->post('panel/validar', 'Panel::validar');


/*Vistas de administración usuarios */
$routes->get('gestion', 'Panel::socios');
$routes->post('usuarios/guardar', 'Panel::guardar');
$routes->get('socios/editar/(:num)', 'Panel::edit/$1');
$routes->get('socios/eliminar/(:num)', 'Panel::delete/$1');
$routes->post('usuarios/actualizar', 'Panel::actualizar');

/*Vistas de administración instructores */
$routes->get('gestion/instructores', 'Panel::instructores');
$routes->post('instructores/guardar', 'Panel::guardarInstructores');
$routes->get('instructores/editar/(:num)', 'Panel::editInstructores/$1');
$routes->post('instructores/actualizar', 'Panel::actualizarInstructores');
$routes->get('instructores/eliminar/(:num)', 'Panel::deleteInstructores/$1');



