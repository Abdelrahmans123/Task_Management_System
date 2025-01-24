@extends('layouts.app')
@section('title','Edit Employee')
@section('content')
    @include('inc.error')
    <h1 class="m-3 text-center">Edit Employee</h1>
    <div class="container">
        <form action="{{route('employee.update',$employees->id)}}" method="POST" >
            @method('PUT')
            @csrf
            <div class="m-3">
                <label>Employee Name</label>
                <input type="text" class="form-control" name="employeeName" value="{{$employees->name}}">
            </div>
            <div class="m-3">
                <label>Employee Role</label>
                <input type="text" class="form-control" name="role" value="{{$employees->role}}">
            </div>
            <div class="m-3">
                <label>Employee Email</label>
                <input type="email" class="form-control" name="email" value="{{$employees->email}}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
