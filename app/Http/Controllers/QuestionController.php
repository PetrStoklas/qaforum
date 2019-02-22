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

        $all_questions = Question::all();
        dd($all_questions);
        return 'My QuestionController is this';
    }

    public function show($id)
    {

        $question = Question::find($id);
        $answers = $question->answers()->oldest()->get();

        dd($answers);
        return 'This is question detail of question with id '.$id ;
    }
}
