<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//MyRequests
use App\Http\Requests;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
/*
//MyCommand
use App\Console\Commands;
use App\Console\Commands\StoreCategoryCommand;
use App\Console\Commands\UpdateCategoryCommand;
use App\Console\Commands\DestroyCategoryCommand;
*/
use App\Http\Controllers\Controller;

use App\Category;
use App\Post;

class CategoryController extends Controller
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
        //not used till now
        $categories=Category::all();
        // return $categories;
        return view('dashboard', array('categories' => $categories )); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($locale)
    {
        //
        return view('category.create', array('locale' => $locale ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($locale,StoreCategoryRequest $request)
    {
        //
        //Get Inputs
        $slug  = $request->input('slug');
        $ename = $request->input('ename');
        $aname = $request->input('aname');
        
        //Command
        // $command = new StoreCategoryCommand($slug, $ename, $aname);
        // $this->dispatch($command);
        $category = new Category();
        $category->slug = $slug;
        $category->save();
        $lang = ['en', 'ar'];
        $category->translateOrNew($lang[0])->name = $ename;
        $category->translateOrNew($lang[1])->name = $aname;
        $category->save();
        return redirect()->action('DashboardController@index', [$locale]);
        // return redirect('dashboard')
        //         ->with('message','Category Added');
        
        // return 'Category Added';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale, $id)
    {
        app()->setLocale($locale);
        //find all posts in specific category
            //$postss = DB::table('posts')->where('category_id',1)->select('etitle','edescription')->get();
        // $posts = category::find($id)->posts;
            //like $posts = category::where()->get();
        // $posts = category::find(1)->posts()->paginate(10);
        
        $posts      = category::find($id)->posts()->simplePaginate(10);
        $category   = category::find($id);//OR get id from url in view direct


        foreach ($posts as $post) {
            //get title , 10 words of description
                //description_words is an array
                //chunks is an array, has arraies each one has 10 elements
                //$words is an object has an array of 10 elements
            $description_words  = explode(" ",$post->edescription);
            $collection         = collect($description_words);
            $chunks             = $collection->chunk(10);
            $words              = array_first($chunks); 
            $littel_words       = $words->all(); //to be array
            $post->edescription = implode(" ",$littel_words); //to be string
        }

        // return $posts;
        return view('category', array('posts' => $posts, 
                                      'category' => $category, 
                                      'locale' => $locale)); 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale,$id)
    {
        //
        app()->setLocale($locale);
        $category = Category::find($id);
        return view('category.edit', array('category' => $category, 
                                           'locale' => $locale));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($locale, UpdateCategoryRequest $request, $id)
    {
        //
        //Get Inputs
        $slug  = $request->input('slug');
        $ename = $request->input('ename');
        $aname = $request->input('aname');

        //Command
        // $command = new UpdateCategoryCommand($id, $slug, $ename, $aname);
        // $this->dispatch($command);

        $category = Category::find($id);
        $lang = ['en', 'ar'];
        $category->slug=$slug;
        $category->translateOrNew($lang[0])->name=$ename;
        $category->translateOrNew($lang[1])->name=$ename;
        $category->save();

        return redirect()->action('DashboardController@index', [$locale]);
        // return redirect('dashboard')
        //         ->with('message','Category Updated');
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
        $category = Category::find($id);
        $category->delete();
        //Command
        // $command = new DestroyCategoryCommand($id);
        // $this->dispatch($command);
        return redirect()->action('DashboardController@index', [$locale]);
        // return redirect('dashboard')
        //         ->with('message','Category Removed');
    }
}
