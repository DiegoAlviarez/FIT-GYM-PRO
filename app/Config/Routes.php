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

$routes->get('gestion/clases', 'Panel::Clases');
$routes->get('clases/editar/(:num)', 'Panel::editarClase/$1');
$routes->post('clases/guardar', 'Panel::guardarClase');
$routes->post('clases/actualizar/(:num)', 'Panel::actualizarClase/$1');
$routes->get('clases/eliminar/(:num)', 'Panel::eliminarClase/$1');
$routes->post('socios/inscribir', 'Panel::inscribirSocio');
$routes->get('socios/inscripcion/(:num)', 'Panel::inscripcion/$1');

/* Administración */

$routes->get('gestion/instructores', 'Panel::Instructores');
$routes->post('instructores/guardar', 'Panel::guardarInstructores');
$routes->get('instructores/editar/(:num)', 'Panel::editInstructores/$1');
$routes->post('instructores/actualizar/(:num)', 'Panel::actualizarInstructores/$1');
$routes->get('instructores/eliminar/(:num)', 'Panel::deleteInstructores/$1');
$routes->get('promociones/nuevo', 'Panel::gestionPromociones');
$routes->post('promociones/guardar', 'Panel::guardarPromocion');
$routes->get('promociones/editar/(:num)', 'Panel::editarPromocion/$1');
$routes->post('promociones/actualizar/(:num)', 'Panel::actualizarPromocion/$1');
$routes->get('promociones/eliminar/(:num)', 'Panel::eliminarPromocion/$1');
$routes->get('gestion/clases/inscritos/(:num)', 'Panel::verInscritos/$1');
$routes->get('clases/eliminar/(:num)/(:num)', 'Panel::desvincularSocio/$1/$2');
$routes->get('clases/nuevo', 'Panel::Clases');

$routes->get('salir', 'Ingreso::salir');

//  Ruta del Buscador 
$routes->post('panel/consultarpago', 'Panel::consultarPago');

// Rutas de Ingreso 
$routes->get('entrar', 'Ingreso::index');
$routes->post('verificar', 'Ingreso::validar');

