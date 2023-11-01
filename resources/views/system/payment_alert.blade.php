@php
    $flag = false;
@endphp
@if ($flag === true)
    <div class="col-md-12">
        <div class="callout card card-flush bg-red-light-5 text-center mt-5 w-100 mx-auto">
            <div class="card-body">
                <h5 class="h5">Monthly payment is close</h5>
                <p class="p-sm card-text">If payment is not proper, then we will block your account untill payment is done</p>
                <a href="https://nubra-ui.hencework.com/" target="_blank" class="btn btn-secondary w-45"> <i class="bi bi-receipt"></i> Invoice</a>
                <a href="https://nubra-ui.hencework.com/" target="_blank" class="btn btn-success w-45"> <i class="bi bi-telegram color-white"></i> Pay</a>
            </div>
        </div>
    </div>
@endif
