@extends('main')

@section('title', '| Create a new blog post')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1>Edit post: {{$post->title}}</h1>
                    <hr>

                    {!!Form::model($post, ['route'=> ['posts.update',$post->id], 'method'=>'PATCH', 'files' => true])!!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title: ') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('body', 'Body: ') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('image', 'Add post header image: ') !!}
                        {!! Form::file('postImg')!!}
                    </div>
                    <button type="button" class="btn btn-default btn-block" style="margin-bottom: 20px;"
                            onclick="window.location='{{ route("posts.imageDelete", $post->id) }}'">Delete image
                    </button>

                    {!!Form::submit('Update post', ['class'=>'btn btn-primary btn-lg btn-block'])  !!}

                    {!! Form::close() !!}

                    {!!Form::model($post, ['route'=> ['posts.destroy',$post->id], 'method'=>'DELETE'])!!}
                    {!!Form::submit('Delete post', ['class'=>'btn btn-danger btn-lg btn-block', 'style' => 'margin-top:10px;'])  !!}
                    {!! Form::close() !!}

                    @include('errors.list')
                    {{--{{var_dump($errors)}}--}}
                </div>
            </div>
            ﻿

        </div>
    </div>

@endsection