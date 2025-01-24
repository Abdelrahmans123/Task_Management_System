@extends('layouts.app')
@section('title', 'Add Project')
@section('content')

    @include('inc.error')
    <h1 class="m-3">Add Project</h1>
    <div class="container">
        <form action="{{url('project/')}}" method="POST" >
            @csrf
            <div class="m-3">
                <label>Project Name</label>
                <input type="text" class="form-control" name="projectName" placeholder="Enter Project Name">
            </div>
            <div class="m-3">
                <label>Project Start Date</label>
                <input type="date" class="form-control" name="startDate" value="{{ date('Y-m-d') }}">
            </div>
            <div class="m-3">
                <label>Project Due Date</label>
                <input type="date" class="form-control" name="dueDate" placeholder="Enter Due Date">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
