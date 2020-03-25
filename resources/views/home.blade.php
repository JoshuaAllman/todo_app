@extends('layouts.main')

@section('header')

<h3 class="task-owner"><i class="fa fa-bars"></i>{{ auth()->user() ? auth()->user()->name . "'s": 'My' }} Tasks<button class="search-button"><i class="fa fa-plus" id="user"></i>New Task</button></h3>
    <div class="task-form">
        <form autocomplete="off" action="{{ route('tasks.create') }}" method="post">
            @csrf 
            <div class="class-of-magic" id="search-form">
            <input type="text" name="task">  
            @error('task')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button class="add-task-button" type="submit"><i class="fa fa-search"></i>Search</button>
            </div>
            @error('high_priority')
                <div class="alert alert-danger">{{ 'try again' }}</div>
            @enderror
            <label>
        </form>
    </div>

@endsection

@foreach(['Taskbuilder', 'modal'] as $view)
    @include($view)
@endforeach


    

