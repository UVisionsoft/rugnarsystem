<link rel="stylesheet" href="{{asset('plugins/custom/datatables/datatables.bundle.css')}}">
<!--begin::Table-->
{{ $dataTable->table() }}
<!--end::Table-->

{{-- Inject Scripts --}}
@section('scripts')
    {{ $dataTable->scripts() }}

    <script src="{{asset('plugins/custom/datatables/datatables.bundle.js')}}"></script>
{{--    <script type="text/javascript">--}}
{{--        $(function () {--}}
{{--            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});--}}

{{--            LaravelDataTables['doctor-visits-table'].on('click', '[data-destroy]', function (e) {--}}
{{--                e.preventDefault();--}}
{{--                if (!confirm("{{ __('Are you sure to delete this record?') }}")) {--}}
{{--                    return;--}}
{{--                }--}}

{{--                $.ajax({--}}
{{--                    url: $(this).data('destroy'),--}}
{{--                    type: 'DELETE',--}}
{{--                    dataType: 'JSON',--}}
{{--                    data: {--}}
{{--                        '_method': 'DELETE',--}}
{{--                    },--}}
{{--                    complete: function () {--}}
{{--                        LaravelDataTables['doctor-visits-table'].ajax.reload();--}}
{{--                    },--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}


@endsection
