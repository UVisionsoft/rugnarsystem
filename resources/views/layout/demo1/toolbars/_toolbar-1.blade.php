<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="{{ theme()->printHtmlClasses('toolbar-container', false) }} d-flex flex-stack">
        @if (!empty($__env->yieldContent('page-title')))
            <h1 class="d-flex align-items-right text-dark fw-bolder my-1 fs-4 lh-1">
                @yield('page-title')
            </h1>
        @else
            {{ theme()->getView('layout/page-title/_default') }}
		@endif
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-1">
            <!--begin::Wrapper-->
{{--            <div class="me-4">--}}
{{--                <!--begin::Menu-->--}}
{{--                <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">--}}
{{--                    {!! theme()->getSvgIcon("icons/duotone/Text/Filter.svg", "svg-icon-5 svg-icon-gray-500 me-1") !!}--}}
{{--                    Filter--}}
{{--                </a>--}}
{{--                {{ theme()->getView('partials/menus/_menu-1') }}--}}
{{--                <!--end::Menu-->--}}
{{--            </div>--}}
            <!--end::Wrapper-->

            <!--begin::Wrapper-->
            @if(theme()->getOption('page', 'top_bar/create'))
            <div data-bs-toggle="tooltip" data-bs-placement="left" data-bs-trigger="hover" title="{{theme()->getOption('page', 'top_bar/create/title')}}">
                <a href="{{ url(theme()->getOption('page', 'top_bar/create/url')) }}" class="btn btn-sm btn-primary fw-bolder">
                    {{theme()->getOption('page', 'top_bar/create/caption')}}
                </a>
            </div>
            @endif
            @yield('top_bar')
            <!--end::Wrapper-->
        </div>
		<!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->
