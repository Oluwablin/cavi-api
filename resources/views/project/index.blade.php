@extends('project.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-14 margin-tb">
            <div class="pull-left">
                <h2>CAV API</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('project.create') }}"> Create New CAV Project</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Context</th>
            <th>Text</th>
            <th>Date</th>
            <th>Project Name</th>
            <th>Stack</th>
            <th>Proficiency</th>
            <th>More Details</th>
            <th>Actions</th>
        </tr>
        @foreach ($projects as $project)
        <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project->title }}</td>
            <td>{{ $project->context }}</td> 
            <td>{{ $project->text }}</td>
            <td>{{ $project->date }}</td>
            <td>{{ $project->select }}</td>
            <td>{{ $project->radio_button }}</td>
            <td>{{ $project->check_boxes }}</td>
            <td>{{ $project->text_area }}</td>
            <td>
                <form action="{{ route('project.destroy',$project->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('project.show',$project->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('project.edit',$project->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
