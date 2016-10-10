@extends("main")

@section('title', "| Home")

@section('navbuttons')
    <li class="active"><a href="/">Home</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/contact">Contact</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="">
            <div class="col-md-12" style="padding-bottom: 10px;">
                <h1>{{$post->title}}</h1>
                <hr>
            </div>
            {!!Form::model($post, ['route'=> ['posts.destroy',$post->id], 'method'=>'DELETE'])!!}
            <div class="col-md-2 text-muted" style="text-transform: uppercase; border-right: solid lightgray 0.5px;">
                <p>Posted by: <span style="font-style: italic">{{$author}}</span></p>
                <p>Created at:</p>
                <p>|{{$post->created_at}}|</p>
                <p>Updated at:</p>
                <p>|{{$post->updated_at}}|</p>
                {!!Form::submit('Delete', ['class'=>'btn btn-danger btn-block'])  !!}
                <button type="button" class="btn btn-default btn-block"
                        onclick="window.location='{{ route("posts.edit", $post->id)}}'">EDIT
                </button>
            </div>
            <div class="col-md-10" style=" ">
                <div class="post">
                    @if(isset($post->image))
                        <img src="/uploads/PostImages/{{$post->image}}" class="img-rounded img-responsive"
                             style=" padding: 0px 0 20px 0;">
                    @endif
                    <p style="padding: 0px 0px 20px 5px">{{$post->body}}</p>
                </div>
            </div>
            {!! Form::close() !!}
            <div class="col-md-12" style="margin: 10px 0px 20px 0px;">
                <hr>
            </div>
        </div>


    </div>

@endsection