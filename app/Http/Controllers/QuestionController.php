<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use DB;
use App\Question;
use App\Answer;

class QuestionController extends Controller
{
    //
    public function index()
    {
        $all_questions = Question::orderBy('created_at', 'desc')->get();
    
        $view = view('questions/index', compact('all_questions'));
    
        return $view;
    }

    public function show(Question $question)
    {
        // $question = Question::find($id);
        // $answers = $question->answers()->oldest()->get();
        // dd($question);
        $view = view('questions/show', compact('question'));

        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('questions/create');
    }
}
