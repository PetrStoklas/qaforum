<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class CategoryController extends Controller
{
    //
    public function index()
    {

        $categories = DB::table('categories')->orderBy('name', 'desc')->get(); 
        $view = view('categories/index', compact('categories'));

        return $view;
    }
}
