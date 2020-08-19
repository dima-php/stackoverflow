@extends('layouts.app')
<title>{{$question->title}}</title>
@section('content')
    <div class="container-fluid">
        <div class="row show-content">
            <div class="col-lg-2">
                @include('includes.nav')
            </div>
            <div class="col-lg-8 ">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="dk-wrap-question">
                    <h2 class="show-title">{{$question->title}}</h2>
                    <div class="dk-box_control">
                        @if(\Illuminate\Support\Facades\Auth::user() != null)
                            @php
                                $user = \Illuminate\Support\Facades\Auth::user();
                                $questions = $user->questions;
                                $questionsIds = $questions->pluck('id')->toArray();
                            @endphp
                            @if(in_array($question->id, $questionsIds))
                                <a href="{{route('questions.edit', $question)}}" class="btn btn-warning">Edit</a>

                                <form action="{{route('questions.delete', $question->slug)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endif
                        @endif
                    </div>
                    <div class="dk-question">
                        <p>
                            {{$question->body}}
                        </p>
                        <div class="tags t-php t-laravel t-eloquent t-eloquent--relationship">
                            @foreach($question->categories as $category)
                                <a href="#" class="post-tag" rel="tag">{{$category->title}}</a>
                            @endforeach
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
                            {{$question->answer_count}} Answer
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
                            <div class="dk-box_control">
                                @if(\Illuminate\Support\Facades\Auth::user() != null)
                                    @php
                                        $user = \Illuminate\Support\Facades\Auth::user();
                                        $answerUser = $user->answers;
                                        $answerIds = $answerUser->pluck('id')->toArray();
                                    @endphp
                                    @if(in_array($answer->id, $answerIds))
                                    @endif
                                @endif

                                <button type="button" data-id="{{$answer->id}}" class="btn btn-warning  dk-edit__link">Edit</button>
                                <form action="{{route('answers.delete', $answer)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                            <div class="my{{$answer->id}}" style="display:none;">
                                <form action="{{route('answers.update', $answer)}}" method="post">
                                    @method('put')
                                    @csrf
                                    <textarea type="text" name="body" class="form-control">{{$answer->body}}</textarea>
                                    <button type="submit" class="btn btn-primary dk-button">Submit</button>
                                </form>
                            </div>
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
                    <form action="{{route('answers.store', $question->slug)}}" method="post">
                        {{csrf_field()}}
                        <input value="{{$question->id}}" name="question_id" type="hidden">
                        <input value="null" name="votes_count" type="hidden">
                        <textarea name="body" placeholder="Text answer"></textarea>
                        <button type="submit" class="btn btn-outline-success my-2 my-sm-0 button-form">Post Your Answer
                        </button>
                    </form>
                </div>
                <div class="sidebar-nav">
                    <div class="item">

                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                @include('includes.sidebar')
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.dk-edit__link').click(function () {
                let id = $(this).data('id');
                $('.my'+ id).fadeIn('slow');
            });
            $('.dk-button').click(function () {
                $('.my'+ id).fadeOut('slow');
            });
        });
    </script>
@endsection

