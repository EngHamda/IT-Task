@extends('layouts.main')
@section('title','Register Page')
@section('content-header','Register Page')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="error">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
            {!! Form::open(array('url' => 'register','method' =>'POST')) !!}
            {{ csrf_field() }}
            <div>
                {!! Form::label('fname', 'First Name') !!}
                {!! Form::text('fname') !!}
            </div>
            <br>
            <div>
                {!! Form::label('lname', 'Last Name') !!}
                {!! Form::text('lname') !!}
            </div>
            <br>
            <div>
                {!! Form::label('email', 'E-Mail Address') !!}
                {!! Form::text('email', null, ['placeholder' => 'user@example.com']) !!}
            </div>
            <br>
            <div>
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password') !!}
            </div>
            <br>
            <div>
                {!! Form::label('password_confirmation', 'Confirm Password') !!}
                {!! Form::password('password_confirmation') !!}
            </div>
            <br>
            <div>
                {!! Form::submit('Register') !!}
                {!! Form::reset('Cancel') !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop