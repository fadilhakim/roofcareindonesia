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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'home';
$route['404_override'] = 'home/page404';
$route['translate_uri_dashes'] = FALSE;

$route['about'] = 'home/about';
$route['home'] = 'home';
$route['contact'] = 'home/contact';
$route['case_studies'] = 'home/case_studies';
$route['case_studies/detail/(:any)'] = 'home/detail_case_studies/$1';



$route['seminars'] = 'home/seminars';
$route['seminars/detail/(:any)'] = 'home/detail_seminars/$1';

$route['services'] = 'home/services';
$route['services/detail/(:any)'] = 'home/detail_services/$1';


/********* Dashboard *************/
$route['dashboard/login'] = 'login';
$route['dashboard'] = 'dashboard';

$route['dashboard/seminars'] = 'dashboard/seminars';
$route['dashboard/seminars/create'] = 'dashboard/seminars_create';
$route['dashboard/seminars/submit'] = 'dashboard/seminars_submit';
$route['dashboard/seminars/delete/(:any)'] = 'dashboard/seminars_delete/$1';
$route['dashboard/seminars/edit/(:any)'] = 'dashboard/seminars_edit/$1';
$route['dashboard/seminars/update/(:any)'] = 'dashboard/seminars_update/$1';


$route['dashboard/case-studies'] = 'dashboard/case_studies';
$route['dashboard/case-studies/create'] = 'dashboard/case_studies_create';
$route['dashboard/case-studies/submit'] = 'dashboard/case_studies_submit';
$route['dashboard/case-studies/delete/(:any)'] = 'dashboard/case_studies_delete/$1';
$route['dashboard/case-studies/edit/(:any)'] = 'dashboard/case_studies_edit/$1';
$route['dashboard/case-studies/update/(:any)'] = 'dashboard/case_studies_update/$1';

$route['dashboard/services'] = 'dashboard/services';
$route['dashboard/services/create'] = 'dashboard/services_create';
$route['dashboard/services/submit'] = 'dashboard/services_submit';
$route['dashboard/services/delete/(:any)'] = 'dashboard/services_delete/$1';
$route['dashboard/services/edit/(:any)'] = 'dashboard/services_edit/$1';
$route['dashboard/services/update/(:any)'] = 'dashboard/services_update/$1';



$route['systems'] = 'systems';
$route['systems/create'] = 'systems/create';
$route['systems/update'] = 'systems/update/$1';
$route['systems/delete'] = 'systems/delete/$1';

// /********* project initiate *************/
// $route['project_initiate/project_charter/create'] = 'project_initiate/project_charter_create';
// $route['project_initiate/project_charter/update/(:any)'] = 'project_initiate/project_charter_update/$1';
// $route['project_initiate/project_charter/submit'] = 'project_initiate/project_charter_submit';
// $route['project_initiate/project_charter/approve'] = 'project_initiate/project_charter_approve';
// $route['project_initiate/project_charter/reject'] = 'project_initiate/project_charter_reject';
//
// $route['project_initiate/presales_hand_over'] = 'project_initiate/presales_hand_over';
// $route['project_initiate/presales_ho/create'] = 'project_initiate/presales_hand_over_create';
// $route['project_initiate/presales_ho/update/(:any)'] = 'project_initiate/presales_hand_over_update/$1';
// $route['project_initiate/presales_ho/submit'] = 'project_initiate/presales_hand_over_submit';
// $route['project_initiate/presales_ho/approve'] = 'project_initiate/presales_hand_over_approve';
// $route['project_initiate/presales_ho/reject'] = 'project_initiate/presales_hand_over_reject';
//
// /********* project update *************/
// $route['project_update/executive_summary_update'] = 'project_update/executive_summary_update';
// $route['project_update/executive_summary_update/create'] = 'project_update/executive_summary_update_create';
// $route['project_update/executive_summary_update/update/(:any)'] = 'project_update/executive_summary_update_update/$1';
// $route['project_update/executive_summary_update/submit'] = 'project_update/executive_summary_update_submit';
// $route['project_update/executive_summary_update/approve'] = 'project_update/executive_summary_update_approve';
// $route['project_update/executive_summary_update/reject'] = 'project_update/executive_summary_update_reject';
//
// $route['project_update/project_hand_over'] = 'project_update/project_hand_over';
// $route['project_update/project_hand_over/create'] = 'project_update/project_hand_over_create';
// $route['project_update/project_hand_over/update/(:any)'] = 'project_update/project_hand_over_update/$1';
// $route['project_update/project_hand_over/submit'] = 'project_update/project_hand_over_submit';
// $route['project_update/project_hand_over/approve'] = 'project_update/project_hand_over_approve';
// $route['project_update/project_hand_over/reject'] = 'project_update/project_hand_over_reject';
//
// $route['project_update/project_history'] = 'project_update/project_history';
// $route['project_update/project_history/detail/(:any)'] = 'project_update/project_history_detail/$1';
//
// /********* user settings *************/
// $route['settings/division/create'] = 'settings/division_create';
// $route['settings/division/delete'] = 'settings/division_delete';
// $route['settings/division/update/(:any)'] = 'settings/division_update/$1';
//
// $route['settings/group/create'] = 'settings/group_create';
// $route['settings/group/delete'] = 'settings/group_delete';
// $route['settings/group/update/(:any)'] = 'settings/group_update/$1';
//
// $route['settings/user/create'] = 'settings/user_create';
// $route['settings/user/delete'] = 'settings/user_delete';
// $route['settings/user/update/(:any)'] = 'settings/user_update/$1';
//
// $route['settings/group_roles'] = 'settings/group_roles';
// $route['settings/group_roles/update_process'] = 'settings/group_roles_update_process';
// $route['settings/group_roles/update/(:any)'] = 'settings/group_roles_update/$1';
//
// $route['settings/password/(:any)'] = 'settings/password/$1';
// $route['settings/password/update/(:any)'] = 'settings/password_update/$1';
//
// $route['dashboard/project_perfomance_highlight/(:any)'] = 'dashboard/project_perfomance_highlight/$1';
//
// $route['notification_box'] = 'notification_box';
