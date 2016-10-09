@extends("main")

@section('title', "| Profile")

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    {{--<div>--}}
                        {{--<img src ="/uploads/avatars/ {{$user->avatar}}" style="width: 150px;height: 150px;float: left;-webkit-border-radius: ;-moz-border-radius: ;border-radius: 50%;margin-right: 25px;">--}}
                        {{--<h2>{{$user->name}}'s Profile</h2>--}}
                        {{--<form enctype="multipart/form-data" action="/profile" method="POST">--}}
                            {{--<label>--}}
                                {{--Update Profile Picture--}}
                            {{--</label>--}}
                            {{--<input type="file" name="avatar">--}}
                            {{--<input type="hidden" anem="_token" value="{{csrf_token()}}">--}}
                            {{--<input type="Submit" class="pull-right btn btn-sm btn-primary">--}}
                        {{--</form>--}}
                    {{--</div>--}}
                    {!! Form::open(['route' => 'profile.update_avatar', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files' => 'true' ]) !!}
                        <div class="form-group">
                            <h1>Edit Profile: {{$user->name}}</h1>
                            <hr>
                            <div class="media">
                                <div class="media-left">
                                    <img src="/uploads/avatars/{{$user->avatar}}" class="media-object img-rounded" style="width:210px">
                                </div>
                                <div class="media-body">
                                    {!! Form::label('picture', 'Update profile picture: ') !!}
                                    <label class="btn btn-default btn-file">
                                        Browse {!! Form::file('avatar', ['class' => 'btn btn-file', 'style' => 'display:none'])!!}
                                    </label>
                                </div>
                                {!! Form::submit('Submit picture', ['class'=>'btn btn-primary btn-md btn-block', 'style' => 'margin-top: 10px;']) !!}
                            </div>

                            {{--{!! Form::file('avatar', null, ['class' => 'form-control']) !!}--}}
                        </div>
                    {!! Form::close() !!}

                    <hr>
                    {!!Form::model($user, ['route'=> ['profile.update', $user->id], 'method'=>'PATCH'])!!}
                    <div class="form-group">
                        {!! Form::label('nickname', 'Nickname: ') !!}
                        {!! Form::text('nickname', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('e-mail', 'E-mail: ') !!}
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('about', 'About: ') !!}
                        {!! Form::textarea('about', null, ['class' => 'form-control', 'size'=>'30x5']) !!}
                    </div>
                    {!!Form::submit('Update', ['class'=>'btn btn-primary btn-lg btn-block'])  !!}
                    {!! Form::close() !!}

                    @include('errors.list')
                    {{--{{var_dump($errors)}}--}}

                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                </div>
            </div>﻿

        </div>
    </div>

@endsection