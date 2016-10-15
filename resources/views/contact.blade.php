@extends('main')

@section('title', "| Contact")

@section('navbuttons')
    <li><a href="posts">Home</a></li>
    <li><a href="about">About</a></li>
    <li class="active"><a href="contact">Contact</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Contact Me</h1>
            <hr>
            {!! Form::open(['action' => 'PagesController@sendContact']) !!}
            <div class="form-group">
                {!! Form::label('email', 'E-mail: ') !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('subject', 'Subject: ') !!}
                {!! Form::text('subject', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('message', 'Message: ') !!}
                {!! Form::textarea('message', null, ['class' => 'form-control', 'size'=>'30x5']) !!}
            </div>
            {!!Form::submit('Send message', ['class'=>'btn btn-success'])  !!}
            {!! Form::close() !!}

            @include('errors.list')
            {{--{{var_dump($errors)}}--}}

            @if (session('message'))
                <script>
                    alert('{{ session('message') }}');
                </script>
            @endif

        </div>
    </div>

@endsection