@extends('layouts.app')
@section('content')
    <div class="container-fluid dk-content">
        <div class="row">
            <div class="col-lg-2">
                @include('includes.nav')
            </div>
            <div class="col-lg-8">
                <div id="mainbar">
                    <div class="grid">
                        <h1 class="grid--cell fl1 fs-headline1">
                            Questions
                        </h1>
                        <div class="ml12 aside-cta grid--cell print:d-none">
                            <a href="#" class="btn btn-outline-success my-2 ">
                                Ask Question
                            </a>
                        </div>
                    </div>
                    <div class="grid ">
                        <div class="grid--cell "></div>
                        <div class="grid--cell">
                            <div class=" grid s-btn-group js-filter-btn">
                                <a class="youarehere is-selected grid--cell s-btn s-btn__muted s-btn__outlined" href="#"
                                   data-nav-xhref=""
                                   title="Questions that may be of interest to you based on your history and tag preference"
                                   data-value="interesting" data-shortcut="">
                                    Interesting</a>
                                <a class="grid--cell s-btn s-btn__muted s-btn__outlined" href="#" data-nav-xhref=""
                                   title="Questions with an active bounty" data-value="bounties" data-shortcut="B">
                                    <span class="bounty-indicator-tab">435</span> Bountied</a>
                                <a class="grid--cell s-btn s-btn__muted s-btn__outlined" href="#" data-nav-xhref=""
                                   title="Questions with the most views, answers, and votes over the last few days"
                                   data-value="hot" data-shortcut="H">
                                    Hot</a>
                                <a class="grid--cell s-btn s-btn__muted s-btn__outlined" href="#" data-nav-xhref=""
                                   title="Questions with the most views, answers, and votes this week" data-value="week"
                                   data-shortcut="W">
                                    Week</a>
                                <a class="grid--cell s-btn s-btn__muted s-btn__outlined" href="#" data-nav-xhref=""
                                   title="Questions with the most views, answers, and votes this month"
                                   data-value="month"
                                   data-shortcut="M">
                                    Month</a>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        @foreach($questions as $question)
                            <div id="qlist-wrapper" class="flush-left">
                                <div id="question-mini-list">
                                    <div>
                                        <hr>
                                        <div class="question-summary narrow" id="question-summary-63187429">
                                            <div class="cp">
                                                <div class="votes">
                                                    <div class="mini-counts"><span
                                                            title="0 votes">{{$question->votes}}</span></div>
                                                    <div>votes</div>
                                                </div>
                                                <div class="answers">
                                                    <div class="mini-counts"><span
                                                            title="0 answers">{{$question->answer_count}}</span></div>
                                                    <div>answers</div>
                                                </div>
                                                <div class="views">
                                                    <div class="mini-counts"><span
                                                            title="2 views">{{$question->views}}</span></div>
                                                    <div>views</div>
                                                </div>
                                            </div>
                                            <div class="summary">
                                                <h3>
                                                    <a href="{{route('questions.show', $question->slug)}}">{{$question->title}}</a>
                                                    <div class="dk-link-question"></div>
                                                </h3>
                                                <div class="wrap">
                                                    <div
                                                        class="tags t-php t-laravel t-eloquent t-eloquent--relationship">
                                                        <a href="#" class="post-tag" title="show questions tagged 'php'"
                                                           rel="tag">php</a> <a href="" class="post-tag"
                                                                                title=rel="tag">laravel</a>
                                                        <a href="#" class="post-tag"
                                                           title="show questions tagged 'eloquent'"
                                                           rel="tag">eloquent</a>
                                                        <a
                                                            href="#" class="post-tag" title=""
                                                            rel="tag">eloquent--relationship</a>
                                                    </div>
                                                    <div class="started">
                                                        <a href="#"
                                                           class="started-link">
                                                            <span title="2020-07-31 07:20:07Z"
                                                                  class="relativetime">{{$question->created_date}}</span>
                                                        </a>
                                                        <a href="#" class="user-name">{{$question->user->name}}</a>
                                                        <span class="reputation-score" title="reputation score "
                                                              dir="ltr">{{$question->user->questions->count()}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                @include('includes.sidebar')
            </div>
        </div>
    </div>
@endsection





