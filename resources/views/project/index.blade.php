@extends('project.layout')
 
@section('content')
    <br />
    <style>
        body {
  background-image: url("img_tree.gif"), url("paper.gif");
  background-color: whitesmoke;
}

        #grad1 {
  height: 200px;
  background-color: #cccccc;
  background-image: linear-gradient(red, yellow);
}
    </style>

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
            <table class="table table-bordered">
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
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Created By</th>
                        <th>Title</th>
                        <th>Starting Date</th>
                        <th>Project Name</th>
                        <th>Stack</th>
                        <th>Proficiency</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
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
        // fetchOneProject();


        function addProject() {
    		$("#add-new-project-modal").modal();
    	}

        function deleteProject(project_id) {
            if(!confirm("Are you sure ?"))
            event.preventDefault();
            else{
            var _token = '{{ csrf_token()}}';
            var query = {_token}
            fetch(`{{ url('delete/project') }}/${project_id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(query)
            }).then(r => {
                return r.json();
            }).then(results => {
                console.log(results);
               
            }).catch(err => {
                console.log(err);
            });
            fetchAllProjects();	
    	}
        }

        function editProject(project_id) {
           $("#spinner").show();
            console.log(project_id);
            $("#editProjectRef").val(project_id);
            fetch(`{{ url('view/project') }}/${project_id}`).then(r => r.json()).then(result => {
                $('#edit_title').val(result.title);
                $('#edit_context').val(result.context);
                $('#edit_description').val(result.description);
                $('#edit_start_date').val(result.start_date);
                $('#edit_project').val(result.project);
               // $("input[type='radio']:checked").val(result.stack);
               // $("input[type='checkbox']:checked").val(result.proficiency);
                resolveStackList(result.stack);
                resolveProficiencyList(result.proficiency);
                $('#edit_details').val(result.details);
                $('#edit-project-modal').modal();
                $("#spinner").hide();
            }).catch(err => {
                console.log(err);
            });
    	}

        function fetchAllProjects() {
            fetch(`{{ url('fetch/all/added/projects') }}`, {
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
                            <td>${val.updated_at}</td>
                            <td>
                                    <a class="btn btn-info" href="javascript:void(0);" onclick="fetchOneProject(${val.id})" title="View Project"><i class="fa fa-search"></i></a>
                                    <a class="btn btn-primary" href="javascript:void(0);" onclick="editProject(${val.id})" title="Edit Project"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0);" onclick="deleteProject(${val.id})" class="btn btn-danger" title="Delete Project"><i class="fa fa-trash"></i></a>
                                    
                            </td>
                        </tr>
                    `);
                });
            }).catch(err => {
                console.log(err);
            });
        }

        function saveNewProject() {
            var _token 		= $('#token').val();
            var title       = $('#title').val();
            var context     = $('#context').val();
            var description = $('#description').val();
            var start_date  = $('#start_date').val();
            var project     = $('#project').val();
            var stack       = $("input[name='stack']:checked").val();
            var proficiency = $("input[name='proficiency']:checked").val();
            var details     = $('#details').val();

            $.ajax({
                url: "add/project",
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
            $('#add-new-project-modal').modal('hide');
            fetchAllProjects();
            // return stops the form from loading
           return false;
        }

        function updateNewProject() {  
            var id          = $('#editProjectRef').val();
            var _token 	    = $('#token').val();
            var title       = $('#edit_title').val();
            var context     = $('#edit_context').val();
            var description = $('#edit_description').val();
            var start_date  = $('#edit_start_date').val();
            var project     = $('#edit_project').val();
            var stack       = $("input[name='stack']:checked").val();
            var proficiency = $("input[name='proficiency']:checked").val();
            var details     = $('#edit_details').val();

            var _token = '{{ csrf_token()}}';
            var query = {id, _token, title, context, description, start_date, project, stack, proficiency, details}
            fetch(`{{ url('update/project') }}/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(query)
            }).then(r => {
                return r.json();
            }).then(results => {
                console.log(results);
               
            }).catch(err => {
                console.log(err);
            });
            $('#edit-project-modal').modal('hide');
            fetchAllProjects();
            // return stops the form from loading
           return false;
        }

        function fetchOneProject(project_id) {
            $("#spinner").show();
            console.log(project_id);
            fetch(`{{ url('view/project') }}/${project_id}`).then(r => r.json()).then(result => {
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
                $("#project").append(`
                    <option value=""> -- Select Project -- </option>
                `);
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
                $("#all-stack").html("");
                $("#edit-all-stack").html("");
                $.each(results, function(index, val) {
                    $("#all-stack").append(`
                        <input type="radio" class="form-check-input" name="stack" value="${val.id}">${val.name}<br>
                    `);
                    $("#edit-all-stack").append(`
                        <input type="radio" class="form-check-input" name="stack" value="${val.id}">${val.name}<br>
                    `);
                });
            }).catch(err => {
                console.log(err);
            })
        }

        function resolveStackList(stack_id) {
            fetch(`{{ url('fetch/stack/list') }}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            }).then(r => {
                return r.json();
            }).then(results => {
                //console.log(results); 
                $("#edit-all-stack").html("");
                $.each(results, function(index, val) {
                    if(val.id == stack_id){
                        $("#edit-all-stack").append(`
                        <input type="radio" class="form-check-input" name="stack" value="${val.id}" checked>${val.name}<br>
                       `);
                    }
                    else{
                        $("#edit-all-stack").append(`
                        <input type="radio" class="form-check-input" name="stack" value="${val.id}">${val.name}<br>
                       `);
                    }
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
                $("#all-proficiency").html("");
                $("#edit-all-proficiency").html("");
                $.each(results, function(index, val) {
                    $("#all-proficiency").append(`
                        <input type="checkbox" class="form-check-input" name="proficiency" value="${val.id}">${val.name}<br>
                    `);
                    $("#edit-all-proficiency").append(`
                        <input type="checkbox" class="form-check-input" name="proficiency" value="${val.id}">${val.name}<br>
                    `);
                });
            }).catch(err => {
                console.log(err);
            })
        }

        function resolveProficiencyList(proficiency_id) {
            fetch(`{{ url('fetch/proficiency/list') }}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            }).then(r => {
                return r.json();
            }).then(results => {
                //console.log(results); 
                $("#edit-all-proficiency").html("");
                $.each(results, function(index, val) {
                    if(val.id == proficiency_id){
                        $("#edit-all-proficiency").append(`
                        <input type="checkbox" class="form-check-input" name="proficiency" value="${val.id}" checked>${val.name}<br>
                       `);
                    }
                    else{
                        $("#edit-all-proficiency").append(`
                        <input type="checkbox" class="form-check-input" name="proficiency" value="${val.id}">${val.name}<br>
                       `);
                    }
                });
            }).catch(err => {
                console.log(err);
            })
        }

    </script>
@endpush
