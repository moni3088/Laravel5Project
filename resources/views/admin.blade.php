@extends("main")

@section('title', "| Profile")

@section('navbuttons')
    <li><a href="/posts">Home</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/contact">Contact</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <h1 class="text-center">Administration panel</h1>
            <hr>
            <div class="form-group">
                {!! Form::open(['route' => ['admin.update'], 'method' => 'PATCH']) !!}
                <h2>Users:</h2>
                <p>Grant users admin permissions</p>
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID:</th>
                        <th>Name:</th>
                        <th>Nickname:</th>
                        <th>E-mail:</th>
                        <th>Created at:</th>
                        <th>Admin:</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->nickname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <input type="hidden" name="users[{{ $user->id }}][admin]" value="0">
                                {!! Form::checkbox("users[$user->id][admin]", 1, $user->admin) !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!!Form::submit('Update', ['class'=>'btn btn-primary btn-md btn-block'])  !!}
                {!! Form::close() !!}
            </div>

            @if(Session::has('message'))
                <script>
                    alert('{{ Session::get('message') }}');
                </script>
            @endif

            {{--<hr>--}}
            {{--{!!Form::model($user, ['route'=> ['profile.update', $user->id], 'method'=>'PATCH'])!!}--}}
            {{--<div class="form-group">--}}
            {{--{!! Form::label('nickname', 'Nickname: ') !!}--}}
            {{--{!! Form::text('nickname', null, ['class' => 'form-control']) !!}--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--{!! Form::label('e-mail', 'E-mail: ') !!}--}}
            {{--{!! Form::text('email', null, ['class' => 'form-control']) !!}--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--{!! Form::label('about', 'About: ') !!}--}}
            {{--{!! Form::textarea('about', null, ['class' => 'form-control', 'size'=>'30x5']) !!}--}}
            {{--</div>--}}
            {{--{!!Form::submit('Update', ['class'=>'btn btn-primary btn-lg btn-block'])  !!}--}}
            {{--{!!Form::submit('DownloadPDF', ['class'=>'btn btn-primary btn-lg btn-block'])  !!}--}}
            {{--{!! Form::close() !!}--}}

            @include('errors.list')
            {{--{{var_dump($errors)}}--}}

        </div>
    </div>

@endsection

