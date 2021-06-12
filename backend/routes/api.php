<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/question', [\App\Http\Controllers\ApiController::class, 'question'])->name("question");
Route::get('/question-calc', [\App\Http\Controllers\ApiController::class, 'questionCalc'])->name("questionCalc");
