@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <div class="col-md-12">
            <h1 class="display-4">Bored?</h1>
            <h3 style="font-size:30px" class="display-4">Take a look at the following story we had chosen for you.</h3>
        </div>
        <br>
        <div class="col-md-12">
            @foreach($story as $object)
                <h3>{!!$object->title!!}</h3>
                <p>{!!str_limit($object->body,100)!!}</p>
                <p><i style="color:#e74c3c" class="fa fa-heart"></i> {!!$object->likes!!}
                <p><a class="btn btn-primary" href="/stories/{{$object->id}}" role="button">Read More &raquo;</a></p>
            @endforeach
        </div>
                

      <hr>
@endsection