<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function index()
    {
        return 'My QuestionController is this';
    }

    public function show($id)
    {
        return 'This is question detail of question with id '.$id ;
    }
}
