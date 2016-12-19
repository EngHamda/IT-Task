<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

//My Models
use App\Category;

class DestroyCategoryCommand extends Command
{
    public $id;
    
    public function __construct($id)
    {
        $this->id    = $id;
    }

    public function handle()
    {
        //
        return Category::where('id', $this->id)->delete();
    }
}
