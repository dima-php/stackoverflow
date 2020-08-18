<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $questions = Question::with(['user', 'categories', 'user.questions'])->latest()->paginate(10);

        return view('pages.questions.index', ['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $categories = Category::all();

        return view('pages.questions.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $question = Question::create($validateData);

        $question->categories()->attach($request->categories);

        return redirect()->route('questions.index');
    }


    /**
     * Display the specified resource.
     *
     * @param Question $question
     * @return Application|Factory|Response|View
     */
    public function show(Question $question)
    {
        return view('pages.questions.show', ['question' => $question]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Question $question
     * @return Application|Factory|Response|View
     */
    public function edit(Question $question)
    {
        return view('pages.questions.update', ['question' => $question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request  $request
     * @param Question $question
     * @return RedirectResponse
     */
    public function update(Request $request, Question $question)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'categories' => 'array',
        ]);

        $question->update($validateData);

        $question->categories()->detach();

        $question->categories()->attach($validateData['categories']);

        return redirect()->route('questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index');
    }
}
