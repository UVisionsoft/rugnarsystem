<?php

use App\Core\Adapters\Theme;

return array(
    // Main menu
    'main' => array(
        //// Dashboard
        array(
            'title' => 'الرئيسية',
            'path' => 'index',
            'icon' => Theme::getSvgIcon("icons/duotone/Design/PenAndRuller.svg", "svg-icon-2"),
        ),

        //// Modules
        array(
            'classes' => array('content' => 'pt-8 pb-2'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">الأقسام</span>',
        ),

        // Account
        array(
            'title' => 'المستخدمين',
            'icon' => array(
                'svg' => Theme::getSvgIcon("icons/duotone/General/User.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-person fs-2"></i>',
            ),
            'classes' => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub' => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title' => 'العملاء',
                        'path' => 'accounts/users',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title" => "بيانات العملاء",
                                "data-bs-toggle" => "tooltip",
                                "data-bs-trigger" => "hover",
                                "data-bs-dismiss" => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                    array(
                        'title' => 'مدربين الكلاب',
                        'path' => 'accounts/trainers',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title" => "بيانات المدربين",
                                "data-bs-toggle" => "tooltip",
                                "data-bs-trigger" => "hover",
                                "data-bs-dismiss" => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                    array(
                        'title' => 'الاطباء',
                        'path' => 'accounts/doctors',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title" => "بيانات الاطباء",
                                "data-bs-toggle" => "tooltip",
                                "data-bs-trigger" => "hover",
                                "data-bs-dismiss" => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                    array(
                        'title' => 'المديرين',
                        'path' => 'accounts/admins',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title" => "بيانات المديرين",
                                "data-bs-toggle" => "tooltip",
                                "data-bs-trigger" => "hover",
                                "data-bs-dismiss" => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                    array(
                        'title' => 'الموردين',
                        'path' => 'accounts/vendors',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title" => "بيانات الموردرين",
                                "data-bs-toggle" => "tooltip",
                                "data-bs-trigger" => "hover",
                                "data-bs-dismiss" => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                ),
            ),
        ),
        // Invoices
        array(
            'title' => 'الفواتير',
            'icon' => array(
                'svg' => Theme::getSvgIcon("icons/duotone/cash-register.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-person fs-2"></i>',
            ),
            'classes' => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub' => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title' => 'فواتير البيع',
                        'path' => 'invoices/sales',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title" => "فواتير البيع",
                                "data-bs-toggle" => "tooltip",
                                "data-bs-trigger" => "hover",
                                "data-bs-dismiss" => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                    array(
                        'title' => 'مرتجعات فواتير البيع',
                        'path' => 'invoices/return_sales',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title" => "مرتجعات فواتير البيع",
                                "data-bs-toggle" => "tooltip",
                                "data-bs-trigger" => "hover",
                                "data-bs-dismiss" => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                    array(
                        'title' => 'فواتير المشتريات',
                        'path' => 'invoices/purchases',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title" => "فواتير المشتريات",
                                "data-bs-toggle" => "tooltip",
                                "data-bs-trigger" => "hover",
                                "data-bs-dismiss" => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                    array(
                        'title' => 'مرتجعات فواتير المشتريات',
                        'path' => 'invoices/return_purchases',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title" => "مرتجعات فواتير المشتريات",
                                "data-bs-toggle" => "tooltip",
                                "data-bs-trigger" => "hover",
                                "data-bs-dismiss" => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                )
            ),
        ),
        array(
            'title' => 'الكلاب',
            'path' => '/dogs',
            'icon' => Theme::getSvgIcon("icons/duotone/dog.svg", "svg-icon-2"),
        ),
        // activities
        array(
            'title' => 'التدريبات',
            'path' => '/activities',
            'icon' => Theme::getSvgIcon("icons/duotone/tasks.svg", "svg-icon-2"),
        ),
        // Vacciones
        array(
            'title' => 'التطعيمات',
            'path' => '/vaccines',
            'icon' => Theme::getSvgIcon("icons/duotone/syringe.svg", "svg-icon-2"),
        ),

        // Hospitalities
        array(
            'title' => 'الاستضافات',
            'path' => '/hospitalities',
            'icon' => Theme::getSvgIcon("icons/duotone/hostel.svg", "svg-icon-2"),
        ),

        // Expenses
        array(
            'title' => 'النفقات',
            'path' => '/expenses',
            'icon' => Theme::getSvgIcon("icons/duotone/bill-wave.svg", "svg-icon-2"),
        ),
        // Services
        array(
            'title' => 'الخدمات',
            'path' => '/services',
            'icon' => Theme::getSvgIcon("icons/duotone/service.svg", "svg-icon-2"),
        ),
        // Seetings
        array(
            'title' => 'الاعدادات',
            'icon' => array(
                'svg' => Theme::getSvgIcon("icons/duotone/cogs.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-person fs-2"></i>',
            ),
            'classes' => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub' => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title' => 'إعدادات الحسابات',
                        'path' => 'settings/accounts',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title" => "إعدادات الحسابات",
                                "data-bs-toggle" => "tooltip",
                                "data-bs-trigger" => "hover",
                                "data-bs-dismiss" => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                )
            ),
        ),
    ),
    // Horizontal menu
    'horizontal' => array(
        // Dashboard
        array(
            'title' => 'الرئيسية',
            'path' => 'index',
            'classes' => array('item' => 'me-lg-1'),
        ),
        array(
            'title' => 'تسجيل عميل جديد',
            'path' => 'accounts/users/create',
            'classes' => array('item' => 'me-lg-1'),
        ),
        array(
            'title' => 'تسجيل كلب جديد',
            'path' => 'dogs/create',
            'classes' => array('item' => 'me-lg-1'),
        ),
    ),
);
