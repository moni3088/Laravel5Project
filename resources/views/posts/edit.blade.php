@extends('main')

@section('title', '| Create a new blog post')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1>Edit post: {{$post->title}}</h1>
                    <hr>

                    {!!Form::model($post, ['route'=> ['posts.update',$post->id], 'method'=>'PATCH'])!!}
                        <div class="form-group">
                            {!! Form::label('title', 'Title: ') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('body', 'Body: ') !!}
                            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                        </div>
                    {!!Form::submit('Update', ['class'=>'btn btn-primary btn-lg btn-block'])  !!}
                    {!! Form::close() !!}

                    @include('errors.list')
                    {{--{{var_dump($errors)}}--}}
                </div>
            </div>﻿

        </div>
    </div>

@endsection