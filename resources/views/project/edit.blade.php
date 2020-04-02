@extends('project.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Project</h2>
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
  
    <form action="{{ route('project.update',$project->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $project->title }}" class="form-control" placeholder="Type the Title of your project">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Context:</strong>
                    <textarea class="form-control" style="height:150px" name="context" placeholder="Context of your project">{{ $project->context }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Text:</strong>
                    <textarea class="form-control" style="height:150px" name="text" id="text" cols="30" rows="10" placeholder="Brief description about your project">{{ $project->text }}</textarea>
               </div>
            </div>
            <div>
                <div class="form-group">
                    <label for="date"><strong>Date:</strong></label> {{ $project->date }}
                    <input type="date" id="date" name="date">
                </div>
            </div>
            <div>
                  <div class="form-group">
                      <label for="project name"><strong>Project Name:</strong></label> {{ $project->select }}
                      <select class="form-control form-control-sm" name="select" id="select">
                            <option>Oficemate</option>
                            <option>CV</option>
                       </select>
                  </div>
            </div>
            <div>
                <div class="form-group">
                  <label class="custom-control custom-radio">
                     <label for="stack"><strong>Stack:</strong></label> {{ $project->radio_button }}
                     <input type="radio" name="radio_button" id="radio_button" value="Backend" class="custom-control-input"> Backend
                     <input type="radio" name="radio_button" id="radio_button" value="Frontend" class="custom-control-input"> Frontend
                     <input type="radio" name="radio_button" id="radio_button" value="Devops" class="custom-control-input"> Devops
                     <span class="custom-control-indicator"></span>
                     <span class="custom-control-description"></span>
                  </label>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <label for="proficiency"><strong>Proficiency:</strong></label> {{ $project->check_boxes }}
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
                    <textarea name="text_area" id="text_area" cols="50" rows="10" placeholder="More details about your project">{{ $project->text_area }}</textarea>
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