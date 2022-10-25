@extends('templates.main')

@push('title')
    <title>Add Task</title>
@endpush


@section('content')
    <main>
        <div class="container">
            <div class="my-tasks">
                <form action="{{url('/add')}}" method="post">
                    @csrf
                    <div class="form-control">
                        <input placeholder="Add Task.." type="text" name="task" id="task">
                        @error('task')
                            <p style="color: red; margin-bottom: 5px;">Task is required*</p>
                        @enderror
                        <button type="submit" name="submit">Add Task</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection 