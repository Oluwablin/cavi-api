<!-- CREATE NEW PROJECT MODAL -->
<div class="modal fade" id="createModalScrollable" tabindex="-1" role="dialog" aria-labelledby="createModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createModalScrollableTitle">Add New Project</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/add/project" method="POST" id="createProject">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                </div>
                {{-- <div class="form-group">
                    <textarea name="letterbody" class="summernote" cols="30" rows="10" class="form-control" placeholder="Message"></textarea>
                </div> --}}
                <div class="form-group">
                    <textarea name="context" id="context" cols="10" rows="5" class="form-control" placeholder="Context of the project"></textarea>
                </div>
                <div class="form-group">
                    <textarea name="description" id="description" cols="10" rows="5" class="form-control" placeholder="Description of the project"></textarea>
                </div>
                <div class="form-group">
                    <input type="date" id="start_date" name="start_date" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group">
                    <select class="form-control" name="project" id="project">
                        <option selected> Select Project </option>
                        <option value="1"> Officemate </option>
                        <option value="2"> TIMS </option>
                        <option value="3"> CATSS </option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="stack" id="stack">
                        <option selected> Select Stack </option>
                        <option value="1"> Backend </option>
                        <option value="2"> Frontend </option>
                        <option value="3"> Dev Ops </option>
                        <option value="4"> Designer UI/UX </option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="proficiency" id="proficiency">
                        <option selected> Select Proficiency Level </option>
                        <option value="1"> Expert </option>
                        <option value="2"> Intermediate </option>
                        <option value="3"> Beginner </option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea name="details" id="details" cols="10" rows="5" class="form-control" placeholder="More details about the project"></textarea>
                </div>
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submit" onclick="saveNewProject()">Save changes</button>
            </form>
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