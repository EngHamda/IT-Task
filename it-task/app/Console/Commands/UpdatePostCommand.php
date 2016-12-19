<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

//My Models
use App\Post;

class UpdatePostCommand extends Command
{
    public $id;
    public $image;
    public $etitle;
    public $atitle;
    public $edescription;
    public $adescription;
    public $category_id;

    public function __construct($id, $image, $etitle, $atitle, $edescription, $adescription, $category_id)
    {
        $this->id           = $id;
        $this->image        = $image;
        $this->etitle       = $etitle;
        $this->atitle       = $atitle;
        $this->edescription = $edescription;
        $this->adescription = $adescription;
        $this->category_id  = $category_id;
    }

    public function handle()
    {
        //
        return Post::where('id', $this->id)->update([
                                                    'image'         => $this->image,
                                                    'etitle'        => $this->etitle,
                                                    'atitle'        => $this->atitle,
                                                    'edescription'  => $this->edescription,
                                                    'adescription'  => $this->adescription,
                                                    'category_id'   => $this->category_id
                                                ]);
    }
}
