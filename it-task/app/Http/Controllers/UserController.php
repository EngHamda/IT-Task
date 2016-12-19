<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//MyRequests
use App\Http\Requests;
use App\Http\Requests\UpdateUserRequest;

//MyCommand
use App\Console\Commands;
use App\Console\Commands\UpdateUserCommand;
use App\Console\Commands\DestroyUserCommand;

use App\User;


class UserController extends Controller
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
        //NOT used
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //NOT used
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //NOT used
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //NOT used
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('user.edit', array('user' => $user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        //
        // Get Inputs
        //'fname', 'lname', 'email'
        $fname  = $request->input('fname');
        $lname  = $request->input('lname');
        $email  = $request->input('email');
        
        //Command
        $command = new UpdateUserCommand($id, $fname, $lname, $email);
        $this->dispatch($command);
        return redirect('dashboard')
                ->with('message','User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //Command
        $command = new DestroyUserCommand($id);
        $this->dispatch($command);
        return redirect('dashboard')
                ->with('message','User Removed');
    }
}
