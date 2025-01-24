@extends('layouts.app')
@section('title', 'Edit Task')
@section('content')


    @include('inc.error')
    <h1 class="m-3 text-center">Edit Task</h1>
    <div class="container">
        <form action="{{route('task.update', $task->id)}}" method="POST" >
            @method('PUT')
            @csrf
            <div class="m-3">
                <label>Task Name</label>
                <input type="text" class="form-control" name="taskName" value="{{$task->taskName}}">
            </div>
            <div class="m-3">
                <label>Task Progress</label>
                <input type="text" class="form-control" name="taskprogress" value="{{$task->progress}}">
            </div>
            <div class="m-3">
                <label>Project Name</label>
                <select class="form-select" name="projectId" id="">
                    @foreach ($project as $item)
                        <option value="{{$item->id}}">{{$item->projectName}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
