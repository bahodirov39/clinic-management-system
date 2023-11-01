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
					<div class="tab-content ">
						<div class="tab-pane fade show active" id="tab_block_1">
							<div class="row">
								<div class="col-md-12 mb-md-4 mb-3">
									<div class="card card-border mb-0 h-100 shadow">
										<div class="card-header card-header-action">
											<h5>Items
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
															<th class="w-25">Category</th>
															<th>Quantity</th>
															<th>Status</th>
															<th></th>
														</tr>
													</thead>
													<tbody>
                                                        @forelse ($items as $item)
														<tr>
															<td>
															</td>
															<td>
																<div class="media align-items-center">
																	<div class="media-body">
																		<div class="text-high-em">{{ $item->name }}</div>
																	</div>
																</div>
															</td>
															<td>
																<div class="media align-items-center">
																	<div class="media-body">
																		<div class="fs-7">
                                                                            @if ($item->category_id)
                                                                                @foreach(is_array(json_decode($item->category_id)) ? json_decode($item->category_id) : [] as $categoryId)
                                                                                    @php
                                                                                        $cat = \App\Models\ItemCategory::find($categoryId);
                                                                                    @endphp
                                                                                    @if($cat)
                                                                                        <a href="#" class="table-link-text link-medium-em">- {{ $cat->name }}</a> <br>
                                                                                    @endif
                                                                                @endforeach
                                                                            @endif
                                                                    </div>
																	</div>
																</div>
															</td>
															<td>
                                                                @if ($item->in_stock <= 10)
                                                                    <span class="badge badge-soft-red my-1  me-2">{{ $item->in_stock }}</span>
                                                                @elseif ($item->in_stock >= 11 && $item->in_stock <= 15)
                                                                    <span class="badge badge-soft-yellow my-1  me-2">{{ $item->in_stock }}</span>
                                                                @else
                                                                    <span class="badge badge-soft-green my-1  me-2">{{ $item->in_stock }}</span>
                                                                @endif
                                                                <a href="#"><i class="bi bi-plus-circle"></i></a>
                                                            </td>
															<td>
																<span class="badge badge-soft-secondary  my-1  me-2">
                                                                    @if ($item->status == 1)
                                                                        Active
                                                                    @else
                                                                        Unactive
                                                                    @endif
                                                                </span>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="{{ route('items.edit', ['id'=>$item->id]) }}"><span class="icon"><span class="feather-icon"><i data-feather="edit-2"></i></span></span></a>
																	<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="javascript:;" onclick="confirmDelete('{{ route('items.destroy', ['id'=>$item->id]) }}')"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
																</div>
															</td>
														</tr>
                                                        @empty

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

            @include('crm.items.modal_create')
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
