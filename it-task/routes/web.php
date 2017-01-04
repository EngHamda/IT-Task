<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('/login');
});

Route::resource('{locale}/dashboard', 'DashboardController', ['only' => ['index']]);

Route::resource('{locale}/dashboard/category', 'CategoryController');

Route::resource('{locale}/dashboard/category/post', 'PostController');
Route::get('{locale}/dashboard/category/{id}/post', 'PostController@insert');

// Authentication 
Auth::routes();
// Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('logout', function (){
Auth::logout();
return redirect('/login');
});

Route::resource('user', 'UserController');

/*
//create category
use App\Category;
Route::get('{locale}/create', function($locale) {

    $category = new Category();
    $category->slug = 'sport';
    $category->save();
    $locale = ['en', 'ar'];
    // foreach (['en', 'ar'] as $locale) {
        $category->translateOrNew($locale[0])->name = "name rr";
        $category->translateOrNew($locale[1])->name = "name xx";
    // }

    $category->save();

    echo 'Created an article with some translations!';
});

//show category
Route::get('a/{locale?}', function($locale) {
	//if local=null;set $local='en'
   app()->setLocale($locale);

   $category = Category::first();
   return $category->name;

   // return view('article')->with(compact('article'));
});

/*************************************************

Route::get('user/{name?}', function ($name = null) {
    return $name;
});

Route::get('user/{name?}', function ($name = 'John') {
    return $name;
});


*/