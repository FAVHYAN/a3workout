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

$route['default_controller']	= "cart";

//this for the admininstration console
$route['admin']					= 'admin/dashboard';
$route['admin/media/(:any)']		= 'admin/media/$1';

require_once( BASEPATH .'database/DB'. EXT );
$db =& DB();

$query_customers = $db->get_where( 'customers', array( "type" => "trainer" ) );
$result_customers = $query_customers->result();
foreach( $result_customers as $row_customers )
{
    $route[ $row_customers->username ]				= "secure/profile/". $row_customers->id;
    $route[ $row_customers->username.'/:any' ]		= "secure/profile/". $row_customers->id;
    $route[ "secure/profile/". $row_customers->id ]			= 'error404';
    $route[ "secure/profile/". $row_customers->id.'/:any' ]	= 'error404';
}

$query_student = $db->get_where( 'customers', array( "type" => "student" ) );
$result_student = $query_student->result();
foreach( $result_student as $row_student )
{
    $route[ $row_student->username ]				= "secure/profile_student/". $row_student->id;
    $route[ $row_student->username.'/:any' ]		= "secure/profile_student/". $row_student->id;
    $route[ "secure/profile_student/". $row_student->id ]			= 'error404';
    $route[ "secure/profile_student/". $row_student->id.'/:any' ]	= 'error404';
}
/*
$query_customers = $db->get_where( 'customers', array( "type" => "trainer" ) );
$result_customers = $query_customers->result();
foreach( $result_customers as $row_customers )
{
    $route[ "course/".$category->slug ]			= "secure/profile/". $row_customers->id;
    $route[ $row_customers->username.'/:any' ]		= "secure/profile/". $row_customers->id;
    $route[ "secure/profile/". $row_customers->id ]	= 'error404';
    $route[ "secure/profile/". $row_customers->id.'/:any' ]	= 'error404';
}
*/
