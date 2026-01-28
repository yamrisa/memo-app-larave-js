<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemoController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/memos', [MemoController::class, 'index']);