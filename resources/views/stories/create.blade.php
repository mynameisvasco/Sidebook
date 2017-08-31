@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <div class="col-md-12">
             <h1 class="display-4">Tell us your story</h1>
        </div>

        <br>

                    {!! Form::open(['action' => 'StoriesController@store','method' => 'POST']) !!}
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('title','Title')}}
                                {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Story title'])}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('body','Story body')}}
                                {{Form::textarea('body','',['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Write your story here...'])}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}


      <hr>
@endsection