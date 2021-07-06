<!--begin::Table-->
{{ $dataTable->table() }}
<!--end::Table-->

{{-- Inject Scripts --}}
@section('scripts')
    {{ $dataTable->scripts() }}

    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            LaravelDataTables['hospitalities-table'].on('click', '[data-destroy]', function (e) {
                e.preventDefault();
                if (!confirm("{{ __('هل انت متأكد من الحذف ؟') }}")) {
                    return;
                }

                $.ajax({
                    url: $(this).data('destroy'),
                    type: 'DELETE',
                    dataType: 'JSON',
                    data: {
                        '_method': 'DELETE',
                    },
                    complete: function () {
                        LaravelDataTables['hospitalities-table'].ajax.reload();
                    },
                    // error: function (error){
                    //     alert('عفواً لا يمكنك حذف هذا التدريب لوجود بيانات متعلقة')
                    // }
                });
            });
        });
    </script>
@endsection
