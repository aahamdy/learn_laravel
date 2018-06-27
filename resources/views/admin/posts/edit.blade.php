@extends('layouts.admin')

@section('content')

<h1>Edit Post</h1>

{!! Form::model($post, ['method'=>'PATCH', 'action'=> ['AdminPostsController@update', $post->id], 'files'=>true]) !!}

<div class="col-sm-3">
    <img class="img-responsive img-rounded" src="{{$post->photo ? URL::to('/') . $post->photo->file : 'http://via.placeholder.com/350x150'}}" alt="test" >
</div>
<div class="col-sm-9">
    <div class="form-group ">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Image:') !!}
        {!! Form::file('photo_id', null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Body:') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Edit Post', ['class'=>'btn btn-primary col-sm-2']) !!}
    </div>
</div>
{!! Form::close() !!}

{!! Form::open(['method' => 'DELETE', 'action'=> ['AdminPostsController@destroy', $post->id]]) !!}

    {!! Form::submit('Delete Post' , ['class' => 'btn btn-danger col-sm-2 pull-right']) !!}

{!! Form::close() !!}


@include('includes.form_error')


@endsection