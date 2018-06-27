@extends('layouts.admin')

@section('content')

<h1>Edit Categories</h1>

    {!! Form::model($category, ['method'=>'PATCH', 'action'=> ['AdminCategoriesController@update', $category->id]]) !!}
    
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
            <div class="form-group col-sm-6">
                {!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
            {!! Form::open(['method' => 'DELETE', 'action'=> ['AdminCategoriesController@destroy', $category->id]]) !!}
            {!! Form::submit('Delete Category' , ['class' => 'btn btn-danger col-sm-2 pull-right']) !!}
        {!! Form::close() !!}
    
@endsection 