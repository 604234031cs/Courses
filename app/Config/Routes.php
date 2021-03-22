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



$routes->get('/videos/(:any)', 'Home::video_has/$1');
// $routes->get('/base_url', function () {


// 	echo json_encode(base_url());
// });

// Page 

$routes->get('/', 'Home::homepage', ['filter' => 'auth']);
$routes->get('/signup', 'Home::signup');
$routes->post('/signup/save', 'SignupController::signup');
$routes->get('/login', 'Home::index');
$routes->get('/category/(:num)', 'Home::category/$1');





$routes->get('/courses/(:num)', 'Home::listvdo/$1', ['filter' => 'auth']);
$routes->get('/document/(:num)', 'Home::document/$1', ['filter' => 'auth']);
$routes->get('/courses/(:num)/lectures/(:num)', 'Home::showvideo/$1/$2', ['filter' => 'auth']);
$routes->get('/progress_course', 'Home::progress_course');

// Admin
$routes->group('admin', function ($routes) {
	$routes->get('courses', 'Admin::courses', ['filter' => 'auth']);
	$routes->get('lectures/(:num)', 'Admin::subcourses/$1', ['filter' => 'auth']);
	$routes->get('(:num)/(:num)', 'Admin::videos/$1/$2', ['filter' => 'auth']);
	$routes->get('document/(:num)/(:num)', 'Admin::documents/$1/$2', ['filter' => 'auth']);
	$routes->get('category', 'Admin::category', ['filter' => 'auth']);
	$routes->get('category/(:num)', 'Admin::group_courses/$1', ['filter' => 'auth']);
	$routes->get('register', 'Admin::list_regis', ['filter' => 'auth']);
	$routes->get('register/(:num)/(:num)', 'Admin::approve/$1/$2', ['filter' => 'auth']);
	$routes->get('question/(:num)', 'Admin::question/$1');
	$routes->get('val_question/(:num)', 'Admin::val_question/$1');
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

// CRUD Category and Group
$routes->post('addcategory', 'Category::addcategory');
$routes->post('updatecategory', 'Category::updatecategory');
$routes->post('addgroup', 'Category::addgroup');
$routes->post('updategroup', 'Category::updategroup');

//Login
$routes->post('/login/auth', 'Login::login');
$routes->get('/logout', 'Login::logout');



//Ajax Controller
$routes->post('/ajax/checkvideo', 'Ajaxdata::videocheck');
$routes->post('/ajax/search', 'Ajaxdata::search');
$routes->post('/ajax/selact', 'Ajaxdata::selact');
$routes->post('/ajax/updateduration', 'Ajaxdata::duration');
$routes->post('/ajax/endvideo', 'Ajaxdata::endvideo');
$routes->post('/ajax/getcurrtiem', 'Ajaxdata::currtime');
// $routes->post('/ajax/showquestion', 'Ajaxdata::showquestion');
// $routes->post('/ajax/showvalquestion', 'Ajaxdata::show_val_question');
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
