<?php
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('pages.index');
});
Route::get('questions', 'QuestionController@index')->name('questions.index');
Route::get('questions/create', 'QuestionController@create')->middleware('auth')->name('questions.create');
Route::get('questions/{question}', 'QuestionController@show')->name('questions.show');
Route::post('questions', 'QuestionController@store')->middleware('auth')->name('questions.store');
Route::post('questions', 'AnswerController@store')->middleware('auth')->name('answers.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
