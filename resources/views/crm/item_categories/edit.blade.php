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
									<button class="btn btn-success btn-sm btn-block">test</button>
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
                        <form action="{{ route('cat.items.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="item_category_id" value="{{ $category->id }}">
                            <div class="modal-body">
                                <h5 class="mb-4">Edit Category</h5>
                                <div class="row gx-3">
                                    <div class="col-sm-8 form-group">
                                        <label class="form-label">Name</label>
                                        <input class="form-control cal-event-name" value="{{ $category->name }}" id="myInput" name="name" type="text" required/>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label">Category</label>
                                            <select name="status" class="form-select me-3">
                                                <option @if($category->status == 1) selected @endif value="1">Active</option>
                                                <option @if($category->status == 2) selected @endif value="2">Unactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="align-items-center">
                                <a href="{{ route('cat.items') }}" class="btn btn-secondary">Back</a>
                                <button id="add_event" type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
				</div>
				<!-- /Page Body -->
			</div>
@endsection
