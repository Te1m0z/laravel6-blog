<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 *      Namespace*
 * route -- Blog -------------
 *       |    \- sub Route    |
 *       |     \- sub Route   |
 *       ---------------------
 */
Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function() {
    Route::resource('posts', 'PostController')->names('blog.posts');
});


// Admin panel
$groupData = [
    'namespace' => 'Blog\Admin',
    'prefix' => 'admin/blog'
];

Route::group($groupData, function() {
    $categoriesMethods = ['index', 'edit', 'store', 'update', 'create'];
    Route::resource('categories', 'CategoryController')
        ->only($categoriesMethods)
        ->names('blog.admin.categories');
});



