<!-- New Event -->
<div id="create_new_service" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('services.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="mb-4">Create New Service</h5>
                    <div class="row gx-3">
                        <div class="col-sm-6 form-group">
                            <label class="form-label">Name Uz</label>
                            <input class="form-control  cal-event-name" name="name_uz" type="text"/>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label">Name Ru</label>
                            <input class="form-control  cal-event-name" name="name_ru" type="text"/>
                        </div>
                    </div>
                    <div class="row gx-3">
                        <div class="col-sm-6 form-group">
                            <div class="form-label-group">
                                <label>Description Uz</label>
                                <small class="text-muted">200</small>
                            </div>
                            <textarea class="form-control" name="description_uz" rows="3"></textarea>
                        </div>
                        <div class="col-sm-6 form-group">
                            <div class="form-label-group">
                                <label>Description Ru</label>
                                <small class="text-muted">200</small>
                            </div>
                            <textarea class="form-control" name="description_ru" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row gx-3">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Duration</label>
                                <input class="form-control" name="duration" type="text"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Responsible dentists</label><br>
                                @forelse ($dentists as $item)
                                    <input type="checkbox" name="dentist_id[]" value="{{ $item->id }}" class="form-check-input" id="dentist-{{ $item->id }}">
                                    <label class="form-check-label text-muted fs-7" for="dentist-{{ $item->id }}">{{ $item->last_name . ' ' . $item->first_name }}</label> <br>
                                @empty
                                    <label>No dentists yet. <a href="{{ route('dentists') }}" target="_blank">Add via link</a></label>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="row gx-3">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Price</label>
                                <input class="form-control" name="price" type="text"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">BNPL percent</label>
                                <input class="form-control" name="bnpl_percent" type="text"/>
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
