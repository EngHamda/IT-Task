<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


// app/Post.php    
class Post extends Model
{
    //
    use \Dimsav\Translatable\Translatable;
    public $translatedAttributes = ['title','description'];
    public $translationModel = 'App\PostTranslation';

    // Model Table
    protected $table 	= 'posts';
    
    protected $fillable = ['image', 'category_id'];
    protected $hidden 	=[];
    //to access category fields
    public function category() {
        
        return $this->belongsTo('\App\Category');
    }

}

// app/PostTranslation.php
class PostTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title','description'];

}

