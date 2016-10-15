@extends("main")

@section('title', "| Profile")

@section('navbuttons')
    <li><a href="/posts">Home</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/contact">Contact</a></li>
@endsection

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
                            {!! Form::submit('Submit picture', ['class'=>'btn btn-primary btn-md btn-block', 'style' => 'margin-top: 15px;', 'onclick' => 'loadingStatus()']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}

                    <script>
                        function loadingStatus() {
                            var alert1 = document.getElementById("alert1");
                            if (alert1 === null) {
                                document.getElementById("loading").innerHTML = "<div class='alert alert-info'>Loading. Please wait while your image is being processed</div>";
                            }
                            alert1.innerHTML = "<div class='alert alert-info'>Loading. Please wait while your image is being processed</div>";
                        }
                    </script>

                    <div id="loading"></div>

                    @if(Session::has('message'))
                        @if(Session::get('message') === 'No image is selected.')
                            <div id="alert1">
                                <div class="alert alert-danger">
                                    {{ Session::get('message') }}
                                </div>
                            </div>
                        @else
                            <div id="alert1">
                                <div class="alert alert-success">
                                    {{ Session::get('message') }}
                                </div>
                            </div>
                        @endif
                    @endif

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

                </div>
            </div>
        </div>
    </div>

@endsection

