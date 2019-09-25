<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    public function index()
    {

        return view('todos.index', [
            'todos' => Todo::all()
        ]);
    }

    public function create()
    {
        return view('todos/create');
    }

    public function store()
    {
        Todo::create(
            array_merge(
                request()->validate([
                    'title' => 'required|min:3|max:255',
                    'description' => ['required', 'min:4'],
                ]),
                ['completed' => is_null(request('completed')) ? 0 : 1]
            )
        );

        return redirect('/todos');
    }

    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.show', [
            'todo' => $todo
        ]);
    }

    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', [
            'todo' => $todo
        ]);
    }

    public function update($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->title = request('title');
        $todo->description = request('description');
        $todo->completed = is_null(request('completed')) ? 0 : 1;
        $todo->save();
        return redirect('/todos');
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return redirect('/todos');
    }
}
