<x-base-layout>
    @section('page-title', 'جلسات تدريب المدرب')
    @section('top_bar')
            <div data-bs-toggle="tooltip" data-bs-placement="left" data-bs-trigger="hover" title="تسجيل جلسة تدريب جديدة">
                <a href="{{route('accounts.trainers.sessions.create', $trainer->id ?? auth()->id())}}" class="btn btn-sm btn-primary fw-bolder">
                    جلسة جديدة
                </a>
            </div>
    @endsection

<!--begin::Card-->
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body pt-6">
            @include('pages.users.sessions._table')
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

</x-base-layout>
