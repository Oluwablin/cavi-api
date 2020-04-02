@extends('project.layout')
 
@section('content')
    {{-- <div class="row">
        <div class="col-lg-14 margin-tb">
            <div class="pull-left">
                <h2>CAV API</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('project.create') }}"> Create New CAV Project</a>
            </div>
        </div>
    </div> --}}
@endsection

@section('bottom-content')
	<div class="container-fluid container-fixed-lg bg-white">
		<!-- START PANEL -->
		<div class="panel panel-transparent">
			<div class="panel-heading">
				<div class="panel-title">
					Projects
				</div>
				<h4>
					{{-- <a href="javascript:void(0);" onclick="addProject()" class="btn btn-default pull-right">
						<i class="fa fa-users"></i> Add New CAV Project
                    </a> --}}
                    <button type="button" class="btn btn-primary" data-toggle="modal" onclick="addProject()" data-target="#add-new-project-modal">
                        <i class="fa fa-plus"></i> Create New Project
                    </button>
				</h4>
	       </div>
               @if ($message = Session::get('success'))
               <div class="alert alert-success">
               <p>{{ $message }}</p>
               </div>
               @endif

            <div class="panel-body">
               <br /><br />
               <table id="project-table" class="table table-bordered font-title">
                   <thead>
                       <tr>
                           <th>No</th>
                           <th>Created By</th>
                           <th>Title</th>
                           <th>Context</th>
                           <th>Description</th>
                           <th>Date</th>
                           <th>Project</th>
                           <th>Stack</th>
                           <th>Proficiency</th>
                           <th>More Details</th>
                           <th>Updated By</th>
                           <th>Actions</th>
                       </tr>
                   </thead>
                   
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->user_id }}</td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->context }}</td> 
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->start_date }}</td>
                                <td>{{ $project->project }}</td>
                                <td>{{ $project->stack }}</td>
                                <td>{{ $project->proficiency }}</td>
                                <td>{{ $project->details }}</td>
                                <td>{{ $project->updated_by }}</td>
                                <td>
                                    
                                    <button type="submit" class="btn btn-primary" title="Edit Project" data-toggle="modal" onclick="editProject()" data-target="#edit-project-modal">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    
        
                                    <form action="delete/project" >
                                    <button type="submit" class="btn btn-danger"title="Delete Project"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                           </tr>
                       @endforeach
                   </tbody>
                   <tfoot class="thead">
                       <tr>
                           <th>No</th>
                           <th>Created By</th>
                           <th>Title</th>
                           <th>Context</th>
                           <th>Description</th>
                           <th>Date</th>
                           <th>Project</th>
                           <th>Stack</th>
                           <th>Proficiency</th>
                           <th>More Details</th>
                           <th>Updated By</th>
                           <th>Actions</th>
                       </tr>
                 </tfoot>
               </table>
           </div>
       </div>
       <!-- END PANEL -->
   </div>

@include('project.modals')
@endsection       


