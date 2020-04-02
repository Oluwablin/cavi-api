<!-- create new project form -->
<div class="modal fade" id="add-new-project-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Create CAV Project</h4>
            </div>
            <div class="modal-body">
                <form action="add/project" method="POST" onsubmit="return saveNewProject()">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <textarea name="title" id="title" placeholder="Type the Title of your project..." class="form-control" id="title"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="context">Context</label>
                                <textarea name="context" id="context" placeholder="Context of your project..." class="form-control" id="context"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="50" rows="10" placeholder="Describe your project..." class="form-control" id="description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_date"><strong>Date:</strong></label>
                                <input type="date" id="start_date" name="start_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="project"><strong>Project Name:</strong></label>
                                <select class="form-control" name="project" id="project">
                                    <option value=""> -- Select Project --</option>
                                    <option value="1"> Officemate </option>
                                    <option value="2"> TIMS </option>
                                    <option value="3"> CATSS </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stack"><strong>Stack:</strong></label>
                                <select class="form-control" name="stack" id="stack">
                                    <option value=""> -- Select Stack --</option>
                                    <option value="1"> Frontend Developer </option>
                                    <option value="2"> Backend Developer </option>
                                    <option value="3"> Devs Ops </option>
                                    <option value="4"> Designer UI/UX </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <label for="proficiency"><strong>Proficiency:</strong></label>
                                    <input type="checkbox" name="proficiency" id="proficiency" value="1" class="custom-control-input"> Expert
                                    <input type="checkbox" name="proficiency" id="proficiency" value="2" class="custom-control-input"> Intermediate
                                    <input type="checkbox" name="proficiency" id="proficiency" value="3" class="custom-control-input"> Beginner
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="details"><strong>More Details:</strong></label>
                                <textarea name="details" id="details" cols="50" rows="10" placeholder="More details about your project... "></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button class="btn btn-info" id="create-project-btn">Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="pull-right">
                    <button class="btn btn-flat" type="button" data-dismiss="modal">
                        close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- create new project form -->
<div class="modal fade" id="edit-project-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="edit-project-title"> EDIT CAV PROJECT</h4>
            </div>
            <div class="modal-body">
                <form action="update/project" method="PUT" onsubmit="return updateNewProject()">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_title">Title</label>
                                <textarea name="title" id="title" placeholder="Type the Title of your project..." class="form-control" id="edit_title">"{{ $project->title }}"</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_context">Context</label>
                                <textarea name="context" id="context" placeholder="Context of your project..." class="form-control" id="edit_context">{{ $project->context }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_description">Description</label>
                                <textarea name="description" id="description" cols="50" rows="10" placeholder="Describe your project..." class="form-control" id="edit_description">{{ $project->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_start_date"><strong>Date:</strong></label>
                                <input value="{{ $project->start_date }}" type="date" id="edit_start_date" name="start_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_project"><strong>Project Name:</strong></label>
                                <select class="form-control" name="project" id="edit_project">
                                    <option value="{{ $project->project }}">{{ $project->project }}</option>
                                    <option value="1"> Officemate </option>
                                    <option value="2"> TIMS </option>
                                    <option value="3"> CATSS </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_stack"><strong>Stack:</strong></label>
                                <select class="form-control" name="stack" id="edit_stack">
                                    <option value="{{ $project->stack }}">{{ $project->stack }}</option>
                                    <option value="1"> Frontend Developer </option>
                                    <option value="2"> Backend Developer </option>
                                    <option value="3"> Devs Ops </option>
                                    <option value="4"> Designer UI/UX </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <label for="edit_proficiency"><strong>Proficiency:</strong></label>{{ $project->proficiency }}
                                    <input type="checkbox" name="proficiency" id="edit_proficiency" value="1" class="custom-control-input"> Expert
                                    <input type="checkbox" name="proficiency" id="edit_proficiency" value="2" class="custom-control-input"> Intermediate
                                    <input type="checkbox" name="proficiency" id="edit_proficiency" value="3" class="custom-control-input"> Beginner
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_details"><strong>More Details:</strong></label>
                                <textarea name="details" id="edit_details" cols="50" rows="10" placeholder="More details about your project... ">{{ $project->details }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button class="btn btn-info" id="update-project-btn">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="pull-right">
                    <button class="btn btn-flat" type="button" data-dismiss="modal">
                        close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <!-- preview agent records -->
<div class="modal fade" id="show-agent-profile" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Preview</h4>
            </div>
            <div class="modal-body">
                <div id="load-agent-records"></div>
            </div>
            <div class="modal-footer">
                <div class="pull-right">
                    <button class="btn btn-flat" type="button" data-dismiss="modal">
                        close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div> --}}