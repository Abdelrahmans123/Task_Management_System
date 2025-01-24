@extends('layouts.app')
@section('title','Assign Employee')
@section('content')
    @include('inc.error')
    <h1 class="m-3">Assign Employee</h1>
    <div class="container">
        <form action="{{url('assign/')}}" method="POST" >
            @csrf
            <div class="m-3">
                <input type="hidden" value="{{$employee->id}}" name="employeeId">
                <label>Employee Name</label>
                <input type="text" class="form-control" name="employeeName" value="{{$employee->name}}">
            </div>

            <div class="m-3">
                <label>Task Name</label>
                <select class="form-select" name="taskId" id="">
                    @foreach ($task as $item)
                        <option value="{{$item->id}}">{{$item->taskName}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
