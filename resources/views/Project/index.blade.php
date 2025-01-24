@extends('layouts.app')
@section('title','Project')
@section('content')
    @include('inc.success')
<div class="container">
    <a href="{{url('project/create')}}" class="btn btn-primary m-2">Add New Project</a>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Project Name </th>
            <th>Start Date</th>
            <th>Due Date</th>
            <th>Number of Employee</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($project as $projects )
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$projects->projectName}}</td>
            <td>{{$projects->startDate}}</td>
            <td>{{$projects->dueDate}}</td>
            <td>{{$count}}</td>
            <td><a href="{{url('project/'.$projects->id.'/edit')}}" class="btn btn-primary">Edit</a></td>
            <form action="{{ route('project.destroy',$projects->id) }}" method="Post">
                @csrf
                @method('DELETE')
                <td><button type="submit" class="btn btn-danger">Delete</button></td>
            </form>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
