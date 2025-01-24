@extends('layouts.app')
@section('title', 'Employee')
@section('content')
@include('layouts.sidebar')

    @include('inc.success')


    <div class="container">
        <a href="{{url('employee/create')}}" class="btn btn-primary m-2">Add New Employee</a>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Employee Name </th>
                <th>Employee Role </th>
                <th>Employee Email </th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($employee as $emp)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $emp->name}}</td>
                    <td>{{ $emp->role}}</td>
                    <td>{{ $emp->email}}</td>
                    <td class="d-flex">
                        <a href="{{url('assign/' . $emp->id)}}" class="btn btn-success me-1">Assign</a>
                    <a href="{{url('employee/' . $emp->id . '/edit')}}" class="btn btn-primary me-1">Edit</a>
                    <form action="{{ route('employee.destroy', $emp->id) }}" method="Post">
                        @csrf
                        @method('DELETE')
                       <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
