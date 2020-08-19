<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAnswerRequest;

class AnswerController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Question                 $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAnswerRequest $request, Question $question)
    {
        $validateData = $request->validated();
        $answer = new Answer(['body' => $validateData['body'], 'user_id' => Auth::id()]);
        $question->answers()->save($answer);
        $question->increment('answer_count');

        return back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAnswerRequest $request, Answer $answer)
    {
        $answer->update($request->validated());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {

       $answer->delete();
        $answer->question->decrement('answer_count');
        return back();
    }
}
