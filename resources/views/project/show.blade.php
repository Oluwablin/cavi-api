@extends('project.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('project.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $project->title ?? ''}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Context:</strong>
                {{ $project->context ?? ''}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <strong>Text:</strong>
               {{ $project->text ?? ''}}
           </div>
        </div>
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Date:</strong>
              {{ $project->date ?? '' }}
           </div>
       </div>
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
             <strong>Project Name:</strong>
             {{ $project->select ?? '' }}
          </div>
      </div>
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stack:</strong>
                {{ $project->radio_button ?? '' }}
           </div>
       </div>
       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
                <strong>Proficiency:</strong>
                {{ $project->check_boxes ?? '' }}
           </div>
       </div>
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>More Details:</strong>
                {{ $project->text_area ?? ''}}
           </div>
       </div>
   </div>
@endsection