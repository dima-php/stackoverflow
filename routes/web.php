<?php

use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('pages.index');
//});
Route::get('questions', 'QuestionController@index')->name('questions.index');

Route::get('questions/create', 'QuestionController@create')->middleware('auth')->name('questions.create');
Route::get('questions/{question}', 'QuestionController@show')->name('questions.show');
Route::post('questions', 'QuestionController@store')->middleware('auth')->name('questions.store');
Route::get('questions/{question}/edit', 'QuestionController@edit')->middleware('auth')->name('questions.edit');
Route::put('questions/{question}', 'QuestionController@update')->middleware('auth')->name('questions.update');
Route::delete('questions/{question}', 'QuestionController@destroy')->middleware('auth')->name('questions.delete');
Route::post('questions/{question}/answers', 'AnswerController@store')->middleware('auth')->name('answers.store');
Route::put('answers/{answer}', 'AnswerController@update')->middleware('auth')->name('answers.update');
Route::delete('answers/{answer}', 'AnswerController@destroy')->middleware('auth')->name('answers.delete');
Route::get('categories/{category}', 'CategoryController@show')->name('categories.show');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
