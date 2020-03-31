@section('modal')
<div class="modal-card">    
    <div class="container">
        <main class="card-body">
            <button class="modal-cross">&#x2715;</button>
                <div class="modal-seperator">
                <header class="card-header">New Task</header>
                    <form autocomplete="off" action="{{ route('tasks.create') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Title</label>
                            <input class="form-control" type="text" name="task">
                        </div>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="toggle" type="checkbox" name="high_priority" value="1" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="high_priority">High Priority</label>
                            </div>
                        </div>

                        <div class="center">
                            <button type="submit" class="btn btn-primary" name="task-button">Create</button>
                        </div>
                    </form>
                </div>
                
                <div class="delete-card">
                    <div class="content-seperator">
                        <h3 class="card-header">Warning!</h3>
                        <p class="col-form-label">Are you sure you wish to delete this task?</p>
                    </div>

                @foreach($tasks as $task)
                @if ($task->id == $loop->iteration)
                <form action="{{ route('tasks.destroy', $task) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="dm-buttons">
                        <button onclick="deleteModalOpener(this, event);" class="cancel-delete">Cancel</button>
                        <button id="{{$task->id}}" name="plswork" type="submit" class="confirm-delete">Confirm</button>
                    </div>
                </form>
                @endif
                @endforeach
            </div>
        </main>
    </div>
</div>
@endsection