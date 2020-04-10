<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    /**
     * NEW PROJECT IMPLEMENTATION STARTS
     */

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Project::all();
        //Show all projects from the database and return to view
        // $projects = Project::all();
        return view('project.index');
    }

    /*
    |-----------------------------------------
    | ADD NEW PROJECT
    |-----------------------------------------
    */
    public function addProject(Request $request){
        // body
        $project    = new Project();
        $data       = $project->addProject($request);

        // return response
        return response()->json($data, 200);
        // return redirect('/project')->with('success', 'New Project Successfully Created');
    }
    
    /*
    |-----------------------------------------
    | GET ALL PROJECT
    |-----------------------------------------
    */
    public function allProjects(Request $request){
        // body
        $project    = new Project();
        $data       = $project->allProjects($request);

        // return response
        return response()->json($data, 200);
    }
    
    /*
    |-----------------------------------------
    | GET PROJECT BY PROJECT ID
    |-----------------------------------------
    */
    public function oneProjectById(Request $request){
        // body
        $project    = new Project();
        $data       = $project->oneProjectById($request);

        // return response
        return response()->json($data, 200);
    }
    
    /*
    |-----------------------------------------
    | UPDATE ONE PROJECT
    |-----------------------------------------
    */
    public function updateProject(Request $request){
        // body
        $project    = new Project();
        $data       = $project->updateProject($request);

        // return response
        return response()->json($data, 200);
    }
    
    /*
    |-----------------------------------------
    | DELETE ONE PROJECT
    |-----------------------------------------
    */
    public function deleteProject(Request $request, $project_id){
        // body
        $request->id = $project_id;
        $project    = new Project();
        $data       = $project->deleteProject($request);

        // return response
        return response()->json($data, 200);
    }
    
    /*
    |-----------------------------------------
    | DELETE ALL PROJECTS
    |-----------------------------------------
    */
    public function deleteAllProject(Request $request){
        // body
        $project    = new Project();
        $data       = $project->deleteAllProject($request);

        // return response
        return response()->json($data, 200);
    }
    
    /*
    |-----------------------------------------
    | SHOW ALL PROJECT OPTIONS
    |-----------------------------------------
    */
    public function projects(Request $request){
        $projects    = new Project();
        $data       = $projects->getProjectList();

        // return response
        return response()->json($data, 200);
    }
    
    /*
    |-----------------------------------------
    | SHOW ALL STACKS
    |-----------------------------------------
    */
    public function stacks(Request $request){
        // body
        $stacks    = new Project();
        $data      = $stacks->getStackList();

        // return response
        return response()->json($data, 200);
    }

    /*
    |-----------------------------------------
    | SHOW ALL PROFICIENCY
    |-----------------------------------------
    */
    public function proficiency(Request $request){
        // body
        $proficiency    = new Project();
        $data           = $proficiency->getProficiencyList();

        // return response
        return response()->json($data, 200);
        
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //    return view('project.create');
    // }

    //  /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Project  $project
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //$project = Project::find($id);

    //     return view('project.show');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $project = Project::create($request->all());

    //     // return response()->json($project, 201);

    //     return redirect('/project')->with('success', 'New Project Successfully Created');
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $project = Project::find($id);

    //     return view('project.edit', compact('project'));
    // }

    //   /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Project  $project
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Project $project)
    // {
    //     $project->update($request->all());

    //     // return response()->json($project, 200);

    //     $project->save();

    //   return redirect('/project')->with('success', 'Project Successfully Updated');
    // }

    //  /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Project  $project
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Project $project)
    // {
    //     $project->delete();

    //     // return response()->json(null, 204);
    //     // session()->flash('message.alert', 'success');
    //     // session()->flash('message.content', "Project Successfully Deleted");
    //     // return back();
    //     return redirect('/project')->with('success', 'Project Successfully Deleted');
    // }

    //  /**
    //  * NEW PROJECT IMPLEMENTATION STARTS
    //  */

    //   /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     // return Project::all();
    //     //Show all projects from the database and return to view
    //     $projects = Project::all();
    //     // return view('project.index',['projects'=>$projects]);
    //     return ProjectResource::collection($projects);
    // }

    //  /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //    return view('project.create');
    // }

    //  /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Project  $project
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Project $project)
    // {
    //     // $project = Project::find($id);

    //     // return view('project.show', compact('project'));
    //     return new ProjectResource($project);
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $project = Project::create($request->all());

    //     return response()->json($project, 201);
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     $project = Project::find($id);

    //     return view('project.edit', compact('project'));
    // }

    //   /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Project  $project
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Project $project)
    // {
    // //     $project->update($request->all());

    // //     // return response()->json($project, 200);

    // //     $project->save();

    // //   return redirect('/project')->with('success', 'Project Successfully Updated');
    // $project->update($request->only(['title', 'context', 'text', 'date', 'select', 'radio_button', 'check_boxes', 'text_area']));
    // return new ProjectResource($project);
    // }

    //  /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Project  $project
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Project $project)
    // {
    //     $project->delete();

    //     // return response()->json(null, 204);
    //     // session()->flash('message.alert', 'success');
    //     // session()->flash('message.content', "Project Successfully Deleted");
    //     // return back();
    //     return redirect('/project')->with('success', 'Project Successfully Deleted');
    // }
    
}
