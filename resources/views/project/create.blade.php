@extends('project.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Create New Cavi Project</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('project.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('project.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Type the Title of your project">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Context:</strong>
                <textarea class="form-control" style="height:150px" name="context" placeholder="Context of your project"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Text:</strong>
                <textarea class="form-control" style="height:150px" name="text" id="text" cols="30" rows="10" placeholder="Brief description about your project"></textarea>
           </div>
        </div>
        <div>
            <div class="form-group">
                <label for="date"><strong>Date:</strong></label>
                <input type="date" id="start" name="date">
            </div>
        </div>
        <div>            
            <div class="form-group">
                  <label for="project name"><strong>Project Name:</strong></label>
                <select class="form-control form-control-sm" name="select" id="select">
                   <option>Oficemate</option>
                   <option>CV</option>
                </select>
          </div> 
        </div>
        <div>
            <div class="form-group">
            <label class="custom-control custom-radio">
                <label for="stack"><strong>Stack:</strong></label>
              <input type="radio" name="radio_button" id="Stack" value="Backend" class="custom-control-input"> Backend
              <input type="radio" name="radio_button" id="Stack" value="Frontend" class="custom-control-input"> Frontend
              <input type="radio" name="radio_button" id="Stack" value="Devops" class="custom-control-input"> Devops
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description"></span>
            </label>
            </div>
        </div>
        <div>
            <div class="form-group">
                <label class="custom-control custom-checkbox">
                    <label for="proficiency"><strong>Proficiency:</strong></label>
                    <input type="checkbox" name="check_boxes" id="check_boxes" value="Expert" class="custom-control-input"> Expert
                    <input type="checkbox" name="check_boxes" id="check_boxes" value="Intermediate" class="custom-control-input"> Intermediate
                    <input type="checkbox" name="check_boxes" id="check_boxes" value="Beginner" class="custom-control-input"> Beginner
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"></span>
                </label>
            </div>
        </div>
        <div>
            <div class="form-group">
                <strong>More Details:</strong>
                <textarea name="text_area" id="text_area" cols="50" rows="10" placeholder="More details about your project"></textarea>
            </div>
        </div>
        <div>
            <div class="form-group">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
   
</form>
@endsection