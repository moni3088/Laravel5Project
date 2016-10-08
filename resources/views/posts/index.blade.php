@extends("main")

@section('title', "| Home")

@section('navbuttons')
    <li class="active"><a href="/posts">Home</a></li>
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
            @if(!$posts->isEmpty())
                @foreach($posts as $post)
                    <div class="post">
                        <h3>{{$post->title}}</h3>
                        <p class="text-muted">Posted by: <span style="font-style: italic">{{App\User::where('id', $post->user_id)->first()->nickname}}</span></p>
                        <p>{{str_limit($post->body, 50)}}</p>
                        <a href="{{url("/posts", $post->id)}}" class="btn btn-primary">Read More</a>
                    </div>
                    <hr>
                @endforeach
             @else
                <div class="alert alert-warning">
                    <p>There are no posts</p>
                </div>
             @endif
        </div>

        <div class="col-md-3 col-md-offset-1">
            <h2>Sidebar</h2>
        </div>
    </div>

    @if (session('message'))
        <script>
            alert('{{ session('message') }}');
        </script>
    @endif

@endsection