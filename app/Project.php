<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    //protected $fillable = ['title', 'context', 'text', 'date', 'select', 'radio_button', 'check_boxes', 'text_area'];
    protected $table = "projects";
}
