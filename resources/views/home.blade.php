@extends('layouts.app')

@section('content')
<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Tell the world your story!</h1>
        <p>Behind each person there is an unkown story which everyone should know about. Meet a new story or tell your own! The sky is the limit!</p>
        <p><a class="btn btn-primary btn-lg" href="/stories/create" role="button">Publish my story &raquo;</a></p>
      </div>
    </div>

    <div class="container">
        
            <div class="row">
                <div style="margin-bottom:30px" class="col-md-12">
                    <h1 class="display-4">Top liked stories</h1>
                </div>
                        @if(count($stories) > 0)
                            @foreach($stories as $story)
                                <div class="col-md-4">
                                    <h2 style="font-size:40px" class="display-4">{{$story->title}}</h2>
                                    <p>{!!str_limit($story->body,100)!!}</p>
                                    <p><i style="color:#e74c3c" class="fa fa-heart"></i> {!!$story->likes!!}
                                    <p><a class="btn btn-primary" href="/stories/{{$story->id}}" role="button">Read More &raquo;</a></p>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12">
                                <h6>No stories found</h6>
                            </div>
                        @endif
            </div>

      <hr>
@endsection