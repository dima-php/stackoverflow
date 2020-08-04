@extends('layouts.app')
<title>{{$question->title}}</title>
@section('content')
    <div class="container-fluid">


    <div class="row show-content">
        <div class="col-lg-2">
            @include('includes.nav')
        </div>
        <div class="col-lg-8 ">
            <div class="dk-wrap-question">
                <h2 class="show-title">{{$question->title}}</h2>
                <div class="dk-question">
                    <p>
                        {{$question->body}}
                    </p>
                    <div class="tags t-php t-laravel t-eloquent t-eloquent--relationship">
                        <a href="#" class="post-tag" title="show questions tagged 'php'"
                           rel="tag">php</a> <a href=""
                                                class="post-tag"
                                                title="show questions tagged 'laravel'"
                                                rel="tag">laravel</a>
                        <a href="#" class="post-tag"
                           title="show questions tagged 'eloquent'"
                           rel="tag">eloquent</a>
                        <a
                            href="#" class="post-tag" title=""
                            rel="tag">eloquent--relationship</a>
                    </div>
                    <div class="dk-data">
                        {{$question->created_at}}
                        <div class="user-info">
                            <img class="avatar"
                                 src="https://www.gravatar.com/avatar/78e1bb7e40e3bfdfc592988b65ec29c4?s=32&d=identicon&r=PG&f=1"
                                 alt="avatar">
                            <a href="">{{$question->user->name}}</a>
                        </div>
                    </div>
                    <p class="answer-user">
                        {{$question->answers}} Answer
                    </p>
                </div>
            </div>
            <div class="dk-show-answer">
                @foreach($question->answers as $answer)
                <div class="answer">
                    <hr>
                    <p>

                        {{$answer->body}}
                    </p>
                    <div class="dk-data">
                        {{$answer->created_at}}
                        <div class="user-info">
                            <img class="avatar"
                                 src="https://i.stack.imgur.com/50iHw.jpg?s=128&g=1"
                                 alt="avatar">
                            <a href="">{{$answer->user->name}}</a>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <hr>
            <div class="form-answer">
                <h3>Your Answer</h3>
                <form action="" method="get">
                    {{ csrf_field() }}
                    <textarea name="answer" id="answer" placeholder="Text answer"></textarea>
                    <button type="submit" class="btn btn-outline-success my-2 my-sm-0 button-form">Post Your Answer
                    </button>
                </form>
            </div>
        </div>
        <div class="col-lg-2">
            @include('includes.sidebar')
        </div>
    </div>
    </div>
@endsection




