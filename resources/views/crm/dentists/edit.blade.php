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
                        <form action="{{ route('dentists.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="dentist_id" value="{{ $dentist->id }}">
                            <div class="modal-body">
                                <h5 class="mb-4">Edit Dentist</h5>
                                <div class="row gx-3">
                                    <div class="col-sm-4 form-group">
                                        <label class="form-label">First Name</label>
                                        <input class="form-control  cal-event-name" value="{{ $dentist->first_name }}" name="first_name" type="text"/>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label class="form-label">Last name</label>
                                        <input class="form-control  cal-event-name" value="{{ $dentist->last_name }}" name="last_name" type="text"/>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label class="form-label">Father name</label>
                                        <input class="form-control  cal-event-name" value="{{ $dentist->father_name }}" name="father_name" type="text"/>
                                    </div>
                                </div>

                                <div class="row gx-3">
                                    <div class="col-sm-6 form-group">
                                        <label class="form-label">Phone number</label>
                                        <input class="form-control  cal-event-name phone_format" value="{{ $dentist->phone_number }}" name="phone_number" type="text"/>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label class="form-label">Password</label>
                                        <input class="form-control  cal-event-name" name="password" placeholder="If you want new password, type here..." type="text"/>
                                    </div>
                                </div>

                                <div class="row gx-3">
                                    <div class="col-sm-6 form-group">
                                        <label class="form-label">Email</label>
                                        <input class="form-control  cal-event-name" value="{{ $dentist->email }}" name="email" type="text"/>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Role</label>
                                            <select name="role_id" class="form-select me-3">
                                                @foreach ($roles as $item)
                                                    <option value="{{ $item->id }}" @if($item->id == $dentist->role_id) selected @endif>{{ $item->display_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="align-items-center">
                                <a href="{{ route('dentists') }}" class="btn btn-secondary">Back</a>
                                <button id="add_event" type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
                            </div>
                        </form>
                    </div>
				</div>
				<!-- /Page Body -->
			</div>
@endsection
