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


/*$route['default_controller'] = "main";
$route['admin'] = "admin/login";
$route['404_override'] = '';*/


$route['default_controller'] = "home";
//$route['admin'] = "admin/dashboard";
$route['admin'] = "admin/login"; 
$route['404_override'] = '';



$route['admin/success'] = "admin/cms/successStories/37";
$route['admin/add-story'] = "admin/cms/AddPostNav/37";
$route['admin/save-story'] = "admin/cms/SavePostNav/37";

//About cms
$route['our-history'] = "cms/get/1";
$route['our-team'] = "cms/get/2";
$route['FAQ'] = "cms/get/52";
$route['terms'] = "cms/get/53";
$route['success-stories'] = "cms/get_Success_stories";
$route['press'] = "home/press";
//SLIDER CMS
$route['more-information'] = "cms/get_slider_cms/1";
$route['book-appointment'] = "cms/get_slider_cms/2";
$route['new-purchase'] = "cms/get_slider_cms/3";
$route['package'] = "cms/get_slider_cms/4";

$route['tips'] = "home/tips";
$route['measure'] = "home/measure";
$route['galery'] = "home/galery";
$route['pr'] = "home/pr";
$route['contact-us'] = "contact/index";
$route['meeting'] = "contact/meet";
$route['blog'] = "blog/index";
$route['profile'] = "order/profile";


define('THE_BUSINESS_PROGRAM', 6);
	define('THE_HOLLYWOOD_PROGRAM', 7);
	define('THE_ATHLETE_PROGRAM', 8);
	define('THE_SIXPACK_PROGRAM', 9);
	define('THE_MATERNITY_PROGRAM', 10);
	


$route['about-us'] = "page/about";

$route['media'] = "page/media";
$route['career'] = "contact/career";
$route['logout'] = "admin/login/logout";
$route['header_tabs'] = "admin/home/header_tabs";
$route['edit_tabs/(:any)'] = "admin/home/edit_tabs/$1";
$route['edit_tab'] = "admin/home/save_tabs_edits";
$route['add_tab/(:any)'] = "admin/home/add_new_page/$1";
$route['save_tab'] = "admin/home/save_new_page";
$route['add_page/(:any)'] = "admin/pages/add_page/$1";
$route['view_pages/(:any)'] = "admin/pages/view_pages/$1";

$route['edit-gallery-images'] = "gallery_images/view/id/4/url/0";
// admin 



















