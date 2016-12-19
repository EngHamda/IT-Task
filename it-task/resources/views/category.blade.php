@extends('layouts.main')
@if($category)
    @section('title', $category->slug)
    @section('content-header',  $category->slug)
@endif
<!-- if posts is found-->
@if($posts)
    @section('content')
        <p>
            <a href="/{{$locale}}/dashboard" class="btn btn-info">
                {{ trans('language.Back_to_Dashboard') }}
            </a>
        </p>
        <p><a href="/{{$locale}}/dashboard/category/{{$category->id}}/post" class="btn btn-info">{{ trans('language.Create_New_Post') }}</a></p>
        <!-- if is null posts -->
        @if($posts->isEmpty())
            <p> {{ trans('language.No_Posts_in_This_Category')}}. </p>
        @else
            @foreach($posts as $key => $post)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>{{ $post->title }}</h3>
                                <p> 
                                    {{ $post->description }}
                                    <a href="/{{$locale}}/dashboard/category/post/{{ $post->id}}" >
                                        {{ trans('language.read_more') }} 
                                    </a>
                                </p>
                            </div><!--./col -->
                        </div><!--./row-->
                    </div><!--./panel-body -->
                </div><!--./panel-->
            @endforeach
            {{ $posts->links() }}
        @endif
    @stop
@endif