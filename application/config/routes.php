<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'UserController';
$route['home']               = 'UserController/index';
$route['about']              = 'UserController/about';
$route['contact']            = 'UserController/contact';
$route['courses']            = 'UserController/courses';
$route['events']             = 'UserController/events';
$route['students']           = 'UserController/students';
$route['trainers']           = 'UserController/trainers';
$route['projects']           = 'UserController/projects';
$route['library']            = 'UserController/library';
$route['single_news/(.*)']   = 'UserController/single_news/$1';
$route['singleEvent/(.*)']   = 'UserController/singleEvent/$1';
$route['singleStudent/(.*)'] = 'UserController/singleStudent/$1';
$route['singleTrainer/(.*)'] = 'UserController/singleTrainer/$1';
$route['singleProject/(.*)'] = 'UserController/singleProject/$1';



//ADMIN
$route['a_login']       = 'AdminController/login';
$route['a_loginAct']    = 'AdminController/loginAct';
$route['a_logout']      = 'AdminController/logout';


$route['a_dashboard']   = 'AdminController/dashboard';

// Kurslar
$route['a_news_list']   = 'AdminController/news_list';
$route['a_news_create'] = 'AdminController/news_create';
$route['a_news_create_act'] = 'AdminController/news_create_act';


// Kurslar

$route['a_deleteNews/(.*)'] = 'AdminController/deleteNews/$1';

$route['a_news_update/(.*)'] = 'AdminController/update_news/$1';
$route['a_news_update_act/(.*)'] = 'AdminController/update_newsAct/$1';

$route['a_news_view/(.*)'] = 'AdminController/view_news/$1';



// Xeberler
$route['a_allNews_list']   = 'AdminController/allNews_list';
$route['a_allNews_create'] = 'AdminController/allNews_create';
$route['a_allNews_create_act'] = 'AdminController/allNews_create_act';


// Xeberler
$route['a_allDeleteNews/(.*)'] = 'AdminController/allDeleteNews/$1';

$route['a_allNews_update/(.*)'] = 'AdminController/allUpdate_news/$1';
$route['a_allNews_update_act/(.*)'] = 'AdminController/update_allNewsAct/$1';


$route['a_allView_news/(.*)'] = 'AdminController/allView_news/$1';


// Tələbələr
$route['a_studentsList']   = 'AdminController/studentsList';
$route['a_studentsCreate'] = 'AdminController/studentsCreate';
$route['a_students_create_act'] = 'AdminController/students_create_act';



// Tələbələr
$route['a_students_delete/(.*)'] = 'AdminController/students_delete/$1';

$route['a_students_update/(.*)'] = 'AdminController/students_update/$1';
$route['a_students_update_act/(.*)'] = 'AdminController/students_update_act/$1';


$route['a_students_view/(.*)'] = 'AdminController/students_view/$1';

// Təlimçilər
$route['a_trainersList']   = 'AdminController/trainersList';
$route['a_trainersCreate'] = 'AdminController/trainersCreate';
$route['a_trainers_create_act'] = 'AdminController/trainers_create_act';



// Təlimçilər
$route['a_trainers_delete/(.*)'] = 'AdminController/trainers_delete/$1';

$route['a_trainers_update/(.*)'] = 'AdminController/trainers_update/$1';
$route['a_trainers_update_act/(.*)'] = 'AdminController/trainers_update_act/$1';


$route['a_trainers_view/(.*)'] = 'AdminController/trainers_view/$1';


// Layihələr
$route['a_projectsList']   = 'AdminController/projectsList';
$route['a_projectsCreate'] = 'AdminController/projectsCreate';
$route['a_projects_create_act'] = 'AdminController/projects_create_act';



// Layihələr
$route['a_projects_delete/(.*)'] = 'AdminController/projects_delete/$1';

$route['a_projects_update/(.*)'] = 'AdminController/projects_update/$1';
$route['a_projects_update_act/(.*)'] = 'AdminController/projects_update_act/$1';


$route['a_projects_view/(.*)'] = 'AdminController/projects_view/$1';


// Kitabxana
$route['a_libraryList']   = 'AdminController/libraryList';
$route['a_libraryCreate'] = 'AdminController/libraryCreate';
$route['a_library_create_act'] = 'AdminController/library_create_act';



// Kitabxana
$route['a_library_delete/(.*)'] = 'AdminController/library_delete/$1';

$route['a_library_update/(.*)'] = 'AdminController/library_update/$1';
$route['a_library_update_act/(.*)'] = 'AdminController/library_update_act/$1';


$route['a_library_view/(.*)'] = 'AdminController/library_view/$1';

// Slider
$route['a_sliderList']   = 'AdminController/sliderList';
$route['a_sliderCreate'] = 'AdminController/sliderCreate';
$route['a_slider_create_act'] = 'AdminController/slider_create_act';



// Slider
$route['a_slider_delete/(.*)'] = 'AdminController/slider_delete/$1';

$route['a_slider_update/(.*)'] = 'AdminController/slider_update/$1';
$route['a_slider_update_act/(.*)'] = 'AdminController/slider_update_act/$1';


$route['a_slider_view/(.*)'] = 'AdminController/slider_view/$1';


// Kontakt
$route['a_contactList']   = 'AdminController/contactList';
$route['a_contactCreate'] = 'AdminController/contactCreate';
$route['a_contact_create_act'] = 'AdminController/contact_create_act';



// Kontakt
$route['a_contact_delete/(.*)'] = 'AdminController/contact_delete/$1';

$route['a_contact_update/(.*)'] = 'AdminController/contact_update/$1';
$route['a_contact_update_act/(.*)'] = 'AdminController/contact_update_act/$1';


$route['a_contact_view/(.*)'] = 'AdminController/contact_view/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
