{{-- MODAL TO CREATE A PARTICULAR PROJECT --}}
<div class="modal fade" id="add-new-project-modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Create CAV Project</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <form method="POST" onsubmit="return saveNewProject()">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <textarea name="title"  placeholder="Title of your project..." class="form-control" id="title"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="context">Context</label>
                                <textarea name="context"  placeholder="Context of your project..." class="form-control" id="context"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" cols="50" rows="10" placeholder="Describe your project..." class="form-control" id="description"></textarea>
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
                                    <option value="1">Officemate</option>
                                    <option value="2">TIMS</option>
                                    <option value="3">CATSS</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stack"><strong>Stack:</strong></label>
                                <select class="form-control" name="stack" id="stack">
                                    <option value=""> -- Select Stack --</option>
                                    <option value="1">Frontend Developer</option>
                                    <option value="2">Backend Developer</option>
                                    <option value="3">Devs Ops</option>
                                    <option value="3">Designer UI/UX</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="proficiency"><strong>Proficiency:</strong></label>
                                <select id="proficiency" name="proficiency" class="form-control">
                                    <option value=""> -- Select Proficiency --</option>
                                    <option value="1">Expert</option>
                                    <option value="2">Intermediate</option>
                                    <option value="3">Beginner</option>
                                </select>
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
                                <button class="btn btn-info" id="create-project-btn">Create Project</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- MODAL TO SHOW A PARTICULAR PROJECT --}}
<div class="modal fade bd-view-modal-lg" id="fetchOneProjectModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="col-md-12">
                    <p><strong>Context of Project</strong></p>
                    <p id="contextText"></p>
                </div>
                <div class="col-md-12">
                    <p><strong>Description of Project</strong></p>
                    <p id="descriptionText"></p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Starting Date</strong></p>
                        <p id="dateText"></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Project</strong></p>
                        <p id="projectText"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Stack</strong></p>
                        <p id="stackText"></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Proficiency</strong></p>
                        <p id="proficiencyText"></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <p><strong>More Details</strong></p>
                    <p id="detailsText"></p>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
        </div>
    </div>
</div>

{{-- MODAL TO EDIT A PARTICULAR PROJECT --}}
<div class="modal fade" id="edit-project-modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="edit-project-title"> EDIT CAV PROJECT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <form method="PUT" onsubmit="return updateNewProject()">
                    @csrf
                    <input type="hidden" id="editProjectRef" name="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_title">Title</label>
                                <textarea name="title" placeholder="Type the Title of your project..." class="form-control" id="edit_title"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_context">Context</label>
                                <textarea name="context" placeholder="Context of your project..." class="form-control" id="edit_context"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_description">Description</label>
                                <textarea name="description" cols="50" rows="10" placeholder="Describe your project..." class="form-control" id="edit_description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_start_date"><strong>Date:</strong></label>
                                <input value="" type="date" id="edit_start_date" name="start_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_project"><strong>Project Name:</strong></label>
                                <select class="form-control" name="project" id="edit_project">
                                    <option value=""> -- Select Project --</option>
                                    <option value="1">Officemate</option>
                                    <option value="2">TIMS</option>
                                    <option value="3">CATSS</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_stack"><strong>Stack:</strong></label>
                                <select class="form-control" name="stack" id="edit_stack">
                                    <option value=""> -- Select Stack --</option>
                                    <option value="1">Frontend Developer</option>
                                    <option value="2">Backend Developer</option>
                                    <option value="3">Devs Ops</option>
                                    <option value="3">Designer UI/UX</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_proficiency"><strong>Proficiency:</strong></label>
                                <select id="edit_proficiency" name="proficiency" class="form-control">
                                <option value=""> -- Select Proficiency --</option>
                                <option value="1">Expert</option>
                                <option value="2">Intermediate</option>
                                <option value="3">Beginner</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_details"><strong>More Details:</strong></label>
                                <textarea name="details" id="edit_details" cols="50" rows="10" placeholder="More details about your project... "></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button class="btn btn-info" id="update-project-btn">Update Project</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>