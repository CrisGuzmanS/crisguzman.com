<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WelcomeController@index');

/**
 * ========
 * PROJECTS
 * ========
 */

Route::get('proyecto/{project}', 'ProjectController@show')->name('projects.show');

/**
 * ========
 * ABOUT ME
 * ========
 */

Route::get('sobre-mi', 'AboutController@show')->name('about.show');

/**
 * ========
 * CONTACT
 * ========
 */

Route::get('contacto', 'ContactController@show')->name('contact.show');
Route::post('contacto', 'ContactController@send')->name('contact.send');

/**
 * =======
 * VIRALS
 * =======
 */

Route::get('chris-y-beli', 'ViralController@chris')->name('virals.chris-y-beli');