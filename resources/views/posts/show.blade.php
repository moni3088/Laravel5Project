@extends("main")

@section('title', "| Home")

@section('navbuttons')
    <li class="active"><a href="{{URL::to('posts')}}">Home</a></li>
    <li><a href="{{URL::to('about')}}">About</a></li>
    <li><a href="{{URL::to('contact')}}">Contact</a></li>
@endsection

<style>
    #img-invisible {
        display: none;
    }

    #postImg:hover #img-invisible {
        display: block;
    }

    #postImg:hover #img-visible {
        display: none;
    }
</style>

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="">
            <div class="col-md-12" style="padding-bottom: 10px;">
                <h1>{{$post->title}}</h1>
                <hr>
            </div>
            {!!Form::model($post, ['route'=> ['posts.destroy',$post->id], 'method'=>'DELETE'])!!}
            <div class="col-md-2 text-muted" style="text-transform: uppercase; border-right: solid lightgray 0.5px; ">
                <p>Posted by: <span style="font-style: italic">{{$author}}<span
                                style="word-break: break-all"> - ({{$name}})</span></span></p>
                <p>Created at:</p>
                <p>|{{$post->created_at}}|</p>
                <p>Updated at:</p>
                <p>|{{$post->updated_at}}|</p>
                @if($user->can('update', $post) || $user->isAdmin())
                    {!!Form::submit('Delete', ['class'=>'btn btn-danger btn-block'])  !!}
                    <button type="button" class="btn btn-default btn-block"
                            onclick="window.location='{{ route("posts.edit", $post->id)}}'">EDIT
                    </button>
                @endif
            </div>
            <div class="col-md-10" style=" ">
                <div class="post">
                    @if(isset($post->image))
                        <div id="postImg">
                            <img src="{{asset('uploads/PostImages/' . $post->image)}}" id="img-visible"
                                 class="img-rounded img-responsive"
                                 style=" padding: 0px 0 20px 0;">
                            <img src="{{asset('uploads/PostImages/' . 'pixelated_' . $post->image)}}" id="img-invisible"
                                 class="img-rounded img-responsive"
                                 style=" padding: 0px 0 20px 0;">
                        </div>
                    @endif

                    {{--nl2br() function helps display the paragraph line breaks otherwise line breaks are not displayed--}}
                    <p style="padding: 0px 0px 20px 5px">{!! nl2br(e($post->body))!!}</p>
                </div>
            </div>
            {!! Form::close() !!}
            <div class="col-md-12" style="margin: 10px 0px 20px 0px;">
                <hr>
            </div>
        </div>
    </div>

@endsection