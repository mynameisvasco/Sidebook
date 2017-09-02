@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
            <div class="row">
                        @if(isset($story->id))
                                <div class="col-md-12">
                                    <h2>{{$story->title}}</h2>
                                </div>
                                <div class="col-md-6">
                                    <p>{!!$story->body!!}</p>
                                </div>
                                <div class="col-md-12">
                                    <p>Published on: {{$story->author}} at {{$story->created_at}} by {{$story->user->name}}</p>
                                </div>
                                <div class="col-md-12">
                                    <p><i style="color:#e74c3c" class="fa fa-heart"></i> {!!$num_likes!!}
                                </div>
                                @if(!Auth::guest())
                                    @if(Auth::user()->id == $story->user_id)
                                        <div class="col-md-1">
                                            <a href="/stories/{{$story->id}}/edit" class="btn btn-primary btn-story"><i class="fa fa-edit"></i> Edit story</a>
                                        </div>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    
                                        <div class="col-md-1">
                                            {!!Form::open(['action' => ['StoriesController@destroy', $story->id], 'method' => 'POST'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {!! Form::hidden('story_id', $story->id) !!} 
                                                {{Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-danger btn-story', 'type' => 'submit'])}}
                                            {!! Form::close() !!}
                                        </div>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    @endif
                                @endif
                                @foreach($like as $likes)
                                        @if($likes->user_id == Auth::user()->id)
                                            <div class="col-md-1">
                                                {!!Form::open(['action' => ['LikesController@unlike', $story->id], 'method' => 'POST'])!!}
                                                    {!! Form::hidden('_method', 'PUT') !!} 
                                                    {!! Form::hidden('story_id', $story->id) !!} 
                                                    {{Form::button('<i class="fa fa-heart-o"></i> Unlike', ['class' => 'btn btn-success btn-story', 'type' => 'submit'])}}
                                                {!! Form::close() !!}
                                            </div>
                                        @else
                                            <div class="col-md-2">
                                                {!!Form::open(['action' => ['LikesController@like', $story->id], 'method' => 'POST'])!!}
                                                    {!! Form::hidden('_method', 'PUT') !!}
                                                    {!! Form::hidden('story_id', $story->id) !!}   
                                                    {{Form::button('<i class="fa fa-heart"></i> Like', ['class' => 'btn btn-success btn-story', 'type' => 'submit'])}}
                                                {!! Form::close() !!}
                                            </div>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        @endif
                                    @endforeach
                                @if(empty($likes))
                                    <div class="col-md-1">
                                        {!!Form::open(['action' => ['LikesController@like', $story->id], 'method' => 'POST'])!!}
                                        {!! Form::hidden('_method', 'PUT') !!}
                                        {!! Form::hidden('story_id', $story->id) !!} 
                                        {{Form::button('<i class="fa fa-heart"></i> Like', ['class' => 'btn btn-success btn-story', 'type' => 'submit'])}}
                                        {!! Form::close() !!}
                                    </div>
                                @endif
                        @endif
            </div>

      <hr>
@endsection