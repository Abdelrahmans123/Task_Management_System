@extends('layouts.app')
@section('title', 'Task')
@section('content')


    @include('inc.success')
    <div class="container">
        <a href="{{url('task/create')}}" class="btn btn-primary m-2">Add New Task</a>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Task Name </th>
                <th>Task Progress</th>
                <th>Task Status</th>
                <th>Project Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($task as $tasks)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$tasks->taskName}}</td>
                    <td>{{$tasks->progress}}%</td>
                    @if($tasks->progress === "100")
                    <td><span class="badge bg-success">Completed</span></td>
                    @else
                    {{-- @dd($tasks->progress) --}}
                        <td><span class="badge bg-danger">Uncompleted</span></td>
                    @endif

                    <td>{{$tasks->project->projectName}}</td>
                    <td class="d-flex">
                        <a href="{{url('task/' . $tasks->id . '/edit')}}" class="btn btn-primary me-1">Edit</a>
                        <a href="{{url('changeProgress/' . $tasks->id)}}" class="btn btn-success me-1">Change Progress</a>
                    <form action="{{ route('task.destroy', $tasks->id) }}" method="Post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button></td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
