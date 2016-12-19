@extends('layouts.main')
@if($post)
    @section('title', $post->title)
    @section('content-header',  $post->title)
    @section('content')
        <div class="panel panel-default">
            <div class="panel-body">
                @if(!empty($post->image))
                    <div class="row">
                        <img src="/images/{{ $post->image }}">
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->description }}</p>
                    </div><!--./col -->
                </div><!--./row-->
            </div><!--./panel-body -->
        </div><!--./panel-->
        <a href="/{{$locale}}/dashboard/category/{{ $post->category->id }}" class="btn btn-info">
            {{ trans('language.Back_to_Category') }}
            <!-- Back to {{--{{ $post->category->slug }}--}} Category -->
        </a>
    @stop
@endif