@extends('layouts.myapp')
@section('content')
		<!-- Main Content -->
		<div class="hk-pg-wrapper">
			<div class="container-xxl">
				<!-- Page Header -->
				<div class="hk-pg-header pg-header-wth-tab pt-7">
					<div class="d-flex">
						<div class="d-flex flex-wrap justify-content-between flex-1">
							<div class="mb-lg-0 mb-2 me-8">
								<h1 class="pg-title">Welcome back</h1>
								<p>Create pages using a variety of features that leverage jampack components</p>
							</div>
							<div class="pg-header-action-wrap">
								<div class="input-group w-300p">
									<span class="input-affix-wrapper">
										<span class="input-prefix"><span class="feather-icon"><i data-feather="calendar"></i></span></span>
										<input class="form-control form-wth-icon" name="datetimes" value="Aug 18,2020 - Aug 19, 2020">
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

                {{-- SYSTEM ALERT --}}
                @include('system.payment_alert')
                {{-- SYSTEM ALERT ENDS --}}

				<!-- Page Body -->
				<div class="hk-pg-body">
					<div class="p-1">
                        <form action="{{ route('items.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="item_id" value="{{ $item->id }}">
                            <div class="modal-body">
                                <h5 class="mb-4">Изменение нового сервиса</h5>
                                <div class="row gx-3">
                                    <div class="col-sm-12 form-group">
                                        <label class="form-label">Name Uz</label>
                                        <input class="form-control  cal-event-name" value="{{ $item->name }}" name="name" type="text"/>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-6 form-group">
                                        <label class="form-label">In stock</label>
                                        <input class="form-control  cal-event-name" value="{{ $item->in_stock }}" name="in_stock" type="text"/>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label class="form-label">Per price</label>
                                        <input class="form-control  cal-event-name money-format" value="{{ $item->per_price }}" name="per_price" type="text"/>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-6 form-group">
                                        <div class="form-label-group">
                                            <label>Description Ru</label>
                                            <small class="text-muted">200</small>
                                        </div>
                                        <textarea class="form-control" name="description" rows="3">{{ $item->description }}</textarea>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Related categories</label><br>
                                            @forelse ($categories as $itemGo)
                                                @php
                                                    $categoryIds = $item->category_id ? json_decode($item->category_id, true) : [];
                                                    $isChecked = in_array($itemGo->id, $categoryIds);
                                                @endphp
                                                <input type="checkbox" name="category_id[]" value="{{ $itemGo->id }}" class="form-check-input" id="category-{{ $itemGo->id }}" @if($isChecked) checked @endif>
                                                <label class="form-check-label text-muted fs-7" for="category-{{ $itemGo->id }}">{{ $itemGo->name }}</label> <br>
                                            @empty
                                                <label>No categories yet. <a href="{{ route('cat.items') }}" target="_blank">Add via link</a></label>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-6">
                                        <div class="form-inline">
                                            <div class="form-group mt-5">
                                                <label class="form-label">Set priority:</label>
                                                <div class="form-check form-check-inline">
                                                    <div class="form-check">
                                                        <input type="radio" id="customRadioc1" value="1" name="priority" class="form-check-input" @if($item->priority == 1) checked @endif>
                                                        <label class="form-check-label" for="customRadioc1">Urgent</label>
                                                    </div>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <div class="form-check">
                                                        <input type="radio" id="customRadioc2" value="2" name="priority" class="form-check-input" @if($item->priority == 2) checked @endif>
                                                        <label class="form-check-label" for="customRadioc2">High</label>
                                                    </div>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <div class="form-check">
                                                        <input type="radio" id="customRadioc3" value="3" name="priority" class="form-check-input" @if($item->priority == 3) checked @endif>
                                                        <label class="form-check-label" for="customRadioc3">Medium</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-select me-3">
                                                <option @if($item->status == 1) selected @endif value="1">Active</option>
                                                <option @if($item->status == 2) selected @endif value="2">Unactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="align-items-center">
                                <a href="{{ route('items') }}" class="btn btn-secondary">Back</a>
                                <button id="add_event" type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
                            </div>
                        </form>
                    </div>
				</div>
				<!-- /Page Body -->
			</div>
@endsection
