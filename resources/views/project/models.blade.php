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
                <div>
                    <select class="form-control" name="project" id="project">
                        <option selected>Open this to select project</option>
                        <option value="1">Officemate</option>
                        <option value="2">TIMS</option>
                        <option value="3">CATSS</option>
                    </select>
                </div>
                <div>
                    <label for="stack"><strong>Stack</strong></label>
                </div>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stack" id="stack1" value="1">
                        <label class="form-check-label" for="stack1">Backend</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stack" id="stack2" value="2">
                        <label class="form-check-label" for="stack2">Frontend</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stack" id="stack3" value="3">
                        <label class="form-check-label" for="stack3">Dev Ops</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stack" id="stack4" value="4">
                        <label class="form-check-label" for="stack4">Designer UI/UX</label>
                      </div>
                </div>
                <div>
                    <label for="proficiency"><strong>Proficiency</strong></label>
                </div>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="proficiency" id="proficiency1" value="1">
                        <label class="form-check-label" for="proficiency1">Expert</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="proficiency" id="proficiency2" value="2">
                        <label class="form-check-label" for="proficiency2">Intermediate</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="proficiency" id="proficiency3" value="3">
                        <label class="form-check-label" for="proficiency3">Beginner</label>
                      </div>
                </div>
                <div class="form-group">
                    <textarea name="details" id="details" cols="10" rows="5" class="form-control" placeholder="More details about the project"></textarea>
                </div>
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="submit">Save changes</button>
            </form>
        </div>
        </div>
    </div>
</div>

{{-- MODAL TO SHOW A PARTICULAR PROJECT --}}
<div class="modal fade bd-view-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="col-md-12">
                    <p><strong>Context of Project</strong></p>
                    <p>
                        Lorem Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
                <div class="col-md-12">
                    <p><strong>Description of Project</strong></p>
                    <p>
                        Lorem Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Starting Date</strong></p>
                        <p>
                            2020/04/02
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Project</strong></p>
                        <p>
                            Officemate
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Stack</strong></p>
                        <p>
                            Backend
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Proficiency</strong></p>
                        <p>
                            Intermediate
                        </p>
                    </div>
                </div>
                <div class="col-md-12">
                    <p><strong>More Details</strong></p>
                    <p>
                        Lorem Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
        </div>
    </div>
  </div>