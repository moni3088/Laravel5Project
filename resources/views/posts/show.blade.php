@extends("main")

@section('title', "| Home")

@section('navbuttons')
    <li class="active"><a href="/">Home</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/contact">Contact</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            {!!Form::model($post, ['route'=> ['posts.destroy',$post->id], 'method'=>'DELETE'])!!}
                <div class="post">
                    <h2>{{$post->title}}</h2>
                    <p class="text-muted">Posted by: <span style="font-style: italic">{{$author}}</span> | Created at: {{$post->created_at}} | Updated at: {{$post->updated_at}}</p>
                    <p style="word-break: break-all;">{{$post->body}}</p>
                </div>
            {!!Form::submit('Delete', ['class'=>'btn btn-danger'])  !!}
            {!! Form::close() !!}
                <hr>
        </div>

        <div class="col-md-3 col-md-offset-1">
            <h2>Sidebar</h2>
        </div>
    </div>

@endsection