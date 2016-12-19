<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;
use App\Category;
use App\Post;

class DashboardController extends Controller
{
    //
    public function index($locale)
    {
        //
        // $heading 	= array('Users', 'Categories', 'Posts');
        // if (empty($locale)) {
        //     //redirect to en /dashboard
        //     // $locale = 'en';
        //     app()->setLocale('en');        
        // }
        app()->setLocale($locale);
        $users		= User::all('id', 'fname', 'lname', 'email');
        $categories	= Category::all();
        $posts 		= Post::all();
        // $heading 	= 'Categories';
        // return $categories;
        return view('dashboard', array('users' => $users, 
        							   'categories' => $categories, 
        							   'posts' => $posts,
                                       'locale' => $locale )); 
        							   // 'heading' => $heading )); 
    }
}
