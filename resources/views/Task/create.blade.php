@extends('layouts.app')
@section('title', 'Add Task')
@section('content')


    @include('inc.error')
    <h1 class="m-3">Add Task</h1>
    <div class="container">
        <form action="{{url('task/')}}" method="POST" >
            @csrf
            <div class="m-3">
                <label>Task Name</label>
                <input type="text" class="form-control" name="taskName" placeholder="Enter Task Name">
            </div>
            <div class="m-3">
                <label>Task Progress</label>
                <input type="text" class="form-control" name="taskprogress" placeholder="Enter Task Progress">
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
