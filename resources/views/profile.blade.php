@extends("main")

@section('title', "| Profile")

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
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