@extends('layouts.admin')

@section('content')

<h1>Edit User</h1>

{!! Form::model($user, ['method'=>'PATCH', 'action'=> ['AdminUserController@update', $user->id], 'files'=>true]) !!}

    <div class="col-sm-3">
            <img class="img-responsive img-rounded" src="{{$user->photo ? URL::to('/') . $user->photo->file : 'http://via.placeholder.com/350x150'}}" alt="test" >
    </div>

    <div class="col-sm-9">
            <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
            
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email', null, ['class'=>'form-control']) !!}
                </div>
            
                <div class="form-group">
                    {!! Form::label('password', 'Password:') !!}
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                </div>
            
                <div class="form-group">
                        {!! Form::label('photo_id', 'Image:') !!}
                        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                    </div>
            
                <div class="form-group">
                    {!! Form::label('role_id', 'Role:') !!}
                    {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
                </div>
            
                <div class="form-group">
                    {!! Form::label('is_active', 'Status:') !!}
                    {!! Form::select('is_active', [1 => 'Active', 0 => 'Not Active'], null, ['class'=>'form-control']) !!}
                </div>
            
                <div class="form-group">
                    {!! Form::submit('Edit User', ['class'=>'btn btn-primary']) !!}
                </div>
                
    </div>

{!! Form::close() !!}


{!! Form::open(['method' => 'DELETE', 'action'=> ['AdminUserController@destroy', $user->id]]) !!}

    {!! Form::submit('Delete User' , ['class' => 'btn btn-danger']) !!}

{!! Form::close() !!}

@include('includes.form_error')


@endsection