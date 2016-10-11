@extends("main")

@section('title', "| Home")

@section('navbuttons')
    <li class="active"><a href="/posts">Home</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/contact">Contact</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(!$posts->isEmpty())
                @foreach($posts as $post)
                    <div class="post" style="border-width: 0 1px 0 1px; border-type: solid; border-color: lightgray;">
                        <h3 style="">{{$post->title}}</h3>
                        <p class="text-muted">
                            Posted by: <span
                                    style="font-style: italic">{{App\User::where('id', $post->user_id)->first()->nickname}}</span>
                        </p>
                        <p style="font-size: 1.2em">{{str_limit($post->body, 50)}}</p>
                        <a href="{{url("/posts", $post->id)}}" class="btn btn-primary" style="margin-top: 10px;">Read
                            More</a>
                    </div>
                    <hr>
                @endforeach
            @else
                <div class="alert alert-warning">
                    <p>There are no posts</p>
                </div>
            @endif
        </div>

    </div>

    @if (session('message'))
        <script>
            alert('{{ session('message') }}');
        </script>
    @endif

@endsection