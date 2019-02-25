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

    public function store(Request $request)
    {
        
       

        $new_question = new Question;

        $new_question->user_id = 1;
        $new_question->title = $request->title;
        $new_question->text = $request->question_body;

        // $new_question->validate([
        //     'title' => 'required|unique:posts|min:10',
        //     'text' => 'required'
        // ]);

        $validatedData = $request->validate([
            'title' => 'bail|required|min:10',
            'body' => 'required',
        ]);

        // if($new_question->validate()) {
        //     session()->flash('success_message', 'Success!');
        // } else {
            //     // $errors++;
            // }
            
        session()->flash('success_message', 'Success!');
        $new_question->save();
        
        // return $new_question->save();
        


        // dd($request->session());

        return redirect('/questions');
    }
}

// $attributes = request(validate(['min:6', ]))