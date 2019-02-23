<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class AnswerController extends Controller
{
    public function index($id)
    {
        $answer = Answer::findOrFail($id);

        return view('answer/show', compact('answer'));
    }
}
