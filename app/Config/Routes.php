<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.



// Page 

$routes->get('/', 'Home::homepage', ['filter' => 'auth']);
$routes->get('/signup', 'Home::signup');
$routes->post('/signup/save', 'SignupController::signup');
$routes->get('/login', 'Home::index');

$routes->get('/courses/(:num)', 'Home::listvdo/$1', ['filter' => 'auth']);
$routes->get('/courses/(:num)/lectures/(:num)', 'Home::showvideo/$1/$2', ['filter' => 'auth']);



// Admin
$routes->group('admin', function ($routes) {
	$routes->get('courses', 'Admin::courses', ['filter' => 'auth']);
	$routes->get('lectures/(:num)', 'Admin::subcourses/$1', ['filter' => 'auth']);
	$routes->get('(:num)/(:num)', 'Admin::videos/$1/$2', ['filter' => 'auth']);
	$routes->get('document/(:num)/(:num)', 'Admin::documents/$1/$2', ['filter' => 'auth']);
	// $routes->add('blog', 'Admin\Blog::index');
});


// CRUD Courses
$routes->post('addcourses', 'Courses::addcourses');
$routes->post('updatecourses', 'Courses::updatecourses');


// CRUD Lectures
$routes->post('addlectures', 'Lectures::addlectures');
$routes->post('updatelectures', 'Lectures::updatelectures');

// CRUD Videos
$routes->post('addvideos', 'Videos::addvideos');
$routes->post('updatevideo', 'Videos::updatevideo');

// CRUD Docs
$routes->post('adddocs', 'Documents::adddocs');
$routes->post('updatedocs', 'Documents::updatedocs');


//Login
$routes->post('/login/auth', 'Login::login');
$routes->get('/logout', 'Login::logout');



//Ajax Controller
$routes->post('/ajax/checkvideo', 'Ajaxdata::videocheck');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
