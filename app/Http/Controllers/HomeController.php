<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @param Question $question
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Question $question)
    {
        $questions = Question::with('categories')->orderBy('views', 'desc')->take(10)->get();

        return view('pages.index', ['questions' => $questions]);
    }



}
