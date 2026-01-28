<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class MemoController extends Controller
{
    public function index()
    {
        $memos = Memo::all();
        return view('memos.index', compact('memos'));
    }
}

