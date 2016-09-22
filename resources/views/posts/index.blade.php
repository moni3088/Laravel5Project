@extends("main")

@section('title', "| Home")

@section('navbuttons')
    <li class="active"><a href="/">Home</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/contact">Contact</a></li>
@endsection

@section('content')
    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--<div class="jumbotron">--}}
    {{--<h1>Welcome!</h1>--}}
    {{--<p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my popular post!</p>--}}
    {{--<p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <!-- end of header .row -->

    <div class="row">
        <div class="col-md-8">
            @foreach($articles as $article)
                <div class="post">
                    <h3>{{$article->title}}</h3>
                    <p class="text-muted">Posted by: <span style="font-style: italic">{{$article->author}}</span></p>
                    <p>{{str_limit($article->body, 50)}}</p>
                    <a href="{{url("/posts", $article->id)}}" class="btn btn-primary">Read More</a>

                </div>
                <hr>
            @endforeach
        </div>

        <div class="col-md-3 col-md-offset-1">
            <h2>Sidebar</h2>
        </div>
    </div>

@endsection