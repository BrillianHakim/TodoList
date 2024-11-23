<?php
use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/todolist', [TugasController::class, 'index'])->name('tugas.index');
