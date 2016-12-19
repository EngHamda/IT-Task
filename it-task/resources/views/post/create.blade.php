@extends('layouts.main')
@section('title','Create Post')
@section('content-header','Create Post')
@section('content')
    <!--  -->
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="error">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
            
            {!! Form::open(array('action' => ['PostController@store', $locale], 
                                 'enctype' => 'multipart/form-data')) !!}

            <div>
                {!! Form::label('etitle', 'English Title') !!}
                {!! Form::text('etitle') !!}
            </div>
            <br>
            <div>
                {!! Form::label('atitle', 'Arabic Title') !!}
                {!! Form::text('atitle') !!}
            </div>
            <br>
            <div>
                {!! Form::label('edescription', 'English Description') !!}
                {!! Form::textarea('edescription') !!}
            </div>
            <br>
            <div>
                {!! Form::label('adescription', 'Arabic Description') !!}
                {!! Form::textarea('adescription') !!}
            </div>
            <br>
            <div>
                @if(!empty($categories))
                    {!! Form::label('category_id', 'Category') !!}
                    {!! Form::select('category_id', $categories) !!}
                @endif
                @if(!empty($category))
                    {!! Form::label('category_id', 'Category') !!}
                    {!! Form::select('category_id', 
                                    [$category->id => $category->slug], 
                                     $category->id) !!}
                @endif
            </div>
            <br>
            <div>
                {!! Form::label('image', 'Image') !!}
                {!! Form::file('image', $attributes = []) !!}
            </div>
            <br>
            <div>
                {!! Form::submit('Add Post') !!}
                {!! Form::reset('Cancel') !!}
            </div>
            {!! Form::close() !!}
        </div>
        <a href="/{{$locale}}/dashboard" class="btn btn-info">Dashboard</a>
    </div>
    <!-- `image`, `etitle`, `atitle`, `edescription`, `adescription`, `category_id` -->
@stop