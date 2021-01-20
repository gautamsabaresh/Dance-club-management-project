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
$route['default_controller'] = 'login_controller';
$route['admin_controller']='admin_controller';
$route['user_manipulation_controller']='user_manipulation_controller';
$route['listusers_view']='admin_controller/listusers_view';
$route['home_staffcoordinator'] = 'login_controller/home_staffcoordinator';
$route['home_studentcoordinator'] = 'login_controller/home_studentcoordinator';
$route['home_student'] = 'login_controller/home_student';
$route['home_admin'] = 'login_controller/home_admin';
$route['add_user'] = 'login_controller/add_user';
$route['useradded'] = 'login_controller/useradded';
$route['forget_pwd_view'] = 'login_controller/forget_pwd_view';
$route['reset_pwd_otp_view'] = 'login_controller/reset_pwd_otp_view';
$route['set_new_password_view'] = 'login_controller/set_new_password_view';
$route['index']='login_controller/index';
$route['check_otp_new_pwd_view'] = 'login_controller/check_otp_new_pwd_view';
$route['userexists'] = 'login_controller/userexists';
$route['editprofile_view'] = 'user_manipulation_controller/editprofile_view';
$route['reset_pwd_link_expired']='login_controller/reset_pwd_link_expired';
$route['404_override'] = '';
$route['email'] = 'Login_controller';
$route['translate_uri_dashes'] = FALSE;
$route['query_view']='user_manipulation_controller/query_view';
