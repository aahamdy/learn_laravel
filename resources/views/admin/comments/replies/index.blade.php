@extends('layouts.admin')

@section('content')

<h1>Comments</h1>



<table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Author</th>            
        <th>Email</th>
        <th>Body</th>
        <th>Created at</th>
      </tr>
    </thead>
    <tbody>

    @if($replies)
        @foreach($replies as $reply)
            <tr>
                <td>{{$reply->id}}</td>
                <td>{{$reply->author}}</td>
                <td>{{$reply->email}}</td>
                <td>{{$reply->body}}</td>
                <td>{{$reply->created_at}}</td>
                <td><a href="{{route('home.post', $reply->comment->post->id)}}">View Post</a></td>
                <td>
                    @if($reply->is_active == 1)
                    {!! Form::open(['method'=>'PATCH', 'action'=> ['CommentRepliesController@update', $reply->id]]) !!}
                    
                        <input type="hidden" name="is_active" value="0">

                            <div class="form-group">
                                {!! Form::submit('Un-Approve', ['class'=>'btn btn-danger']) !!}
                            </div>
                    
                    {!! Form::close() !!}
                    
                    @else

                    {!! Form::open(['method'=>'PATCH', 'action'=> ['CommentRepliesController@update', $reply->id]]) !!}
                    
                        <input type="hidden" name="is_active" value="1">

                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                            </div>
                    
                        {!! Form::close() !!}

                    @endif
                </td>

                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=> ['CommentRepliesController@destroy', $reply->id]]) !!}
                
                            <div class="form-group">
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            </div>
                    
                    {!! Form::close() !!}
                </td>

            </tr>
        @endforeach

    @endif

    </tbody>
  </table>


@endsection