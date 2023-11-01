{{-- warning, info, error, success --}}
@if (session()->has('success'))
    <script>
        toastr.options = {
            'progressBar': true,
            'closeButton': true,
        };
        toastr.success("{{ session()->get('success') }}");
    </script>
@endif

@if (session()->has('danger'))
    <script>
        toastr.options = {
            'progressBar': true,
            'closeButton': true,
        };
        toastr.error("{{ session()->get('danger') }}");
    </script>
@endif

@if (session()->has('warning'))
    <script>
        toastr.options = {
            'progressBar': true,
            'closeButton': true,
        };
        toastr.warning("{{ session()->get('warning') }}");
    </script>
@endif

@if (session()->has('info'))
    <script>
        toastr.options = {
            'progressBar': true,
            'closeButton': true,
        };
        toastr.info("{{ session()->get('info') }}");
    </script>
@endif
