<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Landing Page
$routes->get('/', 'home::index');

// Pendidikan
$routes->get('pendidikan', 'PendidikanController::index');

// Pengalaman
$routes->get('pengalaman', 'PengalamanController::index');

// Skills
$routes->get('skills', 'SkillsController::index');