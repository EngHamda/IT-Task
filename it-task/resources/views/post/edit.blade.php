@extends('layouts.main')
@section('title','Edit Post')
@section('content-header','Edit Post')
@section('content')
    <!--  -->
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="error">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>

            {!! Form::open(array('action' => ['PostController@update', 
                                                $locale, $post->id], 
                                 'method' => 'PUT', 
                                 'enctype' => 'multipart/form-data')) !!}

            <div>
                {!! Form::label('etitle', 'English Title') !!}
                {!! Form::text('etitle', $value = $post->title) !!}
            </div>
            <br>
            <div>
                {!! Form::label('atitle', 'Arabic Title') !!}
                {!! Form::text('atitle', $value = $post->translate('ar')->title) !!}
            </div>
            <br>
            <div>
                {!! Form::label('edescription', 'English Description') !!}
                {!! Form::textarea('edescription', $value = $post->description) !!}
            </div>
            <br>
            <div>
                {!! Form::label('adescription', 'Arabic Description') !!}
                {!! Form::textarea('adescription', $value = $post->translate('ar')->description) !!}
            </div>
            <br>
            <div>
                @if(!empty($categories))
                    {!! Form::label('category_id', 'Category') !!}
                    {!! Form::select('category_id', $categories, $post->category_id) !!}
                @endif
            </div>
            <br>
            <div>
                {!! Form::label('image', 'Image') !!}
                {!! Form::file('image') !!}
            </div>
            <br>
            <div>
                {!! Form::submit('Update Post') !!}
                {!! Form::reset('Cancel') !!}
            </div>
            {!! Form::close() !!}
        </div>
        <a href="/{{$locale}}/dashboard" class="btn btn-info">Dashboard</a>
    </div>
    <!-- `image`, `etitle`, `atitle`, `edescription`, `adescription`, `category_id` -->
@stop