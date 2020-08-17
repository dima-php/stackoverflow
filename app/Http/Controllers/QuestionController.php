<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        $questions = Question::with('user')->latest()->paginate(10);
        return view('pages.questions.index', ['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
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
     * @return Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $question = new Question;
        $question->user_id = Auth::id();
        $question->title = $validateData['title'];
        $question->body = $validateData['body'];
        $question->save();
        $question->categories()->attach($request->categories);
        return redirect()->route('questions.index');

    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(Question $question)
    {
        return view('pages.questions.show', ['question' => $question]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $question = Question::all()->where('slug', '=', $id);

        return view('pages.questions.update', ['question' => $question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request)
    {

        $id = $request->id;
        $question = DB::table('questions')
            ->where('id', '=', $id)
            ->update([
                'title' => $request->title,
                'body' => $request->body,

            ]);
//        $question->categories()->attach($request->categories);
        return redirect()->route('questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $question = Question::all()->where('slug','=>',$id );
        if ($question != null) {
            $question->Delete();
        }

        return redirect()->route('questions.index');
    }
}
