@extends('project.layout')
 
@section('content')
    <br />
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <h2>CAV API</h2>
            </div>

            <div class="float-right">
                <button type="button" class="btn btn-primary" onclick="displayCreateProject()">
                    <i class="fa fa-plus"></i> Create New Project
                </button>
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
            var title       = $('#title').val();
            var context     = $('#context').val();
            var description = $('#description').val();
            var start_date  = $('#start_date').val();
            var project     = $("input[name='project']:selected").val();
            var stack       = $("input[name='stack']:selected").val();
            var proficiency = $("input[name='proficiency']:selected").val();
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

        function fetchOneProject(project_id) {
            $("#spinner").show();
            console.log(project_id);
            fetch(`{{ url('/view/project') }}/${project_id}`).then(r => r.json()).then(result => {
                //$("#edit_lettertype").val(result.letter_type_id);
                // $("#edit_subject").val(result.subject);
                // $("#edit_letterbody").val(result.body);
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
    
        // function fetchOneProject(project_id) {
        //     console.log(project_id);
        // }

        function fetchProjectList() {
            fetch(`{{ url('fetch/project/list') }}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            }).then(r => {
                return r.json();
            }).then(results => {
                console.log(results);
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
                console.log(results)
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
                console.log(results)
            }).catch(err => {
                console.log(err);
            })
        }
    </script>
@endpush
