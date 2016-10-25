<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);


/*************************** Message Keywords Constants *********************************/

define('ERROR_ENTER_EMAIL', "ERROR_ENTER_EMAIL");
define('LOGIN_SUCCESS', "email_error");
define('LOGIN_FAILED', "email_error");
define('SIGNUP_FAILED', "email_error");



/*******************User Defined******************************/
	define('PARENT_ID', 0);
	define('TEXT_BOX', 1);
	define('SECURE_TEXT_BOX', 2);
	define('TEXT_AREA', 3);
	define('RADIO', 4);
	define('CHECK_BOX', 5);
	define('SELECT', 6);
	define('ACTIVE', 1);
	define('DEACTIVE', 0);
	define('YES',1);
	define('NO', 0);
	define('MENU_ITEM', 3);

	define('ENGLISH', 'english'); 
	define('ARABIC', 'arabic'); 
	define('ARABIC_FOLDER', 'arabic/'); 
	define('MOBILE_FOLDER', 'mobile/'); 
define('BANNER_HOME',1);
define('BANNER_BLOG',2);
define('BANNER_POSITION_LEFT',1);
define('BANNER_POSITION_TOP',2);
define('BANNER_POSITION_RIGHT',3);
define('BANNER_POSITION_BOTTOM',4);

	/**********PAGES FOR META TAGS**********************/
define('PAGE_HOME',1);
define('PAGE_OUR_HISTORY',2);
define('PAGE_OUR_TEAM',3);
define('PAGE_SUCCESS_STORIES',4);
define('PAGE_PRESS_RELEASE',5);
define('PAGE_HEALTHY_TIPS',6);
define('PAGE_MEASURE_YOUR_WEIGHT',7);
define('PAGE_GALLERY',8);
define('PAGE_PR',9);
define('PAGE_BLOG',10);
define('PAGE_CONTACT_US',11);
define('PAGE_MEETING',12);

	/**********Galerry Type Id**********************/

	define('SLIDER',1);
	define('NAVE_PAGE',5);
	define('NEWS', 6);
	define('NEWS_HEADING', 'News');
	
	
	/************* TOP BANNER CONSTANTS ***************************/
	define('PHOTOGALERY', 1);
	/****************************************/
	define('URL_TRUE', '1');
	define('URL_FALSE', '0');
	/***********************************/

	/*define('TOP_BANNER', 3);
	define('BOTTOM_BANNER', 7);*/
	define('TOP_SLIDER', 1);
	define('LEFT_SLIDER', 2);
	define('RIGHT_SLIDER', 3); 
	define('GALLERY', 4);
	define('GALLERY_HEADING', 'Galleries');
	//define('IMAGES','http://127.0.0.1/erp_ci/uploads/'); // live
	define('IMAGES','http://www.cyphersol.com/mockup/erp_ci/uploads/'); // live
  

	define('FEATURED_PRODUCT', 'ORDER BY updated_at DESC ');
	define('NEW_COLLECTION', 'ORDER BY id DESC LIMIT 0,8');
	define('RANDOM_PRODUCT', 'ORDER BY id DESC LIMIT 0,15');
	define('featured_product', 11);
	define('new_collection', 12);
	define('random', 13);
	define('viewedproduct', 5);

  
    define('WEBMASTER', 'waseemafzal.purplearts@gmail.com');  // Default Email Sent To
	define('ALLOWED_TYPES', 'jpg|gif|png|jpeg|JPG|PNG'); // Allwoed Types
	define('ALLOWED_TYPES_PRICING', 'jpg|gif|png|jpeg|JPG|PNG|pdf|xlsx|xls|dwg|DWG|dxf|DFX'); // Allwoed Types
	
	/******************Gallery ids*************************/
	define('PRODUCT_ID', '5');
	define('BRAND_ID', '8');
	/******************Gallery ids*************************/

	/***************User Types*************************/
	define('ADMIN', '1');
	define('USER', '2');
	
	define('PENDING', '2');
	define('APPROVED', '1');
	define('CANCEL', '0');
	define('COMPLETE', '3');
	
//	define('DISCOUNT', '20');
//	define('SHIPPMENT_FEE', '40');
//	define('BILL', '1'); // bill 
//	define('SHIPP', '2'); // shipp
//	define('KNET', '1');
//	define('ONDELIVERY', '2');
//	define('CART_FROM_HOME_OR_LEFT', '1');
//	define('CART_FROM_DEATIL', '2');


/************** CMS PAGES AND TOP BANNERS DB ID'S**************/

	
	
	/*||||||||||||||||||Newletter Types||||||||||||||||||||?*/
//		define('TEMPLATE1', 1);  //newletter types currently 2-NewsLetter integrated in system
//		define('TEMPLATE2', 2);
	/*|||||||||||||||||Newletter Types|||||||||||||||||||||?*/
	

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('ERROR_NO_PRODUCTS_TO_COMPARE', 'You have no products to compare');
//define('ERROR_NO_PRODUCTS_TO_COMPARE_AR', 'You have no products to compare');

/* End of file constants.php */
/* Location: ./application/config/constants.php */