<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $tasks = Todo::all();
        $data = compact('tasks');
        return view('index', $data);
    }

    public function add()
    {
        return view('add');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'task' => 'required|max:255',
        ]);

        $todo = new Todo;
        $todo->task = $request->task;
        $todo->save();
        
        return redirect('/')->with('success', 'Task added successfully.');
    }

    public function edit($id)
    {
        $task = Todo::find($id);
        $data = compact('task');
        return view('edit', $data);
    }

    public function update(Request $request, $id)
    {
        // Validate the request...
        $request->validate([
            'task' => 'required|max:255',
        ]);

        $todo = Todo::find($id);
        $todo->task = $request->task;
        $todo->save();
        
        return redirect('/')->with('success', 'Task updated successfully.');
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        
        return redirect('/')->with('success', 'Task deleted successfully.');
    }

    public function complete($id)
    {
        $todo = Todo::find($id);
        if($todo->completed == 0) {
            $todo->completed = 1;
            $todo->save();
            // echo "Task completed successfully.";
        } else {
            $todo->completed = 0;
            $todo->save();
            // echo "Task uncompleted successfully.";
        }
        
        return redirect('/')->with('success', 'Task completed successfully.');
    }
}
