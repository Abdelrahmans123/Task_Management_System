@extends('layouts.app')
@section('title', 'Show Task')
@section('content')
@include('layouts.sidebar')

    @include('inc.success')
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Task Name </th>
                <th>Task Progress</th>
                <th>Project Name</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$task->taskName}}</td>
                    @if($task->progress == 'Uncompleted')
                        <td><span class="badge bg-danger">{{$task->progress}}</span></td>
                    @else
                        <td><span class="badge bg-success">{{$task->progress}}</span></td>
                    @endif
                    <td>{{$task->project->projectName}}</td>

                </tr>
            </tbody>
        </table>
    </div>
@endsection
