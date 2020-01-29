@extends('layouts.main')

@section('content')

    <h1>{{ auth()->user() ? auth()->user()->name : 'My' }} Tasks</h1>

    <form action="{{ route('tasks.create') }}" method="post">
        @csrf 
        <input name="task">  
        @error('task')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="checkbox" name="high_priority" value="1">High Priority<br>
        <button type="submit">Add Task</button>
        @error('high_priority')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </form>

    <ul>
        @foreach($tasks as $task)
          <li>
             @if($task->high_priority) <strong> @endif
             {{ $task->title }}
             @if($task->belongsToUser) : {{ $task->belongsToUser->name }} @endif
             @if($task->high_priority) </strong> @endif
        </li>
        @endforeach
    </ul>



