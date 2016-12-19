<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

//My Models
use App\User;

class DestroyUserCommand extends Command
{
    public $id;
    
    public function __construct($id)
    {
        $this->id    = $id;
    }

    public function handle()
    {
        //
        return User::where('id', $this->id)->delete();
    }
}
