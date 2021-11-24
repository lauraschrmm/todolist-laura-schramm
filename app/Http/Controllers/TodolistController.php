<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;
use View;
use App\Http\Requests;

class TodolistController extends Controller
{
    public function index()
    {
        $todolists = Todolist::all();
        return view('index', compact('todolists'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required'
        ]);

        Todolist::create($data);
        return back();
    }


    public function destroy(Todolist $todolist)
    {
        $todolist->delete();
        return back();
    }

    public function edit (Todolist $todolist)
    {
        return view('edit', ['todo'=>$todolist]);
    }

    public function update(Request $request, Todolist $todolist)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $todolist->update(['content' => request('name')]);

        return redirect()->route('index')
            ->with('sucess', 'Aufgabe wurde erfolgreich geändert.');
    }

    

    public function __construct()
    {
        $this->middleware('auth');
    }

}

