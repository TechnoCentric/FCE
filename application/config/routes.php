<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//$route['default_controller'] = "welcome";
//$route['404_override'] = '';

// dashboard
$route['dashboard'] = 'dashboard';

// answer_option
$route['answer_option/create'] = 'answer_option/create';
$route['answer_option/(:any)'] = 'answer_option/view/$1';
$route['answer_option'] = 'answer_option';

// type of answer
$route['answer_type/create'] = 'answer_type/create';
$route['answer_type/(:any)'] = 'answer_type/view/$1';
$route['answer_type'] = 'answer_type';

// section
$route['section/create'] = 'section/create';
$route['section/(:any)'] = 'section/view/$1';
$route['section'] = 'section';

// section
$route['report/all_mdas'] = 'report/all_mdas';
//$route['report'] = 'report';

// role
$route['role/create'] = 'role/create';
$route['role/(:any)'] = 'role/view/$1';
$route['role'] = 'role';

// users
$route['users/create'] = 'users/create';
$route['users/(:any)'] = 'users/view/$1';
$route['users'] = 'users';

// question
$route['question/create'] = 'question/create';
$route['question/update/(:any)'] = 'question/update/$1';
$route['question/(:any)'] = 'question/view/$1';
$route['question'] = 'question';

// assessment
$route['assessment/create'] = 'assessment/create';
$route['assessment/(:any)'] = 'assessment/view/$1';
$route['assessment'] = 'assessment';

// user
$route['user/encoder'] = 'user/encoder';
$route['user/login'] = 'user/login';
$route['user/register'] = 'user/register';
$route['user/admin'] = 'user/admin';
$route['user'] = 'user';

// result
$route['result'] = 'result';



$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';

// news
$route['news/create'] = 'news/create';
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';

#$route['default_controller'] = 'pages/view';
#$route['(:any)'] = 'pages/view/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */