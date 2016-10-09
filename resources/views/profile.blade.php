@extends("main")

@section('title', "| Profile")

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">


                    <img src ="/uploads/avatars/ {{$user->avatar}}" style="width: 150px;height: 150px;float: left;-webkit-border-radius: ;-moz-border-radius: ;border-radius: 50%;margin-right: 25px;">
                    <h2>{{$user->name}}'s Profile</h2>
                    <form enctype="multipart/form-data" action="/profile" method="POST">
                        <label>
                            Update Profile Picture
                        </label>
                        <input type="file" name="avatar">
                        <input type="hidden" anem="_token" value="{{csrf_token()}}">
                        <input type="Submit" class="pull-right btn btn-sm btn-primary">
                    </form>


                    <h1>Edit Profile: {{$user->name}}</h1>
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