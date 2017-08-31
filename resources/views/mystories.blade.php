@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <div class="col-md-12">
            <h1 class="display-4">Your stories</h1>
            @if(count($stories) > 0)
            <table class="table table-responsive">
                <tr>
                    <th style="border-top: 0px solid rgb(233, 236, 239);">Title</th>
                    <th style="border-top: 0px solid rgb(233, 236, 239);">Edit</th>
                    <th style="border-top: 0px solid rgb(233, 236, 239);">Delete</th>
                </tr>
                @foreach($stories as $story)
                    <tr>
                        <td>{{$story->title}}</td>
                        <td><a href="/stories/{{$story->id}}/edit" class="btn btn-primary">Edit</a></td>
                        <td>
                            {!!Form::open(['action' => ['StoriesController@destroy', $story->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
            @else
                <p>You have no stories yet</p>
            @endif
        </div>
                
                

      <hr>
@endsection