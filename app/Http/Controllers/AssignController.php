<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Assign;
use App\Models\Employee;
use Illuminate\Http\Request;

class AssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assign=Assign::all();
        return view('Assign.index',compact('assign'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $employee=Employee::find($id)->first();
        $task=Task::all();
        return view('Assign.create',compact('employee','task'));
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
                'employeeId'=>'required|exists:employees,id',
                'taskId'=>'required|exists:tasks,id',
            ]
        );
        $task=$request->taskId;
        $assign=new Assign();
        $assign->employee_id=$request->employeeId;
        $assign->task_id=$request->taskId;
        $assign->save();
        $employee=Employee::first();
        // $employee->notify(new assignEmployee($task));
        return redirect('assign')->with('success','Employee Assigned Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assign  $assign
     * @return \Illuminate\Http\Response
     */
    public function show(Assign $assign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assign  $assign
     * @return \Illuminate\Http\Response
     */
    public function edit(Assign $assign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assign  $assign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assign $assign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assign  $assign
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assign=Assign::find($id);
        $assign->delete();
        return redirect('assign')->with('success','Deleted Successfully');
    }
}
