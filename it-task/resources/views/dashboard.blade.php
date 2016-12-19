@extends('layouts.main')
@section('title','Dashboard')
@section('content-header','Dashboard')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Users List</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>E-Mail</th>
                                  <th>Edit User</th>
                                  <th>Delete User</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($users)
                                    @foreach($users as $key => $user)
                                        <tr>
                                            <td>{{ $user->fname }}</td>
                                            <td>{{ $user->lname }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <a href="/user/{{ $user->id}}/edit" class="btn btn-info">
                                                    Edit
                                                </a>
                                            </td>
                                            <td>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]] ) !!}
                                                {!! Form::submit('Delete', array('class'=>'btn btn-danger')) !!} 
                                                {!! Form::close() !!} 
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div><!--./table-responsive -->
                </div><!--./col -->
            </div><!--./row-->
        </div><!--./panel-body -->
    </div><!--./panel-->
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Categories List</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                  <th>Slug</th>
                                  <th>Name</th>
                                  <th>Edit Category</th>
                                  <th>Delete Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($categories)
                                    @foreach($categories as $key => $category)
                                        <tr>
                                            <td>
                                                <a href="/{{$locale}}/dashboard/category/{{ $category->id}}">
                                                    {{ $category->slug }}
                                                </a>
                                            </td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <a href="/{{$locale}}/dashboard/category/{{ $category->id}}/edit" class="btn btn-info">
                                                    Edit
                                                </a>
                                            </td>
                                            <td>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $locale, $category->id]] ) !!}
                                                {!! Form::submit('Delete', array('class'=>'btn btn-danger')) !!} 
                                                {!! Form::close() !!} 
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div><!--./table-responsive -->
                </div><!--./col -->
            </div><!--./row-->
            <a href="/{{$locale}}/dashboard/category/create" class="btn btn-info">
                Add New Category
            </a>
        </div><!--./panel-body -->
    </div><!--./panel-->
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Posts List</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                  <th>Title</th>
                                  <th>Category Slug</th>
                                  <th>Edit Post</th>
                                  <th>Delete Post</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($posts)
                                    @foreach($posts as $key => $post)
                                        <tr>
                                            <td>
                                                <a href="/{{$locale}}/dashboard/category/post/{{ $post->id}}">
                                                    {{ $post->title }}
                                                </a>
                                            </td>
                                            <td>{{ $post->category->slug }}</td>
                                            <td>
                                                <a href="/{{$locale}}/dashboard/category/post/{{ $post->id}}/edit" class="btn btn-info">
                                                    Edit
                                                </a>
                                            </td>
                                            <td>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy', 
                                                $locale, $post->id]] ) !!}
                                                {!! Form::submit('Delete', array('class'=>'btn btn-danger')) !!} 
                                                {!! Form::close() !!} 
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div><!--./table-responsive -->
                </div><!--./col -->
            </div><!--./row-->
            <a href="/{{$locale}}/dashboard/category/post/create" class="btn btn-info">
                Add New Post
            </a>
        </div><!--./panel-body -->
    </div><!--./panel-->
    <h1>{{--$heading--}}</h1>
    {{-- @if($categories) --}}
        <!-- <ul> -->
            {{-- @foreach($categories as $key => $category) --}}
                <!-- <li> -->
                    {{--$category--}}
                <!-- </li> -->
            {{-- @endforeach --}}
        <!-- </ul> -->
    {{-- @endif --}}
@stop