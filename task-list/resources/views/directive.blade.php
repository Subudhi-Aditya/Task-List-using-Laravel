<h1>
List of tasks 
</h1>

<div>
    @if (count($tasks))
        {{-- <div>There are tasks !</div>  --}}
        @foreach ($tasks as $task)
            <div>
                <a href="{{ route('task.show', ['id' => $task->id]) }}">{{ $task->title}}</a>
            </div>
        @endforeach
    @else 
        <div>There are no tasks !</div>
    @endif
</div>