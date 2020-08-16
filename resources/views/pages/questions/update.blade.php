@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="dk-question-form">
            <form method="post" action="{{route('questions.update')}}">
                @csrf
                @foreach($question as $question)

                    <input type="hidden" name="id"  value="{{$question->id}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>

                        <input type="text" name="title" class="form-control" value="{{$question->title}}">
         </div>

          <div class=" form-group">

                        <label for="exampleInputPassword1">body</label>
                        <textarea name="body" class="form-control" placeholder="Text">{{$question->body}}</textarea>
                    </div>
                @endforeach
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                    </div>
                    <select class="custom-select" multiple name="categories[]">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>

@endsection
