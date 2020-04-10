<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    
    /**
     * The attributes that are mass assignable.
     * 
     * @var string
     */
    protected $table = "projects";

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /*
    |-----------------------------------------
    | This enable user to add new project
    |-----------------------------------------
    */
    public function addProject($payload){
        // body
        $project                = new Project();
        $project->user_id       = $payload->user_id ?? 1; // this should be user id
        $project->title         = $payload->title;
        $project->context       = $payload->context;
        $project->description   = $payload->description;
        $project->start_date    = $payload->start_date;
        $project->project       = $payload->project;
        $project->stack         = $payload->stack;
        $project->proficiency   = $payload->proficiency;
        $project->details       = $payload->details;
        $project->created_by    = $payload->created_by ?? 1; // this should be user id
        $project->updated_by    = $payload->updated_by ?? 1; // this should be user id
        if($project->save()){
            $data = [
                "status"   => "success",
                "message"  => "Project saved!" 
            ];
        }else{
            $data = [
                "status"   => "error",
                "message"  => "Error saving project!" 
            ];   
        }

        // return 
        return $data;
    }

    /*
    |-----------------------------------------
    | This fetch and retur all projects
    |-----------------------------------------
    */
    public function allProjects($payload){
        // body
        $data = Project::orderBy('created_at', 'DESC')->get();
        $data->transform(function($item){
            $item->stack = $this->resolveStackName($item->stack);
            $item->project = $this->resolveProjectName($item->project);
            $item->proficiency = $this->resolveProficiencyName($item->proficiency);

            return $item;
        });

        // return
        return $data;
    }

    /*
    |-----------------------------------------
    | This fetch one project only using id
    |-----------------------------------------
    */
    public function oneProjectById($payload){
        // body
        $data = Project::where('id', $payload->id)->first();

        // return
        return $data;
    }

    /*
    |-----------------------------------------
    | This enable user to update project
    |-----------------------------------------
    */
    public function updateProject($payload){
        // body
        $project = Project::find($payload->id);
        if($project !== null){
            $project->title         = $payload->title;
            $project->context       = $payload->context;
            $project->description   = $payload->description;
            $project->start_date    = $payload->start_date;
            $project->project       = $payload->project;
            $project->stack         = $payload->stack;
            $project->proficiency   = $payload->proficiency;
            $project->details       = $payload->details;
            $project->updated_by    = $payload->updated_by ?? 1; // this should be user id
            if($project->save()){
                $data = [
                    "status"   => "success",
                    "message"  => "Project updated!" 
                ];
            }else{
                $data = [
                    "status"   => "error",
                    "message"  => "Error updating project!" 
                ];   
            }

        }else{
            $data = [
                "status"   => "error",
                "message"  => "No project found!" 
            ];  
        }

        // return 
        return $data;
    }

    /*
    |-----------------------------------------
    | This enable user to delete project
    |-----------------------------------------
    */
    public function deleteProject($payload){
        // body
        $project = Project::find($payload->id);
        if($project !== null){
            if($project->delete()){
                $data = [
                    "status"   => "success",
                    "message"  => "Project deleted!" 
                ];
            }else{
                $data = [
                    "status"   => "error",
                    "message"  => "Error deleting project!" 
                ];   
            }

        }else{
            $data = [
                "status"   => "error",
                "message"  => "No project found!" 
            ];  
        }

        // return 
        return $data;
    }

    /*
    |-----------------------------------------
    | This delete all projects at once
    |-----------------------------------------
    */
    public function deleteAllProject($payload){
        // body
        Project::truncate();
        $data = [
            "status"     => "success",
            "message"    => "All projects have been deleted!" 
        ];

        // return
        return $data;
    }

    /*
    |-----------------------------------------
    | SHOW
    |-----------------------------------------
    */
    public function getProjectList(){
        // body
        $projects = [
            [
                "id"    => 1,
                "name"  => "Officemate"
            ],
            [
                "id"    => 2,
                "name"  => "TIMS"
            ],
            [
                "id"    => 3,
                "name"  => "CATSS"
            ],
        ];

        // return
        return $projects;   
    }

    /*
    |-----------------------------------------
    | SHOW
    |-----------------------------------------
    */
    public function getStackList(){
        // body
        $stacks = [
            [
                "id"    => 1,
                "name"  => "Frontend Developer"
            ],
            [
                "id"    => 2,
                "name"  => "Backend Developer"
            ],
            [
                "id"    => 3,
                "name"  => "Devs Ops"
            ],
            [
                "id"    => 4,
                "name"  => "Designer UI/UX"
            ],
        ];

        // return
        return $stacks;
    }

    /*
    |-----------------------------------------
    | SHOW
    |-----------------------------------------
    */
    public function getProficiencyList(){
        // body
        $proficiency = [
            [
                "id"    => 1,
                "name"  => "Expert"
            ],
            [
                "id"    => 2,
                "name"  => "Intermediate"
            ],
            [
                "id"    => 3,
                "name"  => "Beginner"
            ],
            [ 
                "id"    => 4,
                "name"  => "Novice"
            ],
        ];


        // return
        return $proficiency;
    }

    /*
    |-----------------------------------------
    | SHOW
    |-----------------------------------------
    */
    public function resolveStackName($stack_id){
        // body
        $stacks = $this->getStackList();
        foreach ($stacks as $key => $value) {
            if($value['id'] == $stack_id){
                return $value['name'];
            }else{
                return null;
            }
        }
    }

    /*
    |-----------------------------------------
    | SHOW
    |-----------------------------------------
    */
    public function resolveProjectName($project_id){
        // body
        $projects = $this->getProjectList();

        foreach ($projects as $key => $value) {
            if($value['id'] == $project_id){
                return $value['name'];
            }else{
                return null;
            }
        }
    }

    /*
    |-----------------------------------------
    | SHOW
    |-----------------------------------------
    */
    public function resolveProficiencyName($proficiency_id){
        // body
        $proficiency = $this->getProficiencyList();

        foreach ($proficiency as $key => $value) {
            if($value['id'] == $proficiency_id){
                return $value['name'];
            }else{
                return null;
            }
        }
    }
}
