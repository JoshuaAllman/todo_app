@extends('layouts.main')

@section('header')

<h3 class="task-owner"><i class="fa fa-bars"></i>{{ auth()->user() ? auth()->user()->name . "'s": 'My' }} Tasks<button class="search-button"><i class="fa fa-plus" id="user"></i>New Task</button></h3>
    <div class="task-form">
        
            <div class="class-of-magic" id="search-form">
            <input id="item_input" onkeyup="searchFilter()" type="text" name="task">  



            <!-- <button class="add-task-button" type="submit"><i class="fa fa-search"></i>Search</button>
            </div> -->

    
           
    
    </div>

@endsection

@foreach(['Taskbuilder', 'modal'] as $view)
    @include($view)
@endforeach


    

