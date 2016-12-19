<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

//My Models
use App\Category;

class UpdateCategoryCommand extends Command
{
    public $id;
    public $slug;
    public $ename;
    public $aname;

    public function __construct($id, $slug, $ename, $aname)
    {
        $this->id    = $id;
        $this->slug  = $slug;
        $this->ename = $ename;
        $this->aname = $aname;
    }

    public function handle()
    {
        //
        return Category::where('id', $this->id)->update([
                                                    'slug'  => $this->slug,
                                                    'ename' => $this->ename,
                                                    'aname' => $this->aname
                                                    ]);
    }
}
