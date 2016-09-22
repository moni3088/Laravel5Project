@extends('main')

@section('title', "| About")

@section('navbuttons')
    <li><a href="/">Home</a></li>
    <li class="active"><a href="/about">About</a></li>
    <li><a href="/contact">Contact</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>About Me</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis aspernatur quas quibusdam veniam sunt animi, est quos optio explicabo deleniti inventore unde minus, tempore enim ratione praesentium, cumque, dolores nesciunt?</p>
        </div>
    </div>

@endsection