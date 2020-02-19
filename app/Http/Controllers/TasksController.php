<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Notifications\HighPriorityTaskAdded;
use App\Notifications\OtherUserCompletedTask;
use App\Notifications\OtherUserCompletedHighPriorityTask;


class TasksController extends Controller
{
    /**
     * Gets the tasks and displays them on the page
     *
     * @return \Illuminate\Http\Response 
     */ 
    public function index()
    {
        $tasks = Task::where('completed_at', '>', now()->subSeconds(60 * 10))
            ->orWhereNull('completed_at')
            ->get();
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

    /**
     *  Updates the task in the database
     *
     * @param Illuminate\Http\Request $request
     * @param App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'completed' => 'boolean'
        ]);

        $task->update([
            'completed_at' => $request->completed ? now() : null
        ]);
        if ($user = $task->belongsToUser) {
            if ($user->id !== auth()->id() && $task->high_priority) {
                $user->notify(new OtherUserCompletedHighPriorityTask($task, auth()->user()));
            } elseif ($user->id !== auth()->id()) {
                $user->notify(new OtherUserCompletedTask($task, auth()->user()));
            }
        }
        return redirect()->back();
    }
}

