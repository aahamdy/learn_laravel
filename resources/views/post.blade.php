@extends('layouts.blog-post') @section('content')


<!-- Blog Post -->

<!-- Title -->
<h1>{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
    by <a href="#">{{$post->user->name}}</a>
</p>

<hr>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

<hr>

<!-- Preview Image -->
<img class="img-responsive" src="{{ URL::to('/').$post->photo->file}}" alt="">

<hr>

<!-- Post Content -->
<p>{{$post->body}}</p>
<hr>

<!-- Blog Comments -->

@if(Auth::check())

<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    {!! Form::open(['method'=>'POST', 'action'=> 'PostCommentsController@store']) !!}

        <input type="hidden" name="post_id" value="{{$post->id}}">

        <div class="form-group ">
            {!! Form::label('body', 'Body:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>5]) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add Comment', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
    

</div>

@endif

<hr>

<!-- Posted Comments -->

@if(count($comments) > 0)

    @foreach($comments as $comment)
        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img height="64" class="media-object" src="{{URL::to('/') .$comment->photo}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$comment->author}}
                    <small>{{$comment->created_at->diffForHumans()}}</small>
                </h4>
                <p>{{$comment->body}}</p>

                @if(count($comment->replies) > 0)
                    @foreach($comment->replies as $reply)
                        @if($reply->is_active == 1)
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img height="64" class="media-object" src="{{URL::to('/') .$reply->photo}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$reply->author}}
                                    <small>{{$reply->created_at->diffForHumans()}}</small>
                                </h4>
                                <p>{{$reply->body}}</p><br>
                            </div>
                        </div>  
                    <!-- End Nested Comment -->
                    @endif
                    @endforeach
                    
                @endif      
                {!! Form::open(['method'=>'POST', 'action'=> 'CommentRepliesController@store']) !!}
                
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                
                        <div class="form-group ">
                            {!! Form::label('body', 'Body:') !!}
                            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>5]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Add Comment', ['class'=>'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}          
            </div>
            
        </div>
        
    @endforeach
@endif


@endsection