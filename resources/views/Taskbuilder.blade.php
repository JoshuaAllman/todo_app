@section('taskport')
    <div class="scroll-window">
        <table class="content-ul">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Published At</th>
                    <th>High Priority</th>
                    <th>Owner</th>
                    <th>Actions</th>
                </tr>
            </thead>

            @foreach($tasks as $task)   
                <tr>	
                    <td>{{ $task->id }}</td>
                    <form class="displayed-task" action="{{ route('tasks.update', $task) }}" method="post">
                    <td>
                        @method('PUT')
                        @csrf
                        @if($task->completed_at) <strike> @endif
                        {{ ucwords($task->title) }}
                        <input type="hidden" name="completed" value="1">
                        <!-- <i class="fa fa-info-circle" id="user"></i> -->
                        @if($task->completed_at) </strike> @endif
                    </td>
                    <td>
                        @if(!$task->completed_at)
                        <button class="complete-task-button" type="submit">Complete</button>
                        @endif
                    </td>
                    <td>  
                        <label>
                            @if (!$task->high_priority)
                            <input type="checkbox" class="toggle" name="high_priority" value="high_priority">
                            @else 
                            <input type="checkbox" class="toggle" name="high_priority" value="high_priority" checked>
                            @endif
                        </label>
                    </td>
                    </form>
                    <td>{{ $task->belongsToUser ? $task->belongsToUser->name : 'Guest' }}</td>
                    <td>
                        <!-- <button class="complete-button"><i class="fa fa-check"></i></button> -->
                        <button class="edit-button"><i class="fa fa-pencil"></i></button>
                        <form class="option-buttons" action="{{ route('tasks.destroy', $task) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="delete-button"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection