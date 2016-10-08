@extends('main')

@section('title', '| Create a new blog post')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1>Create New Post</h1>
                    <hr>

                    {!! Form::open(['action' => 'PostController@store']) !!}
                        <div class="form-group">
                            {{--Creates the text label for the input--}}
                        {!! Form::label('title', 'Title: ') !!}
                            {{--Creates the input with class ‘form-control’; second value is the inputs default value, third value can be anything you want e.g. ['anything' => 'value', 'anotherattribute' => 'value']--}}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('body', 'Body: ') !!}
                            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Add Post', ['class' => 'btn btn-primary form-control']) !!}
                        </div>

                    {!! Form::close() !!}

                    @include('errors.list')
                    {{--{{var_dump($errors)}}--}}
                </div>
            </div>﻿

        </div>
    </div>

@endsection