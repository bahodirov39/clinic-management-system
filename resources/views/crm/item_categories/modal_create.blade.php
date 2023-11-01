<!-- New Event -->
<div id="create_new_service" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('cat.items.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="mb-4">Create New Category</h5>
                    <div class="row gx-3">
                        <div class="col-sm-8 form-group">
                            <label class="form-label">Name</label>
                            <input class="form-control cal-event-name" id="myInput" name="name" type="text" required/>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label">Category</label>
                                <select name="status" class="form-select me-3">
                                    <option selected value="1">Active</option>
                                    <option value="2">Unactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer align-items-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                    <button id="myButton" type="submit" class="btn btn-primary fc-addEventButton-button">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /New Event -->