@push('scripts')
	<link href="{{ asset('assets/plugins/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css') }}" media="screen" rel="stylesheet" type="text/css">
  	<script src="{{ asset('assets/plugins/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js') }}"></script>
	<script src="{{asset('js/printme.js')}}"></script>
	<script src="{{asset('js/numeral.js')}}"></script>
	<script>
    	function addProject() {
    		$("#add-new-project-modal").modal();
    	}

        function editProject(project_id) {
    		// body...
    		fetch(`{{url('update/project')}}/${project_id}`).then(r => {
    			return r.json();
    		}).then(results => {
    			// console.log(results)
    			$("#edit_title").val(results.title);
				$("#edit_context").val(results.context);
				$("#edit_description").val(results.description);
				$("#edit_start_date").val(results.start_date);
				$("#edit_project").val(results.project);
				$("#edit_stack").val(results.stack);
				$("#edit_proficiency").val(results.proficiency);
                $("#edit_details").val(results.details);
    		}).catch(err => {
    			console.log(err);
    		})

    		$("#edit-project-modal").modal();
    	}

        function saveNewProject() {
    		$("#create-project-btn").prop({
    			disabled: true,
    		})
    		$("#create-project-btn").html(`
    			Creating....
    		`);
    		
            var _token 		= '{{ csrf_token() }}';
    		var title 		= $("#title").val();
    		var context 		= $("#context").val();
    		var description 		= $("#description").val();
    		var start_date 	= $("#start_date").val();
    		var project 	= $("#project").val();
    		var stack 	= $("#stack").val();
    		var proficiency 	= $("#proficiency").val();
            var details 	= $("#details").val();

    		var query = {_token, title, context, description, start_date, project, stack, proficiency, details}

    		fetch(`{{url('save/new/project')}}`, {
    			method: 'POST',
    			headers: {
    				'Content-Type': 'application/json',
    			},
    			body: JSON.stringify(query)
    		}).then(r => {
    			return r.json();
    		}).then(results => {
    			console.log(results)
    			if(results.status == "success"){
    				window.location.reload();
    			}else{
    				swal(
    					results.status,
    					results.message,
    					results.status
    				);
    				$("#create-project-btn").prop({
		    			disabled: false,
		    		})
		    		$("#create-project-btn").html(`
		    			Create
		    		`);
    			}
    		}).catch(err => {
    			console.log(err);
    			$("#create-project-btn").prop({
	    			disabled: false,
	    		})
	    		$("#create-project-btn").html(`
	    			Create
	    		`);
    		})

    		// return 
    		return false;
    	}

        function updateNewProject() {
    		$("#update-project-btn").prop({
    			disabled: true,
    		})
    		$("#update-project-btn").html(`
    			Updating....
    		`);
    		
            var _token 		= '{{ csrf_token() }}';
    		var title 		= $("#title").val();
    		var context 		= $("#context").val();
    		var description 		= $("#description").val();
    		var start_date 	= $("#start_date").val();
    		var project 	= $("#project").val();
    		var stack 	= $("#stack").val();
    		var proficiency 	= $("#proficiency").val();
            var details 	= $("#details").val();

    		var query = {_token, title, context, description, start_date, project, stack, proficiency, details}

    		fetch(`{{url('update/project/data')}}`, {
    			method: 'PUT',
    			headers: {
    				'Content-Type': 'application/json',
    			},
    			body: JSON.stringify(query)
    		}).then(r => {
    			return r.json();
    		}).then(results => {
    			console.log(results)
    			if(results.status == "success"){
    				window.location.reload();
    			}else{
    				swal(
    					results.status,
    					results.message,
    					results.status
    				);
    				$("#update-project-btn").prop({
		    			disabled: false,
		    		})
		    		$("#update-project-btn").html(`
		    			Update
		    		`);
    			}
    		}).catch(err => {
    			console.log(err);
    			$("#update-project-btn").prop({
	    			disabled: false,
	    		})
	    		$("#update-project-btn").html(`
	    			Update
	    		`);
    		})

    		// return 
    		return false;
    	}

        $('#project-table').each(function(i, v){
            var table = $(v).DataTable({
                dom: 'lfrB<"scroll-x"t>ip',
                order: [],
                pageLength: 10,
                buttons: [
                    'copy', 'excel', 'pdf', 'print', {
                        extend: 'colvis',
                        columns: ':gt(0)',
                        text: 'Columns'
                    }
                ]
            });
            $(v).find('tfoot th').each(function(key, val) {
                var title = $(this).text();
                if (key === $(v).find('tfoot th')) {
                    return false
                }
                $(this).html('<input type="text" class="my-input input-sm" placeholder="' + $.trim(title) + '" style="width:100%; border:none;"/>');
            });
            table.columns().every(function() {
                var that = this;
                $('input', this.footer()).on('keyup change', function() {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
            });
            $(v).find('tfoot tr').appendTo($(v).find('thead'));
        });

    </script>
@endpush      
