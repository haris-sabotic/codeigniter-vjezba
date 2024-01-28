<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'DashboardController::index');
$routes->post('/', 'DashboardController::create');
$routes->delete('/(:num)', 'DashboardController::delete/$1');
