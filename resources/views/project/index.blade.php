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
        fetchOneProject();

        function addProject() {
    		$("#add-new-project-modal").modal();
    	}

        function deleteProject(project_id) {
            var _token = '{{ csrf_token()}}';
            var query = {_token}
            fetch(`{{ url('/delete/project') }}/${project_id}`, {
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

        function editProject(project_id) {
            $("#spinner").show();
            console.log(project_id);
            fetch(`{{ url('/view/project') }}/${project_id}`).then(r => r.json()).then(result => {
                //$("#edit_lettertype").val(result.letter_type_id);
                // $("#edit_subject").val(result.subject);
                $('#editProjectRef').val(result.id);
                $('#edit_title').val(result.title);
                $('#edit_context').val(result.context);
                $('#edit_description').val(result.description);
                $('#edit_start_date').val(result.start_date);
                $('#edit_project').val(result.project);
                $('#edit_stack').val(result.stack);
                $('#edit_proficiency').val(result.proficiency);
                $('#edit_details').val(result.details);
                $('#edit-project-modal').modal();
                $("#spinner").hide();
            }).catch(err => {
                console.log(err);
            });
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
        }

        function updateNewProject() {
            var id          = $('#editProjectRef').val();
            var _token 	    = $('#token').val();
            var title       = $('#edit_title').val();
            var context     = $('#edit_context').val();
            var description = $('#edit_description').val();
            var start_date  = $('#edit_start_date').val();
            var project     = $('#edit_project').val();
            var stack       = $('#edit_stack').val();
            var proficiency = $('#edit_proficiency').val();
            var details     = $('#edit_details').val();

            $.ajax({
                url: "/update/project",
                type: "POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    id:id,
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

    </script>
@endpush
