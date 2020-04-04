@extends('project.layout')
 
@section('content')
    <br />
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <h2>CAV API</h2>
            </div>

            <div class="float-right">
                <a href="javascript:void(0);" onclick="addProject()" class="pull-right btn btn-info">
                    <i class="fa fa-plus"></i> Add New CAV Project
                </a>
            </div>
        </div>
    </div>
    <br />
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="">
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
                <tbody id="load-all-projects"></tbody>
            </table>
        </div>
    </div>
  
    @include('project.modals') 
@endsection

@push('scripts')
    <script type="text/javascript">
        // load defaults
        fetchAllProjects();
        fetchProjectList();
        fetchStackList();
        fetchProficiencyList();
        fetchAllProjects();
        fetchOneProject();

        function addProject() {
    		$("#add-new-project-modal").modal();
    	}

        function editProject(ProjectRef) {
            console.log(ProjectRef);
			fetch(`{{ url('fetch/one/project/by/id/{id}') }}?ProjectRef=`+ProjectRef, {
				method: 'GET'
			}).then(r => {
				return r.json();
			}).then(results => {
				$("#editProjectRef").val(results.ProjectRef);
				$("#edit_title").val(results.title);
				$("#edit_context").val(results.context);
				$("#edit_description").val(results.description);
				$("#edit_start_date").val(results.start_date);
                $("#edit_project").val(results.project);
				$("#edit_stack").val(results.stack);
                $("#edit_proficiency").val(results.proficiency);
				$("#edit_details").val(results.details);
				
				// console.log(results)
			}).catch(err => {
				console.log(err);
			})

    		$("#edit-project-modal").modal();
    	}

        function fetchAllProjects() {
            fetch(`{{ url('fetch/all/added/project') }}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            }).then(r => {
                return r.json();
            }).then(results => {
                console.log(results);
                $("#load-all-projects").html("");
                $.each(results, function(index, val) {
                    $("#load-all-projects").append(`
                        <tr>
                            <td>${val.id}</td>
                            <td>${val.user_id}</td>
                            <td>${val.title}</td> 
                            <td>${val.start_date}</td>
                            <td>${val.project}</td>
                            <td>${val.stack}</td>
                            <td>${val.proficiency}</td>
                            <td>${val.created_at}</td>
                            <td>
                                <form action="" method="POST">
                            
                                    <a class="btn btn-info" href="javascript:void(0);" onclick="fetchOneProject(${val.id})" title="View Project"><i class="fa fa-search"></i></a>
                                    <a class="btn btn-primary" href="" title="Edit Project"><i class="fa fa-pencil"></i></a>
                
                                    @csrf
                                    @method('DELETE')
                    
                                    <button type="submit" class="btn btn-danger"title="Delete Project"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    `);
                });
            }).catch(err => {
                console.log(err);
            });
        }

        function displayCreateProject() {
            $("#createModalScrollable").modal();
        }

        function saveNewProject() {
            var _token 		= $("#token").val();
            var title       = $('#title').val();
            var context     = $('#context').val();
            var description = $('#description').val();
            var start_date  = $('#start_date').val();
            var project     = $('#project').val();
            var stack       = $('#stack').val();
            var proficiency = $('#proficiency').val();
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
                    fetchAllProjects();
                },
            });

            // return stop the form from loading
           return false;

            $("#create-project-btn").modal();
        }

        function updateNewProject() {
            var _token 			= $("#token").val();
            var title       = $('#edit_title').val();
            var context     = $('#edit_context').val();
            var description = $('#edit_description').val();
            var start_date  = $('#edit_start_date').val();
            var project     = $('#edit_project').val();
            var stack       = $("#edit_stack").val();
            var proficiency = $("#edit_proficiency").val();
            var details     = $('#edit_details').val();

            $.ajax({
                url: "/update/project",
                type: "PUT",
                data:{
                    "_token": "{{ csrf_token() }}",
                    title:edit_title,
                    context:edit_context,
                    description:edit_description,
                    start_date:edit_start_date,
                    project:edit_project,
                    stack:edit_stack,
                    proficiency:edit_proficiency,
                    details:edit_details,
                },
                success:function(response){
                    console.log(response);
                },
            });

            // return stop the form from loading
           return false;
        }

        function fetchOneProject(project_id) {
            $("#spinner").show();
            console.log(project_id);
            fetch(`{{ url('/view/project') }}/${project_id}`).then(r => r.json()).then(result => {
                //$("#edit_lettertype").val(result.letter_type_id);
                // $("#edit_subject").val(result.subject);
                $("#myLargeModalLabel").html(result.title);
                $("#contextText").html(result.context);
                $("#descriptionText").html(result.description);
                $("#dateText").html(result.start_date);
                $("#projectText").html(result.project);
                $("#stackText").html(result.stack);
                $("#proficiencyText").html(result.proficiency);
                $("#detailsText").html(result.details);
                $("#fetchOneProjectModal").modal();
                $("#spinner").hide();
            }).catch(err => {
                console.log(err);
            });
        }

        function fetchProjectList() {
            fetch(`{{ url('fetch/project/list') }}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            }).then(r => {
                return r.json();
            }).then(results => {
                // console.log(results);
                $("#project").html("");
                $.each(results, function(index, val) {
                    $("#project").append(`
                        <option value="${val.id}"> ${val.name} </option>
                    `);
                });
            }).catch(err => {
                console.log(err);
            });
        }

        function fetchStackList() {
            fetch(`{{ url('fetch/stack/list') }}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            }).then(r => {
                return r.json();
            }).then(results => {
                //console.log(results);
                $("#stack").html("");
                $.each(results, function(index, val) {
                    $("#stack").append(`
                        <option value="${val.id}"> ${val.name} </option>
                    `);
                });
            }).catch(err => {
                console.log(err);
            })
        }

        function fetchProficiencyList() {
            fetch(`{{ url('fetch/proficiency/list') }}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            }).then(r => {
                return r.json();
            }).then(results => {
                //console.log(results);
                $("#proficiency").html("");
                $.each(results, function(index, val) {
                    $("#proficiency").append(`
                        <option value="${val.id}"> ${val.name} </option>
                    `);
                });
            }).catch(err => {
                console.log(err);
            })
        }

        // get all projects
        function fetchAllProjects() {
            fetch(`{{url('fetch/all/projects')}}`).then(r => {
                return r.json();
            }).then(results => {
                // console.log(results);
                //var sn = 0;
                $("#oad-all-projects").html("");
                $.each(results, function(index, val) {
                    //sn++;
                    $("#load-all-projects").append(`
                        <tr>
                                <td>${val.id}</td>
                                <td>${val.created_by}</td>
                                <td>${val.title}</td>
                                <td>${val.start_date}</td>
                                <td>${val.project}</td>
                                <td>${val.stack}</td>
                                <td>${val.proficiency}</td>
                                <td>${val.created_at}</td>
                                <td>
                                   <a class="btn btn-info" href="javascript:void(0);" onclick="fetchOneProject(id)/{id}" title="View Project"><i class="fa fa-search"></i>
                                   </a>
                                   <a class="btn btn-primary" href="javascript:void(0);" onclick="editProject()" title="Edit Project"><i class="fa fa-pencil"></i>
                                   </a>
                                   <form action="delete/project" method="DELETE" >
                                    <button type="submit" class="btn btn-danger"title="Delete Project"><i class="fa fa-trash"></i>
                                    </button>
                                    </form>
                                    
                               </td>
                               
                        </tr>
                    `);
                });
            }).catch(err => {
                console.log(JSON.stringify(err));
            })
        }

        // function fetchAllProjects() {
		// 	fetch(`{{url('fetch/all/projects')}}`, {
		// 		method: 'GET',
		// 		headers: {
		// 			'Content-Type': 'application/json',
		// 		}
		// 	}).then(r => {
		// 		return r.json();
		// 	}).then(results => {
		// 		console.log(results)
		// 	}).catch(err => {
		// 		console.log(JSON.stringify(err));
		// 	})
        //     $("#load-all-projects").html(`
        // //     <tr>
        //                     <td>${sn}</td>
        //                     <td>${val.created_by}</td>
        //                     <td>${val.title}</td>
        //                     <td>${val.start_date}</td>
        //                     <td>${val.stack}</td>
        //                     <td>${val.proficiency}</td>
        //                     <td>${val.created_at}</td>
        //                     <td>
        //                         <a href="{{url('equity/show/stocks')}}/${val.CustomerID}" class="btn btn-info">
        //                             <i class="fa fa-clone"></i> View Transactions
        //                         </a>
        //                     </td>
        //                 </tr>
        //             `);
		// }

    </script>
@endpush
