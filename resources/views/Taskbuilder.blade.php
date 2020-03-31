@section('taskport')
    <div class="scroll-window">
        <table id="myTable" class="content-ul">
            <thead>
                <tr>
                    <th id="id-row">ID</th>
                    <th id="title-row">Title</th>
                    <th id="published-row">Published At</th>
                    <th id="hp-row">High Priority</th>
                    <th id="owner-row">Owner</th>
                    <th id="actions-row">Actions</th>
                </tr>
            </thead>

            @foreach($tasks as $task)   
                <tr id="item_row">	
                    <td>{{ $task->id }}</td>
                        <form class="displayed-task" action="{{ route('tasks.update', $task) }}" method="post">
                            <td id="items">
                                @method('PUT')
                                @csrf
                                @if($task->completed_at) <strike> @endif
                                {{ ucwords($task->title) }}
                                <input type="hidden" name="completed" value="1">
                                @if($task->completed_at) </strike> @endif
                            </td>
                            <td>
                                @if(!$task->completed_at)
                                <button class="complete-task-button" type="submit">Complete</button>
                                @endif
                            </td>
                            <td>  
                                <label>
                                    <input class="toggle" type="checkbox" @if($task->high_priority) checked @endif id="priority" name="high_priority"  value="on" data-toggle="toggle" data-high_priority="{{$task->high_priority}}">
                                </label>
                            </td>
                        </form>
                        <td>{{ $task->belongsToUser ? $task->belongsToUser->name : 'Guest' }}</td>
                        <td>
                        <!-- <button class="complete-button"><i class="fa fa-check"></i></button> -->
                        <button class="edit-button"><i class="fa fa-pencil"></i></button>
                        <button onclick="deleteModalOpener({{$task}}, event);" class="delete-button"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection