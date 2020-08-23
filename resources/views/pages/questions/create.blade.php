@extends('layouts.app')
@section('title', 'Ask a Question')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-9 m-auto ">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <div class="dk-question-form">
                <form method="post" action="{{route('questions.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">body</label>
                        <textarea name="body"  class="form-control" placeholder="Text"></textarea>
                    </div>
                    <div class="input-group mb-3">


                        @foreach($categories as $category)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="categories[]"
                                       id="test_{{$category->id}}" value="{{$category->id}}"
                                       @if(in_array($category->id, $question->categories->pluck('id')->toArray())) checked @endif>
                                <label class="custom-control-label"
                                       for="test_{{$category->id}}">{{$category->title}}</label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                </div>
            </div>
        </div>
    </div>
@endsection
