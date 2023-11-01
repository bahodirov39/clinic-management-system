@extends('layouts.myapp')

@section('content')

		<!-- Main Content -->
		<div class="hk-pg-wrapper">
			<div class="container-xxl">
				<!-- Page Header
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
				/Page Header -->

                {{-- SYSTEM ALERT --}}
                @include('system.payment_alert')
                {{-- SYSTEM ALERT ENDS --}}

				<!-- Page Body -->
				<div class="hk-pg-body">
					<div class="tab-content">
						<div class="tab-pane fade show active" id="tab_block_1">
							<div class="row">
								<div class="col-md-12 mb-md-4 mb-3">
									<div class="card card-border mb-0 h-100">
										<div class="card-header card-header-action">
											<h5>Users
												<span class="badge badge-sm badge-light ms-1">{{ $quantity }}</span>
											</h5>
											<div class="card-action-wrap">
												<button class="btn btn-sm btn-outline-light"><span><span class="icon"><span class="feather-icon"><i data-feather="upload"></i></span></span><span class="btn-text">export</span></span></button>
												<button class="btn btn-sm btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#create_new_service"><span><span class="icon"><span class="feather-icon"><i data-feather="plus"></i></span></span><span class="btn-text">Add new</span></span></button>
											</div>
										</div>
										<div class="card-body">
											<div class="contact-list-view">
												<table id="datable_1" class="table nowrap w-100 mb-5">
													<thead>
														<tr>
															<th><span class="form-check fs-6 mb-0">
																<input type="checkbox" class="form-check-input check-select-all" id="customCheck1">
																<label class="form-check-label" for="customCheck1"></label>
															</span></th>
															<th>Name</th>
															<th class="w-25">KPI</th>
															<th>Created at</th>
															<th>Rating</th>
															<th></th>
														</tr>
													</thead>
													<tbody>
                                                        @forelse ($dentists as $item)
														<tr>
															<td>
															</td>
															<td>
																<div class="media align-items-center">
																	<div class="media-body">
																		<div class="text-high-em">{{ $item->first_name . ' ' . $item->last_name }}</div>
																		<div class="fs-7"><a href="tel:{{ $item->phone_number }}" class="table-link-text link-medium-em">{{ $item->phone_number }}</a></div>
																	</div>
																</div>
															</td>
															<td>
																<div class="progress-lb-wrap">
																	<div class="d-flex align-items-center">
																		<div class="progress progress-bar-rounded progress-bar-xs flex-1">
																			<div class="progress-bar bg-blue-dark-3 w-90" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
																		</div>
																		<div class="fs-8 ms-3"></div>
																	</div>
																</div>
															</td>
															<td>@dateFormat($item->created_at)</td>
															<td>
																<span class="badge badge-soft-secondary  my-1  me-2">admin</span>
																<span class="badge badge-soft-secondary my-1  me-2">Finance</span>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="{{ route('dentists.edit', ['id'=>$item->id]) }}"><span class="icon"><span class="feather-icon"><i data-feather="edit-2"></i></span></span></a>
																	<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="javascript:;" onclick="confirmDelete('{{ route('dentists.destroy', ['id'=>$item->id]) }}')"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
																</div>
															</td>
														</tr>
                                                        @empty
                                                        no data
                                                        @endforelse
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Page Body -->
			</div>

            @include('crm.dentists.modal_create')
@endsection

@section('scripts')
    <script>
        function confirmDelete(url) {
            if (confirm('Are you sure you want to delete this service?')) {
                window.location.href = url;
            }
        }
    </script>
@endsection
