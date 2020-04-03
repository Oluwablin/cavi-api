@extends('project.layout')
 
@section('content')
    <br />
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <h2>CAV API</h2>
            </div>

            <div class="float-right">
                <a class="btn btn-success" href="{{ route('project.create') }}"> Create New CAV Project</a>
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
        fetchProjectList();
        fetchStackList();
        fetchProficiencyList();

        function saveNewProject() {
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
        }

        // function fetchOneProject(project_id) {
        //     $("#spinner").show();
        //     console.log(project_id);
        //     fetch(`{{ url('/view/project') }}/${project_id}`).then(r => r.json()).then(result => {
        //         //$("#edit_lettertype").val(result.letter_type_id);
        //         $("#edit_subject").val(result.subject);
        //         $("#edit_letterbody").val(result.body);
        //         $("#viewModalScrollable").modal();
        //         $("#spinner").hide();
        //         }).catch(err => {
        //         console.log(err);
        //     });
        // }
    
        function fetchOneProject(project_id) {
            console.log(project_id);
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
