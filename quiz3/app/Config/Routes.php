<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Matriculas
$routes->get('/', 'Matriculas::index');
$routes->post('matriculas/guardar', 'Matriculas::guardar');
$routes->get('matriculas/confirmacion/(:num)', 'Matriculas::confirmacion/$1');

// CRUD de cursos
$routes->get('cursos', 'Cursos::index');
$routes->get('cursos/crear', 'Cursos::crear');
$routes->post('cursos/guardar', 'Cursos::guardar');
$routes->get('cursos/editar/(:num)', 'Cursos::editar/$1');
$routes->post('cursos/actualizar/(:num)', 'Cursos::actualizar/$1');
$routes->post('cursos/eliminar/(:num)', 'Cursos::eliminar/$1');
