<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $title = "List Tugas";
        return view('tugas.index',[
            "title"=>$title
        ]);
    }
}