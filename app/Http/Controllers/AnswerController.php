<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;

class AnswerController extends Controller
{
    public function show($id)
    {
        $answer = Answer::findOrFail($id);

        return view('answer/show', compact('answer'));
    }

    public function vote($id)
    {
        $request = request();
 
        $answer = Answer::find($id);
        
        $vote = new \App\Vote;
        $vote->answer_id = $answer->id;
        
        if ($request->input('up')) {
            $vote->vote = 1;
            $answer->rating++; 
        } elseif($request->input('down')) {
            $vote->vote = -1;
            $answer->rating--; 
        }
        
        $vote->save();
        $answer->save();
        
        return back();
    }

    public function store($question_id, Request $request) 
    {
        $answer = new Answer;
        $question = Question::findOrFail($question_id);
        $answer->text = $request->text;
        $answer->question_id = $question_id;
        $answer->user_id = \Auth::user()->id;
        $answer->save();
        return view('questions.show', compact('answer', 'question'));
        
    }

}
