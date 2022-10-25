@extends('templates.main')

@push('title')
    <title>Edit Task</title>
@endpush


@section('content')
    <main>
        <div class="container">
            <div class="my-tasks">
                <form action="{{url('/edit')}}/{{$task->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-control">
                        <input placeholder="Add Task.." type="text" name="task" id="task" value="{{$task->task}}">
                        @error('task')
                            <p style="color: red; margin-bottom: 5px;">Task is required*</p>
                        @enderror
                        <button type="submit" name="submit">Update Task</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection 