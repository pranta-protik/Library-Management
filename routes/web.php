<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//HomePage Routes
Route::get('/', function () {
    return view('home');
})->name('/');
Route::get('home', 'HomeController@index')->name('home');

//Profile Routes
Route::get('profile','ProfileController@index')->name('profile');
Route::put('profile/{user_id}','ProfileController@update');

//Approve Routes
Route::get('approve','ApproveController@index')->name('approve');
Route::put('approve/{user_id}','ApproveController@update');
Route::delete('approve/{user_id}','ApproveController@delete');

//Dashboard Routes
Route::get('dashboard','DashboardController@index')->name('dashboard');

//New Book Routes
Route::get('newInfo','NewInfoController@index')->name('newInfo');
Route::get('createInfo','NewInfoController@createInfo');
Route::get('newBook','NewBookController@index')->name('newBook');
Route::get('addAuthorDDL','NewBookController@authorDDL');
Route::post('newBook','NewBookController@create');

//Browse Book Routes
Route::get('browse','BrowseBookController@index')->name('browse');

//View Book Routes
Route::get('book/{book_id}','BookController@index');
Route::post('book/{book_id}','BookController@borrow');
Route::put('book/{book_id}','BookController@update');
Route::delete('book/{book_id}','BookController@delete');

//Issue Book
Route::get('issue','IssueController@index')->name('issue');
Route::put('issue/{issue_id}','IssueController@update');
Route::delete('issue/{issue_id}','IssueController@delete');

//Borrow Book
Route::get('borrow','BorrowController@index')->name('borrow');

//About
Route::get('about','AboutController@index')->name('about');

//Address
Route::get('address','AddressController@index')->name('address');

//Disapprove Routes
Route::get('disapprove','DisapproveController@index')->name('disapprove');
Route::put('disapprove/{user_id}','DisapproveController@update');
Route::delete('disapprove/{user_id}','DisapproveController@delete');