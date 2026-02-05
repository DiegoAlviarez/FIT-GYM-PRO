<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('login', 'Ingreso::index');

/* Vistas Generales */
$routes->get('/', 'Home::index');
$routes->get('instalaciones', 'Home::verInstalaciones');
$routes->get('instructores', 'Home::verInstructores');
$routes->get('promociones', 'Home::verPromociones');


/*  Gestión*/
$routes->get('gestion', 'Panel::socios');
$routes->post('usuarios/guardar', 'Panel::guardar');
$routes->get('socios/editar/(:num)', 'Panel::edit/$1');
$routes->get('socios/eliminar/(:num)', 'Panel::delete/$1');
$routes->post('usuarios/actualizar/(:num)', 'Panel::actualizar/$1');

/* Administración de Instructores */
$routes->get('gestion/instructores', 'Panel::instructores');
$routes->post('instructores/guardar', 'Panel::guardarInstructores');
$routes->get('instructores/editar/(:num)', 'Panel::editInstructores/$1');
$routes->post('instructores/actualizar/(:num)', 'Panel::actualizarInstructores/$1');
$routes->get('instructores/eliminar/(:num)', 'Panel::deleteInstructores/$1');


//  Ruta del Buscador 
$routes->post('panel/consultarpago', 'Panel::consultarPago');

// Rutas de Ingreso 
$routes->get('entrar', 'Ingreso::index');
$routes->post('verificar', 'Ingreso::validar');

