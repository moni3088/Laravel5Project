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

                <div class="post">
                    <h2>{{$article->title}}</h2>
                    <p class="text-muted">Posted by: <span style="font-style: italic">{{$article->author}}</span> | Created at: {{$article->created_at}} | Updated at: {{$article->updated_at}}</p>
                    <p style="word-break: break-all;">{{$article->body}}</p>
                </div>

                <hr>
        </div>

        <div class="col-md-3 col-md-offset-1">
            <h2>Sidebar</h2>
        </div>
    </div>

@endsection