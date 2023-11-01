<!-- New Event -->
<div id="create_new_service" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('dentists.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="mb-4">Create New Service</h5>
                    <div class="row gx-3">
                        <div class="col-sm-4 form-group">
                            <label class="form-label">First Name</label>
                            <input class="form-control  cal-event-name" name="first_name" type="text"/>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label class="form-label">Last name</label>
                            <input class="form-control  cal-event-name" name="last_name" type="text"/>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label class="form-label">Father name</label>
                            <input class="form-control  cal-event-name" name="father_name" type="text"/>
                        </div>
                    </div>

                    <div class="row gx-3">
                        <div class="col-sm-6 form-group">
                            <label class="form-label">Phone number</label>
                            <input class="form-control cal-event-name phone_format" name="phone_number" type="text"/>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label">Password</label>
                            <input class="form-control  cal-event-name" name="password" type="text"/>
                        </div>
                    </div>

                    <div class="row gx-3">
                        <div class="col-sm-6 form-group">
                            <label class="form-label">Email</label>
                            <input class="form-control  cal-event-name" name="email" type="text"/>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Role</label>
                                <select name="role_id" class="form-select me-3">
                                    @foreach ($roles as $item)
                                        <option value="{{ $item->id }}">{{ $item->display_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer align-items-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                    <button id="add_event" type="submit" class="btn btn-primary fc-addEventButton-button" data-bs-dismiss="modal">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /New Event -->
