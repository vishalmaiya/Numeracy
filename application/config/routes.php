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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Register';
$route['404_override'] = 'my404';
$route['admin'] = "dashbord";
$route['translate_uri_dashes'] = FALSE;
$route['login'] = "admin/login";
$route['logout'] = "admin/logout";
$route['all-questions'] = "questions";
$route['add-question'] = "questions/add_question";
$route['edit-question'] = "questions/edit_question";
$route['view-question'] = "questions/view_question";
$route['question-type'] = "questiontype/all_type";
$route['edit-type'] = "questiontype/edit_type";
$route['all-exam'] = "exam";
$route['add-exam1'] = "exam/add_exam1";
$route['add-exam2'] = "exam/add_exam2";
$route['edit-exam1'] = "exam/edit_exam1";
$route['edit-exam2'] = "exam/edit_exam2";
$route['exam-status'] = "exam/exam_status";
$route['survey-questions'] = "survey";
$route['add-survey-question'] = "survey/add_question";
$route['edit-survey-question'] = "survey/edit_question";
$route['view-survey-question'] = "survey/view_question";


// ------ Front End ---------- //
$route['information'] = "UserTest/information";
//$route['usertest'] = "UserTest/gettype1_question";
$route['surveyquestions'] = "surveyquestions";


