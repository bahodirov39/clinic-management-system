<!-- New Event -->
<div id="create_new_service" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('items.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="mb-4">Создание нового сервиса</h5>
                    <div class="row gx-3">
                        <div class="col-sm-12 form-group">
                            <label class="form-label">Name Uz</label>
                            <input class="form-control  cal-event-name" name="name" type="text"/>
                        </div>
                    </div>
                    <div class="row gx-3">
                        <div class="col-sm-6 form-group">
                            <label class="form-label">In stock</label>
                            <input class="form-control  cal-event-name" name="in_stock" type="text"/>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label">Per price</label>
                            <input class="form-control  cal-event-name" name="per_price" type="text"/>
                        </div>
                    </div>
                    <div class="row gx-3">
                        <div class="col-sm-6 form-group">
                            <div class="form-label-group">
                                <label>Description Ru</label>
                                <small class="text-muted">200</small>
                            </div>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Related categories</label><br>
                                @forelse ($categories as $item)
                                    <input type="checkbox" name="category_id[]" value="{{ $item->id }}" class="form-check-input" id="category-{{ $item->id }}">
                                    <label class="form-check-label text-muted fs-7" for="category-{{ $item->id }}">{{ $item->name }}</label> <br>
                                @empty
                                    <label>No categories yet. <a href="{{ route('cat.items') }}" target="_blank">Add via link</a></label>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="row gx-3">
                        <div class="col-sm-8">
                            <div class="form-inline">
                                <div class="form-group mt-5">
                                    <label class="form-label">Set priority:</label>
                                    <div class="form-check form-check-inline">
                                        <div class="form-check">
                                            <input type="radio" id="customRadioc1" value="1" name="priority" class="form-check-input" checked=""	>
                                            <label class="form-check-label" for="customRadioc1">Urgent</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="form-check">
                                            <input type="radio" id="customRadioc2" value="2" name="priority" class="form-check-input" >
                                            <label class="form-check-label" for="customRadioc2">High</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="form-check">
                                            <input type="radio" id="customRadioc3" value="3" name="priority" class="form-check-input">
                                            <label class="form-check-label" for="customRadioc3">Medium</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label">Status</label>
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
                    <button id="add_event" type="submit" class="btn btn-primary fc-addEventButton-button" data-bs-dismiss="modal">Создать</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /New Event -->
