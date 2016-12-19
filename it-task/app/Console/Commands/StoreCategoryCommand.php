<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

//My Models
use App\Category;

class StoreCategoryCommand extends Command
{
    public $slug;
    public $ename;
    public $aname;

    public function __construct($slug, $ename, $aname)
    {
        $this->slug  = $slug;
        $this->ename = $ename;
        $this->aname = $aname;
    }

    public function handle()
    {
        //
        return Category::create([
            'slug'  => $this->slug,
            'ename' => $this->ename,
            'aname' => $this->aname
        ]);
    }
}
