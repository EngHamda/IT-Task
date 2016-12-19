@extends('layouts.main')
@if($post)
    @section('title', $post->etitle)
    @section('content-header',  $post->etitle)
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
            Back to {{ $post->category->slug }} Category
        </a>
    @stop
@endif