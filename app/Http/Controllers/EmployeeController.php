<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee=Employee::all();
        return view('Employee.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task=Task::all();
        return view('Employee.create',compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'employeeName'=>'required|string',
                'role'=>'required|string',
                'email'=>'required|email|unique:employees,email',
                'taskId'=>'required|numeric|exists:tasks,id'
            ]
        );
        $employee=new Employee();
        $employee->name=$request->employeeName;
        $employee->role=$request->role;
        $employee->email=$request->email;
        $employee->task_id=$request->taskId;
        $employee->save();
        return redirect('employee')->with('success','Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $employees=Employee::find($employee->id);
        $task=Task::all();
        return view('Employee.edit',compact('employees'))->with('task',$task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate(
            [
                'employeeName'=>'required|string',
                'role'=>'required|string',
                'email'=>'required|email|unique:employees,email',
                'taskId'=>'required|numeric|exists:tasks,id'
            ]
        );
        $employees=Employee::find($employee->id);
        $employees->name=$request->employeeName;
        $employees->role=$request->role;
        $employees->email=$request->email;
        $employees->task_id=$request->taskId;
        $employees->save();
        return redirect('employee')->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('employee')->with('success','Deleted Successfully');
    }
}
