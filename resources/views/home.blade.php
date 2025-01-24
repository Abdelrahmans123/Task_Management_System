@extends('layouts.app')
@section('content')



@include('layouts.sidebar')

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title"  style="font-size: 40px">Task</h5>
                        <p class="card-text" style="font-size: 50px">{{$task->count()}}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title"  style="font-size: 40px">Project</h5>
                        <p class="card-text" style="font-size: 50px">{{$project->count()}}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title"  style="font-size: 40px">Employee</h5>
                        <p class="card-text" style="font-size: 50px">{{$employee->count()}}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title"  style="font-size: 40px">Completed Task</h5>
                        <p class="card-text" style="font-size: 50px">{{$completed->count()}}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title"  style="font-size: 40px">Uncompleted Task</h5>
                        <p class="card-text" style="font-size: 50px">{{$uncompleted->count()}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div style="padding: 50px">
            <h2>Project Progress</h2>
            @foreach($task as $item)
                <h3>{{$item->taskName}}</h3>
        <div class="progress">
            <div class="progress-bar" style="width:{{$item->progress}}%">
            </div>
        </div>
            @endforeach
        </div>
        <div class="employee">
            <div class="row">
                <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th>Employee Id</th>
                    <th>Employee Name </th>
                    <th>Employee Role </th>
                    <th>Employee Email </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($employee as $emp )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $emp->name}}</td>
                        <td>{{ $emp->role}}</td>
                        <td>{{ $emp->email}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                </div>
                <div class="col">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th>Project Id</th>
                            <th>Project Name </th>
                            <th>Start Date</th>
                            <th>Due Date</th>
                            <th>Number of Employee</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($project as $projects )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$projects->projectName}}</td>
                                <td>{{$projects->startDate}}</td>
                                <td>{{$projects->dueDate}}</td>
                                <td>{{$projects->numberofemp}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
        </div>
    </div>
@endsection
