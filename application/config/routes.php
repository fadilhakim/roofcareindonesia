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



$route['services'] = 'home/services';
$route['services/detail/(:any)'] = 'home/detail_services/$1';


// Menu Services
$route['services/new-installation'] = 'services/view_new_installation';
$route['services/re-roofing'] = 'services/view_re_roofing';
$route['services/retrofitting'] = 'services/view_retrofitting';
$route['services/roof-inspection'] = 'services/view_roof_inspection';
$route['services/roof-repair'] = 'services/view_roof_repair';
$route['services/roof-maintenance'] = 'services/view_roof_maintenance';
$route['services/roofing-seminars'] = 'services/roofing_seminars';
$route['services/roofing-seminars/detail/(:any)'] = 'services/detail_roofing_seminars/$1';
$route['services/roof-restoration'] = 'services/view_roof_restoration';
$route['services/roof-cleaning'] = 'services/view_roof_cleaning';
$route['services/engineering'] = 'services/view_engineering';
$route['services/estimating'] = 'services/view_estimating';


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


//user web route

// Products
$route['product/safety_lines'] = 'product/safety_lines';
$route['product/metal_roofting_system'] = 'product/metal_roofting_system';
$route['product/steep_slope_roofting'] = 'product/steep_slope_roofting';
$route['product/singleply_roofting'] = 'product/singleply_roofting';
$route['product/green_roofting_option'] = 'product/green_roofting_option';
$route['product/liquid_applied_membrane'] = 'product/liquid_applied_membrane';
$route['product/siphonic_gutter'] = 'product/siphonic_gutter';
