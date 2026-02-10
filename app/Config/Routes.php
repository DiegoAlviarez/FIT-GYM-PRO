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


/*  Empleado */
$routes->get('gestion', 'Panel::socios');
$routes->post('panel/guardar', 'Panel::guardar');
$routes->get('socios/editar/(:num)', 'Panel::edit/$1');
$routes->get('socios/eliminar/(:num)', 'Panel::delete/$1');
$routes->post('usuarios/actualizar/(:num)', 'Panel::actualizar/$1');

$routes->get('clases/nuevo', 'Panel::nuevaClase');
$routes->post('clases/guardar', 'Panel::guardarClase');



/* Administración */

$routes->get('gestion/instructores', 'Panel::instructores');
$routes->post('instructores/guardar', 'Panel::guardarInstructores');
$routes->get('instructores/editar/(:num)', 'Panel::editInstructores/$1');
$routes->post('instructores/actualizar/(:num)', 'Panel::actualizarInstructores/$1');
$routes->get('instructores/eliminar/(:num)', 'Panel::deleteInstructores/$1');
$routes->get('promociones/nuevo', 'Panel::gestionPromociones');
$routes->post('promociones/guardar', 'Panel::guardarPromocion');
$routes->get('promociones/editar/(:num)', 'Panel::editarPromocion/$1');
$routes->post('promociones/actualizar/(:num)', 'Panel::actualizarPromocion/$1');
$routes->get('promociones/eliminar/(:num)', 'Panel::eliminarPromocion/$1');


$routes->get('salir', 'Ingreso::salir');

//  Ruta del Buscador 
$routes->post('panel/consultarpago', 'Panel::consultarPago');

// Rutas de Ingreso 
$routes->get('entrar', 'Ingreso::index');
$routes->post('verificar', 'Ingreso::validar');

