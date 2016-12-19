@extends('layouts.main')
@section('title','Create Category')
@section('content-header','Create Category')
@section('content')
    <!--  -->
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="error">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
            
            {!! Form::open(array('action' => ['CategoryController@store', $locale])) !!}
            <div>
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug') !!}
            </div>
            <br>
            <div>
                {!! Form::label('ename', 'English Name') !!}
                {!! Form::text('ename') !!}
            </div>
            <br>
            <div>
                {!! Form::label('aname', 'Arabic Name') !!}
                {!! Form::text('aname') !!}
            </div>
            <br>
            <div>
                {!! Form::submit('Add Category') !!}
                {!! Form::reset('Cancel') !!}
            </div>
            {!! Form::close() !!}
        </div>
        <a href="/{{$locale}}/dashboard" class="btn btn-info">Dashboard</a>
    </div>
    
@stop