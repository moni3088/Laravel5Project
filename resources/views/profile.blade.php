@extends("main")

@section('title', "| Profile")

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    {!! Form::open(['route' => 'profile.update_avatar', 'method' => 'POST', 'files' => true ]) !!}
                    <div class="form-group">
                        <h1>Edit Profile: {{$user->name}}</h1>
                        <hr>
                        <div class="media" style="">
                            <div class="media-left ">
                                <img src="/uploads/avatars/{{$user->avatar}}" class="media-object">
                            </div>
                            <div style="margin-left: 10px;" class="media-body media-middle">
                                {!! Form::label('picture', 'Update profile picture: ') !!}
                                <label class="btn btn-default btn-file">
                                    Browse {!! Form::file('avatar', ['class' => 'btn btn-file', 'style' => 'display:none'])!!}
                                </label>
                            </div>
                            {!! Form::submit('Submit picture', ['class'=>'btn btn-primary btn-md btn-block', 'style' => 'margin-top: 15px;']) !!}
                        </div>
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
                    <button type="button" class="btn btn-default btn-block" onclick="window.location='{{route("profile.make.pdf")}}'">PDF download</button>

                    {!! Form::close() !!}

                    {{--{!!Form::model($user ['route'=> ['profile.make.pdf'], 'method'=>'GET'])!!}--}}
                    {{--{!!Form::submit('DownloadPDF', ['class'=>'btn btn-primary btn-lg btn-block'])  !!}--}}
                    {{--{!! Form::close() !!}--}}

                    @include('errors.list')
                    {{--{{var_dump($errors)}}--}}

                    @if(Session::has('message'))
                        @if(Session::get('message') === 'No image is selected.')
                            <div class="alert alert-danger">
                                {{ Session::get('message') }}
                            </div>
                        @else
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                     @endif
                </div>
            </div>
        </div>
    </div>

@endsection

