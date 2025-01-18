<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TodoList;

class TodoListController extends Controller
{
    public function index(Request $request)
    {
        $todo_lists = TodoList::all();

        // view('フォルダ名.ファイル名', 変数名と値がペアの連想配列);
        return view('todo_list.index', ['todo_lists' => $todo_lists]);
    }
}
