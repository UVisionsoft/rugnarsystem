<link rel="stylesheet" href="{{asset('plugins/custom/datatables/datatables.bundle.css')}}">
<!--begin::Table-->
{{ $dataTable->table() }}
<!--end::Table-->

{{-- Inject Scripts --}}
@section('scripts')
    {{ $dataTable->scripts() }}

    <script src="{{asset('plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            LaravelDataTables['activities-table'].on('click', '[data-change-status]', function (e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).data('change-status'),
                    type: 'PATCH',
                    data: {
                        "_method": "PATCH",
                        "activity_id" : $(this).data("activity-id"),
                        "trainer_id" : $(this).data("trainer-id"),
                        "status" : $(this).data("status")
                    },
                    complete: function () {
                        LaravelDataTables['activities-table'].ajax.reload();
                    },
                });
            });
        });
    </script>
@endsection
