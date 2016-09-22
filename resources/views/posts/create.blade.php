@extends('main')

@section('title', '| Create a new blog post')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1>Create New Post</h1>
                    <hr>

                    {{--<form method="POST">--}}
                    <form method="POST" action="/posts">

                    <div class="form-group">
                            <label name="title">Title:</label>
                            <input id="title" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label name="body">Post Body:</label>
                            <textarea id="body" name="body" rows="10" class="form-control"></textarea>
                        </div>
                        <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                    @include('errors.list')
                    {{--{{var_dump($errors)}}--}}
                </div>
            </div>﻿

        </div>
    </div>

@endsection