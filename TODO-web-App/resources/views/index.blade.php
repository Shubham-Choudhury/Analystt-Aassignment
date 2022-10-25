@extends('templates.main')

@push('title')
    <title>TODO APP</title>
@endpush

@push('nav')
    <nav>
        <a href="{{url('/add')}}">Add Task</a>
    </nav>
@endpush

@section('content')
    <main>
        <div class="container">
            <div class="my-tasks">
                <div class="task-nav">
                    <p id="a-task" class="active">All Tasks</p>
                    <p id="c-task">Completed Tasks</p>
                    <p id="p-task">Pending Tasks</p>
                </div>
                
                <div id="a-task-l" class="task-list active">
                    @foreach($tasks as $key => $task)
                    <div class="task">
                        <p>{{$key+1}}</p>
                        <p>{{$task->task}}</p>
                        <div class="task-footer">
                            @if($task->completed == 0)
                                <p style="color: red;">Pending</p>
                                <a href="{{url('/')}}/complete/{{$task->id}}">Mark as Completed</a>
                            @else
                                <p style="color: green">Completed</p>
                                <a href="{{url('/')}}/complete/{{$task->id}}">Mark as Pending</a>
                            @endif
                            <a href="{{url('/')}}/edit/{{$task->id}}">Edit</a>
                            <a href="{{url('/')}}/delete/{{$task->id}}">Delete</a>
                        </div>
                    </div>
                    @endforeach
                    @if(count($tasks) == 0)
                        <p style="text-align: center; font-size: 20px; color: #ccc;">No Tasks Found</p>
                    @endif
                </div>

                <div id="c-task-l" class="task-list">
                    @php
                        $count = 0;
                    @endphp
                    @foreach($tasks as $key => $task)
                        @if($task->completed == 1)
                            {{-- @php
                                $count++;
                            @endphp --}}
                            <div class="task">
                                <p>{{++$count}}</p>
                                <p>{{$task->task}}</p>
                                <div class="task-footer">
                                    @if($task->completed == 0)
                                        <p style="color: red;">Pending</p>
                                        <a href="{{url('/')}}/complete/{{$task->id}}">Mark as Completed</a>
                                    @else
                                        <p style="color: green">Completed</p>
                                        <a href="{{url('/')}}/complete/{{$task->id}}">Mark as Pending</a>
                                    @endif
                                    <a href="{{url('/')}}/edit/{{$task->id}}">Edit</a>
                                    <a href="{{url('/')}}/delete/{{$task->id}}">Delete</a>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    @if($count == 0)
                        <p style="text-align: center; font-size: 20px; color: #ccc;">No Completed Tasks Found</p>
                    @endif
                </div>

                <div id="p-task-l" class="task-list">
                    @php
                        $count = 0;
                    @endphp
                    @foreach($tasks as $key => $task)
                        @if($task->completed == 0)
                            {{-- @php
                                $count++;
                            @endphp --}}
                            <div class="task">
                                <p>{{++$count}}</p>
                                <p>{{$task->task}}</p>
                                <div class="task-footer">
                                    @if($task->completed == 0)
                                        <p style="color: red;">Pending</p>
                                        <a href="{{url('/')}}/complete/{{$task->id}}">Mark as Completed</a>
                                    @else
                                        <p style="color: green">Completed</p>
                                        <a href="{{url('/')}}/complete/{{$task->id}}">Mark as Pending</a>
                                    @endif
                                    <a href="{{url('/')}}/edit/{{$task->id}}">Edit</a>
                                    <a href="{{url('/')}}/delete/{{$task->id}}">Delete</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    @if($count == 0)
                        <p style="text-align: center; font-size: 20px; color: #ccc;">No Pending Tasks Found</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
<script src="/js/app.js"></script>
@endpush