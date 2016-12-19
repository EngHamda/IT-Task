<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

//MyRequests
use App\Http\Requests;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
/*
//MyCommand
use App\Console\Commands;
use App\Console\Commands\StorePostCommand;
use App\Console\Commands\UpdatePostCommand;
use App\Console\Commands\DestroyPostCommand;
*/
use App\Category;
use App\Post;

//get timestamp
use Carbon\Carbon;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($locale)
    {
        //
        $categorySlugs  = array();
        $categoryIds    = array();
        $categories     = Category::all('id','slug');
        foreach ($categories as $category) {
            array_push($categorySlugs, $category->slug);
            array_push($categoryIds, $category->id);
        }
        $categoryList   = array_combine($categoryIds, $categorySlugs);
        return view('post.create', array('categories' => $categoryList, 
                                         'category' => null, 
                                         'locale' => $locale ));
    }
    public function insert($locale, $id)
    {
        //
        $category = Category::find($id);
        return view('post.create', array('category' => $category, 
                                         'categories' => null, 
                                         'locale' => $locale ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($locale, StorePostRequest $request)
    {
        //
        //Get Inputs
        //'image', 'etitle', 'atitle', 'edescription', 'adescription', 'category_id'
        $image           = $request->file('image');
        $etitle          = $request->input('etitle');
        $atitle          = $request->input('atitle');
        $edescription    = $request->input('edescription');
        $adescription    = $request->input('adescription');
        $category_id     = $request->input('category_id');
        
        //Change Image Name
        $image_filename  = $image->getClientOriginalName();
        $new_image_filename = Carbon::now()."_".$image_filename;
        $image->move(public_path().'/images/', $new_image_filename);
        
        //Command
        // $command = new StorePostCommand($new_image_filename, $etitle, $atitle, $edescription                           , $adescription, $category_id);
        // $this->dispatch($command);
        
        $post = new Post();
        $post->image = $new_image_filename;
        $post->category_id = $category_id;        
        $post->save();
        $lang = ['en', 'ar'];
        $post->translateOrNew($lang[0])->title = $etitle;
        $post->translateOrNew($lang[1])->title = $atitle;
        $post->translateOrNew($lang[0])->description = $edescription;
        $post->translateOrNew($lang[1])->description = $adescription;
        $post->save();
        return redirect()->action('DashboardController@index', [$locale]);
        // return redirect('dashboard')
        //         ->with('message','Post Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale, $id)
    {
        //
        
        app()->setLocale($locale);
        $post = post::find($id);

        // return $post;
        return view('post', array('post' => $post, 'locale' => $locale)); 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, $id)
    {
        //
        app()->setLocale($locale);
        $post = Post::find($id);
        $categorySlugs  = array();
        $categoryIds    = array();
        $categories     = Category::all('id','slug');
        foreach ($categories as $category) {
            array_push($categorySlugs, $category->slug);
            array_push($categoryIds, $category->id);
        }
        $categoryList   = array_combine($categoryIds, $categorySlugs);
        return view('post.edit', array('post' => $post, 
                                       'categories' => $categoryList, 
                                       'locale' => $locale ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($locale, UpdatePostRequest $request, $id)
    {
        //
        // Get Inputs
        //'image', 'etitle', 'atitle', 'edescription', 'adescription', 'category_id'
        $image           = $request->file('image');
        $etitle          = $request->input('etitle');
        $atitle          = $request->input('atitle');
        $edescription    = $request->input('edescription');
        $adescription    = $request->input('adescription');
        $category_id     = $request->input('category_id');
        
        //Change Image Name
        $image_filename     = $image->getClientOriginalName();
        $new_image_filename = Carbon::now()."_".$image_filename;
        $image->move(public_path().'/images/', $new_image_filename);
        
        //Command
        // $command = new UpdatePostCommand($id, $new_image_filename, $etitle, $atitle, 
        //                                  $edescription, $adescription, $category_id);
        // $this->dispatch($command);
        $post = Post::find($id);
        $post->image = $new_image_filename;
        $post->category_id = $category_id;        
        $lang = ['en', 'ar'];
        $post->translateOrNew($lang[0])->title = $etitle;
        $post->translateOrNew($lang[1])->title = $atitle;
        $post->translateOrNew($lang[0])->description = $edescription;
        $post->translateOrNew($lang[1])->description = $adescription;
        $post->save();
        
        return redirect()->action('DashboardController@index', [$locale]);
        // return redirect('dashboard')
        //         ->with('message','Post Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, $id)
    {
        //
        $post = Post::find($id);
        $post->delete();
        
        //Command
        // $command = new DestroyPostCommand($id);
        // $this->dispatch($command);
        
        // return redirect('dashboard')
        //         ->with('message','Post Removed');
        return redirect()->action('DashboardController@index', [$locale]);
    }
}
