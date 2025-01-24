@extends('layouts.app')
@section('title','Edit Project')
@section('content')
    @include('inc.error')
    <h1 class="m-3">Edit Project</h1>
    <div class="container">
        <form action="{{route('project.update',$projects->id)}}" method="POST" >
            @csrf
            @METHOD('PUT')
            <div class="m-3">
                <label>Project Name</label>
                <input type="text" class="form-control" name="projectName" value="{{$projects->projectName}}">
            </div>
            <div class="m-3">
                <label>Project Start Date</label>
                <input type="date" class="form-control" name="startDate" value="{{$projects->startDate}}">
            </div>
            <div class="m-3">
                <label>Project Due Date</label>
                <input type="date" class="form-control" name="dueDate" value="{{$projects->dueDate}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
