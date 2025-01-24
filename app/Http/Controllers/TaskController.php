<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task=Task::all();
        return view('Task.index',compact('task'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project=Project::all();
        return view('Task.create',compact('project'));
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
                'taskName'=>'required|string|unique:tasks,taskName',
                'projectId'=>'required|numeric|exists:projects,id',
                'taskprogress'=>'required|numeric',
            ]
        );
        $task=new Task();
        $task->taskName=$request->taskName;
        $task->progress=$request->taskprogress;
        $task->status="Uncompleted";
        $task->project_id=$request->projectId;
        $task->save();
        return redirect('task')->with('success','Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task=Task::find($id);

        return view('Task.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $project=Project::all();
        $task=Task::find($task->id);
        return view('Task.edit',compact('task'))->with('project',$project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate(
            [
                'taskName'=>'required|string',
                'taskprogress'=>'required|string',
                'projectId'=>'required|numeric|exists:projects,id',

            ]
        );
        $task=Task::find($task->id);
        $task->taskName=$request->taskName;
        $task->progress=$request->taskprogress;
        $task->project_id=$request->projectId;
        $task->save();
        return redirect('task')->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('task')->with('success','Deleted Successfully');
    }
    public function changeProgress($id){
        $task=Task::find($id);
        $task->Status='Completed';
        $task->progress='100';
        $task->save();
        return redirect('task')->with('success','Progress Changed Successfully');
    }
}
