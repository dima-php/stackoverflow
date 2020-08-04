<?php

use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.index');
});

Route::get('questions', 'QuestionController@index')->name('questions.index');
Route::get('questions/{question}', 'QuestionController@show')->name('questions.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
