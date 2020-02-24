@extends('layouts.main')

@section('header')

    <li class="task-form" >
        <form action="{{ route('tasks.create') }}" method="post">
        @csrf 
        <input type="text" name="task">  
        @error('task')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button class="add-task-button" type="submit">Add Task</button><br/>
        @error('high_priority')
            <div class="alert alert-danger">{{ 'try again' }}</div>
        @enderror
        <label>
            <input class="task-form-button-checkbox" type="checkbox" name="high_priority" value="1"/>
            High Priority
        </label>
    </form>
    </li>

@endsection


@section('content')

    <h1 class="task-owner"> {{ auth()->user() ? auth()->user()->name : 'My' }} Tasks</h1>

    <ul>
        @foreach($tasks as $task)
            <li>
                <form class="displayed-task" action="{{ route('tasks.update', $task) }}" method="post">
                    @method('PUT')
                    @csrf
                    @if($task->high_priority) <strong> @endif
                    @if($task->completed_at) <strike> @endif
                    {{ ucwords($task->title) }}
                    <input type="hidden" name="completed" value="1">
                    @if(!$task->completed_at)
                        <button class="complete-task-button" type="submit">Complete</button>
                    @endif
                    @if($task->belongsToUser) : {{ $task->belongsToUser->name }} @endif
                    @if($task->completed_at) </strike> @endif
                    @if($task->high_priority) </strong> @endif
                </form>
            </li>
        @endforeach
    </ul>

@endsection

