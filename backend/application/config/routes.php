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
$route['(:any)'] = "home/$1";
$route['page/(:any)']="home/page/$1";
$route['cancer-details/(:any)'] ="home/cancer_details/$1";
$route['package-details/(:any)'] ="home/package_details/$1";
$route['patientpackage-details/(:any)'] ="home/patientpackage_details/$1";
$route['technologys/(:any)']="home/techview/$1";
$route['blog/(:any)']="home/article/$1";
$route['blog-post/(:any)']="home/newsview/$1";
$route['department-details/(:any)']="home/department_details/$1";
$route['viewgallery/(:any)']="home/viewgallery/$1";
$route['doctor-details/(:any)'] = "home/doctordetails/$1";
$route['user/login']="/login/index";

$route['subscriber/list']="Settings/list";
$route['subscriber/campaign']="Settings/campaign";
$route['subscriber/runcampaign']="Settings/runcampaign";
$route['subscriber/addsubscriber']="Settings/addsubscriber";
/*
$route['subscriber/list']="Settings/list";
$route['subscriber/campaign']="subscriber/campaign";
$route['subscriber/runcampaign']="subscriber/runcampaign";
$route['subscriber/addsubscriber']="subscriber/addsubscriber";
*/
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['doctor-appointment/(:any)'] ="home/doctor_appointment/$1";




$route['send-email'] = 'EmailController';
$route['email'] = 'EmailController/send';
