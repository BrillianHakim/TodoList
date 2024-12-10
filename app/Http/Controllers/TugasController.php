<?php

namespace App\Http\Controllers;
use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function data(){
        $tugas = Tugas::all();
        return response()->json($tugas);
    }
    public function index()
    {
        $title = "List Tugas";
        return view('tugas.index',[
            "title"=>$title
        ]);
    }
    public function store(Request $request){
        $tugas = new Tugas();
        $tugas->judul = $request->judul;
        $tugas->deskripsi = $request->deskripsi;
        $tugas->save();

        return response()->json([
            'status'=> 200
        ]);
    }
}