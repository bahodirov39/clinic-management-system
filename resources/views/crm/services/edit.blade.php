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
                        <form action="{{ route('services.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $service->id }}" name="service_id">
                            <div class="modal-body">
                                <h5 class="mb-4">Edit Service</h5>
                                <div class="row gx-3">
                                    <div class="col-sm-6 form-group">
                                        <label class="form-label">Name Uz</label>
                                        <input class="form-control  cal-event-name" value="{{ $service->name_uz }}" name="name_uz" type="text"/>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label class="form-label">Name Ru</label>
                                        <input class="form-control  cal-event-name" value="{{ $service->name_ru }}" name="name_ru" type="text"/>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-6 form-group">
                                        <div class="form-label-group">
                                            <label>Description Uz</label>
                                            <small class="text-muted">200</small>
                                        </div>
                                        <textarea class="form-control" name="description_uz" rows="3">{{ $service->description_uz }}</textarea>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <div class="form-label-group">
                                            <label>Description Ru</label>
                                            <small class="text-muted">200</small>
                                        </div>
                                        <textarea class="form-control" name="description_ru" rows="3">{{ $service->description_ru }}</textarea>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Duration</label>
                                            <input class="form-control" name="duration" value="{{ $service->duration }}" type="text"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Responsible dentists</label><br>
                                            @forelse ($dentists as $item)
                                                @php
                                                    $dentistIds = $service->dentist_id ? json_decode($service->dentist_id, true) : [];
                                                    $isChecked = in_array($item->id, $dentistIds);
                                                @endphp
                                                <input type="checkbox" name="dentist_id[]" value="{{ $item->id }}" class="form-check-input" id="dentist-{{ $item->id }}" @if($isChecked) checked @endif>
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
                                            <input class="form-control" value="{{ $service->price }}" name="price" type="text"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">BNPL percent</label>
                                            <input class="form-control" value="{{ $service->bnpl }}" name="bnpl_percent" type="text"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="align-items-center">
                                <a href="{{ route('services') }}" class="btn btn-secondary">Back</a>
                                <button id="add_event" type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
                            </div>
                        </form>
                    </div>
				</div>
				<!-- /Page Body -->
			</div>
@endsection
