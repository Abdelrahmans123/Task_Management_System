@extends('layouts.app')
@section('title','Assign Employee')
@section('content')
    @include('inc.success')
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th> #</th>
                <th>Employee Name </th>
                <th>Task Name </th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($assign as $item )
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $item->employee->name}}</td>
                    <td>{{ $item->task->taskName}}</td>
                    <td class="d-flex">
                        <a href="{{url('assign/'. $item->id.'/edit')}}" class="btn btn-primary me-1">Edit</a>
                        <form action="{{ url('assign/'. $item->id) }}" method="Post">
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
