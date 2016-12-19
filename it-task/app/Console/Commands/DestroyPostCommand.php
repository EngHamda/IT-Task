<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

//My Models
use App\Post;

class DestroyPostCommand extends Command
{
    public $id;
    
    public function __construct($id)
    {
        $this->id    = $id;
    }

    public function handle()
    {
        //
        return Post::where('id', $this->id)->delete();
    }
}
