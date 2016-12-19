<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


// app/Category.php
class Category extends Model
{
    //
    use \Dimsav\Translatable\Translatable;
    public $translatedAttributes = ['name'];
    public $translationModel = 'App\CategoryTranslation';

    // Model Table
    protected $table 	= 'categories';

    
    protected $fillable = ['slug'];
    protected $hidden 	=[];
    /**
     * Get the posts for the category.
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

}

// app/CategoryTranslation.php
class CategoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

}
