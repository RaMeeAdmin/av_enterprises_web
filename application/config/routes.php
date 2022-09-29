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
$route['default_controller'] = 'welcome/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'Welcome/login';
$route['logout'] = 'Welcome/logout';
$route['ws-login'] = 'api/web_service/login';
$route['ws_add_sales_order/(:any)'] = 'Web_view/add_sales_order/$1';
$route['ws_add_purchase_order/(:any)'] = 'Web_view/add_purchase_order/$1';
$route['ws_sales_list/(:any)'] = 'Web_view/sales_list/$1';
$route['ws_purchase_list/(:any)'] = 'Web_view/purchase_list/$1';
$route['ws_dashboard'] = 'Web_view/mobile_dashboard';
$route['ws_getpass_list/(:any)'] = 'Web_view/getpass_list/$1';
$route['ws_getpass_add/(:any)'] = 'web_view/getpass_add/$1';
$route['ws_transport_details_list/(:any)'] = 'Web_view/transport_details_list/$1';
$route['ws_transport_details_add/(:any)'] = 'Web_view/transport_details_add/$1';
$route['ws_diesel_payment_list/(:any)'] = 'Web_view/diesel_payment_list/$1';
$route['ws_diesel_payment_add/(:any)'] = 'Web_view/diesel_payment_add/$1';

$route['ws_get_purchase_all'] = 'Purchase/get_all';

$route['ws_purchase_list'] = "api/Purchase/empList";

//Material
$route['ws_get_material_all'] = 'api/Material/get_all';
$route['ws_get_material_add'] = 'api/Material/addnew';
$route['ws_get_material_edit'] = 'api/Material/edit';
$route['ws_get_material_remove'] = 'api/Material/remove';

//suppliers
$route['ws_get_suppliers_all'] = 'api/Suppliers/get_all';
$route['ws_get_suppliers_add'] = 'api/Suppliers/addnew';
$route['ws_get_suppliers_edit'] = 'api/Suppliers/edit';
$route['ws_get_suppliers_remove'] = 'api/Suppliers/remove';

//customer
$route['ws_get_customer_all'] = 'api/Customer/get_all';
$route['ws_get_customer_add'] = 'api/Customer/addnew';
$route['ws_get_customer_edit'] = 'api/Customer/edit';
$route['ws_get_customer_remove'] = 'api/Customer/remove';

$route['ws_purchase_list'] = "api/Purchase/empList";
