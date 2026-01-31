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

    public function store(Request $request)
    {
        $validated = $request->validate([   //②サーバ：バリデーション
            'content' => 'required|string'
        ]);
    
        $memo = Memo::create($validated);
    
        return response()->json($memo, 200);
    }
}

