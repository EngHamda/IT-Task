@extends('layouts.main')
@section('title','Login Page')
@section('content-header','Login Page')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="error">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
            {!! Form::open(array('url' => 'login','method' =>'POST')) !!}
            {{ csrf_field() }}
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
            <!-- <div> -->
                {{-- {!! Form::checkbox('remember', 'Remember Me', true) !!}
                {!! Form::label('remember', 'Remember Me') !!} --}}
            <!-- </div>
            <br> -->
            <div>
                {!! Form::submit('Login') !!}
                {!! Form::reset('Cancel') !!}
            </div>
            {!! Form::close() !!}
            <br>
            <div><a href="/register" class="btn btn-info">REGISTER</a></div>
        </div>
    </div>
@stop