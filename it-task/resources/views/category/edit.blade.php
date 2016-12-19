@extends('layouts.main')
@section('title','Edit Category')
@section('content-header','Edit Category')
@section('content')
    <!--  -->
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="error">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
            
            {!! Form::open(array('action' => ['CategoryController@update', 
                                                $locale, 
                                                $category->id],
                                 'method' => 'POST')) !!}

            <div>
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', $value = $category->slug) !!}
            </div>
            <br>
            <div>
                {!! Form::label('ename', 'English Name') !!}
                {!! Form::text('ename', $value = $category->name) !!}
            </div>
            <br>
            <div>
                {!! Form::label('aname', 'Arabic Name') !!}
                {!! Form::text('aname', $value = $category->translate('ar')->name) !!}
            </div>
            <br>
            <div>
                {!! Form::submit('Update Category') !!}
                {!! Form::reset('Cancel') !!}
            </div>
            {!! method_field('PUT') !!}
            {!! Form::close() !!}
        </div>
        <a href="/{{$locale}}/dashboard" class="btn btn-info">Dashboard</a>
    </div>
    
@stop