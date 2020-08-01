@extends('layouts.app')


@section('content')
    <div class="container">
        <ul class="list-group">
            @foreach($questions as $question)
                <li class="list-group-item">
                    <a href="{{route('questions.show', $question->slug)}}">{{$question->title}}</a>
                    <p>{{$question->user->name}}</p>
                </li>
            @endforeach
        </ul>
        {{ $questions->links() }}
    </div>
@endsection




