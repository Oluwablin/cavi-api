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
    protected $guarded = [];

    //protected $fillable = ['title', 'context', 'text', 'date', 'select', 'radio_button', 'check_boxes', 'text_area'];

    /*
    |-----------------------------------------
    | This enable user to add new project
    |-----------------------------------------
    */
    public function addProject($payload){
        // body
        
    }

    /*
    |-----------------------------------------
    | This enable user to update project
    |-----------------------------------------
    */
    public function updateProject($payload){
        // body
        
    }

    /*
    |-----------------------------------------
    | This enable user to delete project
    |-----------------------------------------
    */
    public function deleteProject($payload){
        // body
        
    }

    /*
    |-----------------------------------------
    | SHOW
    |-----------------------------------------
    */
    public function deleteAllProject(Request request){
        // body
        
    }

}
