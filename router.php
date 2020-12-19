<?php
use Core\Router;

$router = new Router();

//home
$router->get('/', 'App\Controllers\HomeController@index');
$router->middleware('falseLogin')->post('/login', 'App\Controllers\HomeController@login');
$router->middleware('falseLogin')->post('/register', 'App\Controllers\HomeController@register');

$router->middleware('AuthAdmin')->group('/admin',[
    ['GET', '', 'App\Controllers\Admin\HomeController@index'],
    ['GET', '/user', 'App\Controllers\Admin\HomeController@user'],
    ['POST', '/user/delete', 'App\Controllers\Admin\HomeController@deleteUser'],
    ['GET', '/company', 'App\Controllers\Admin\HomeController@company'],
    ['POST', '/company/delete', 'App\Controllers\Admin\HomeController@deleteCompany'],
    ['GET', '/job', 'App\Controllers\Admin\HomeController@job'],
    ['POST', '/job/delete', 'App\Controllers\Admin\HomeController@deleteJob'],

]);


$router->get('/list-job', 'App\Controllers\JobController@index');
$router->get('/list-company', 'App\Controllers\CompanyController@index');
$router->get('/job/{slug}', 'App\Controllers\HomeController@viewJob');
$router->get('/search','App\Controllers\HomeController@search');

$router->middleware('checkLogin')->get('/dashboard', 'App\Controllers\User\AccountController@index');
$router->middleware('checkLogin')->get('/change-password', 'App\Controllers\User\AccountController@changePassword');
$router->middleware('checkLogin')->post('/change-password', 'App\Controllers\User\AccountController@postChangePassword');

$router->middleware('User')->get('/user-profile', 'App\Controllers\User\AccountController@profile');
$router->middleware('User')->post('/user-profile', 'App\Controllers\User\AccountController@postProfile');
$router->middleware('User')->get('/application/{id}', 'App\Controllers\User\JobController@application');
$router->middleware('User')->get('/cv-manager', 'App\Controllers\User\AccountController@CvManager');
$router->middleware('User')->post('/cv-manager', 'App\Controllers\User\AccountController@postCV');
$router->middleware('User')->get('/applied-jobs', 'App\Controllers\User\AccountController@applied');
$router->middleware('User')->post('/cv-manager/delete', 'App\Controllers\User\AccountController@deleteCV');
$router->middleware('User')->post('/applied/delete', 'App\Controllers\User\AccountController@deleteApplied');

$router->middleware('Company')->get('/company-profile', 'App\Controllers\User\CompanyController@profile');
$router->middleware('Company')->post('/company-profile', 'App\Controllers\User\CompanyController@postProfile');

$router->middleware('Company')->get('/new-job', 'App\Controllers\User\CompanyController@newJob');
$router->middleware('Company')->post('/new-job', 'App\Controllers\User\CompanyController@postJob');

$router->middleware('Company')->get('/manage-jobs', 'App\Controllers\User\CompanyController@manageJob');
$router->middleware('Company')->post('/manage-jobs/delete', 'App\Controllers\User\CompanyController@deleteJob');
$router->middleware('Company')->get('/manage-jobs/{slug}','App\Controllers\User\CompanyController@editJob');
$router->middleware('Company')->post('/manage-jobs/{slug}','App\Controllers\User\CompanyController@postEditJob');

$router->middleware('Company')->get('/list-resumes', 'App\Controllers\User\CompanyController@listResumes');

$router->middleware('Company')->get('/wallet', 'App\Controllers\User\CompanyController@wallet');

$router->middleware('Company')->get('/history', 'App\Controllers\User\CompanyController@history');

$router->middleware('Company')->post('/payment', 'App\Controllers\User\CompanyController@payment');

// Pay Momo
$router->middleware('Company')->post('/pay', 'App\Controllers\MomoController@init');
$router->middleware('Company')->get('/pay/return', 'App\Controllers\MomoController@payReturn');
$router->middleware('Company')->post('/pay/notify', 'App\Controllers\MomoController@payNotify');

$router->get('/logout', 'App\Controllers\HomeController@logout');

$router->execute();
