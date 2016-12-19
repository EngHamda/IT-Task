<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

//My Models
use App\User;

class UpdateUserCommand extends Command
{
    public $id;
    public $fname;
    public $lname;
    public $email;

    public function __construct($id, $fname, $lname, $email)
    {
        $this->id     = $id;
        $this->fname  = $fname;
        $this->lname  = $lname;
        $this->email  = $email;
    }

    public function handle()
    {
        //
        return User::where('id', $this->id)->update([
                                                    'fname' => $this->fname,
                                                    'lname' => $this->lname,
                                                    'email' => $this->email
                                                    ]);
    }
}
