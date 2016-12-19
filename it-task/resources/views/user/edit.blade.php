@extends('layouts.main')
@section('title','Edit User')
@section('content-header','Edit User')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="error">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
            {!! Form::open(array('action' => ['UserController@update', 
                                              $user->id],
                                 'method' =>'PUT')) !!}
            {{ csrf_field() }}
            <div>
                {!! Form::label('fname', 'First Name') !!}
                {!! Form::text('fname', $value = $user->fname) !!}
            </div>
            <br>
            <div>
                {!! Form::label('lname', 'Last Name') !!}
                {!! Form::text('lname', $value = $user->lname) !!}
            </div>
            <br>
            <div>
                {!! Form::label('email', 'E-Mail Address') !!}
                {!! Form::text('email', $value = $user->email) !!}
            </div>
            <br>
            <div>
                {!! Form::submit('Update User') !!}
                {!! Form::reset('Cancel') !!}
            </div>
            {!! Form::close() !!}
        </div>
        <a href="/dashboard" class="btn btn-info">Dashboard</a>
    </div>
@stop