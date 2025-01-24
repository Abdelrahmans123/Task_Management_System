<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project=Project::all();
        foreach ($project as $item):
        $task=Task::join('assigns','tasks.id','=','assigns.task_id')->first();
        $emp=DB::table('assigns')->where('task_id',$task->id)->get();
        $count=$emp->count();
        if(!$count){
            $count=0;
        }
        endforeach;
        return view('Project.index',compact('project','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Project.create');
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
                'projectName'=>'string|required|unique:projects,projectName',
                'startDate'=>'date|required',
                'dueDate'=>'date|required|after:startDate',
            ]
        );
        $project=new Project();
        $project->projectName=$request->projectName;
        $project->startDate=$request->startDate;
        $project->dueDate=$request->dueDate;
        $project->save();
        return redirect('project')->with('success','Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $projects=Project::find($project->id);
        return view('Project.edit',compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate(
            [
                'projectName'=>'string|required',
                'startDate'=>'date|required',
                'dueDate'=>'date|required|after:startDate',
            ]
        );
        $projects=Project::find($project->id);
        $projects->projectName=$request->projectName;
        $projects->startDate=$request->startDate;
        $projects->dueDate=$request->dueDate;
        $projects->save();
        return redirect('project')->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('project')->with('success','Deleted Successfully');
    }
}
