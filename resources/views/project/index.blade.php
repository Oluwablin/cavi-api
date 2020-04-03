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

    <div class="row">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Created By</th>
                    <th>Title</th>
                    <th>Starting Date</th>
                    <th>Project Name</th>
                    <th>Stack</th>
                    <th>Proficiency</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->user_id }}</td>
                    <td>{{ $project->title }}</td> 
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->project }}</td>
                    <td>{{ $project->stack }}</td>
                    <td>{{ $project->proficiency }}</td>
                    <td>{{ $project->created_at }}</td>
                    <td>
                        <form action="{{ route('project.destroy',$project->id) }}" method="POST">
                            
                            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-view-modal-lg" data-id="{{ $project->id }}">
                                View Project
                            </button> --}}
                            {{-- <a class="btn btn-info" href="{{ route('project.show',$project->id) }}">View</a> --}}
                            
                            <a class="btn btn-info" href="javascript:void(0);" onclick="fetchOneProject({{ $project->id }})" title="View Project"><i class="fa fa-search"></i></a>
                            <a class="btn btn-primary" href="{{ route('project.edit',$project->id) }}" title="Edit Project"><i class="fa fa-edit"></i></a>
        
                            @csrf
                            @method('DELETE')
            
                            <button type="submit" class="btn btn-danger"title="Delete Project"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  
    @include('project.models') 
@endsection

@push('scripts')
    <script type="text/javascript">
        $('#createProject').on('sumbit', function(event) {
            event.preventDefault();

            var title       = $('#title').val();
            var context     = $('#context').val();
            var description = $('#description').val();
            var start_date  = $('#start_date').val();
            var project     = $('#project:selected').val();
            var stack       = $("input[name='stack']:checked").val();
            var proficiency = $("input[name='proficiency']:checked").val();
            var details     = $('#details').val();

            $.ajax({
                url: "/add/project",
                type: "POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    title:title,
                    context:context,
                    description:description,
                    start_date:start_date,
                    project:project,
                    stack:stack,
                    proficiency:proficiency,
                    details:details,
                },
                success:function(response){
                    console.log(response);
                },
            });
        });


    //     function fetchOneProject(project_id) {
    //     $("#spinner").show();
	// 	  console.log(project_id);
	// 	fetch(`{{ url('/view/project') }}/${project_id}`).then(r => r.json()).then(result => {
	// 	  //$("#edit_lettertype").val(result.letter_type_id);
	// 	  $("#edit_subject").val(result.subject);
	// 	  $("#edit_letterbody").val(result.body);
	// 	  $("#viewModalScrollable").modal();
	// 	  $("#spinner").hide();
	// 	}).catch(err => {
	// 	  console.log(err);
	// 	});
    //   }
    
        function fetchOneProject(project_id) {
            console.log(project_id);
        }

        $( document ).ready( fetchOneProject(project_id) );
    </script>
@endpush
