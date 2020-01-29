<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Notifications\HighPriorityTaskAdded;

class TasksController extends Controller
{
    /**
     * Gets the tasks and displays them on the page
     *
     * @return \Illuminate\Http\Response 
     */ 
    public function index()
    {
        $tasks = Task::get();
        return view('home', [ 
            'tasks' => $tasks
        ]);
    }

    /**
     * Validate the task and store in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'task' => 'required|min:5',
            'high_priority' => 'boolean'
        ]);
        $task = Task::create([
            'title' => $request->task,
            'high_priority' => $request->high_priority ? true : false,
            'belongs_to' => auth()->id()
        ]);

        if (auth()->check() && $task->high_priority) {
            auth()->user()->notify(new HighPriorityTaskAdded($task));
        }
        return redirect()->back();
    }
}

