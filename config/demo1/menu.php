<?php

use App\Core\Adapters\Theme;

return array(
    // Main menu
    'main'       => array(
        //// Dashboard
        array(
            'title' => 'Dashboard',
            'path'  => 'index',
            'icon'  => Theme::getSvgIcon("icons/duotone/Design/PenAndRuller.svg", "svg-icon-2"),
        ),

        //// Modules
        array(
            'classes' => array('content' => 'pt-8 pb-2'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">Modules</span>',
        ),

        // Account
        array(
            'title'      => 'المستخدمين',
            'icon'       => array(
                'svg'  => Theme::getSvgIcon("icons/duotone/General/User.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-person fs-2"></i>',
            ),
            'classes'    => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub'        => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title'      => 'العملاء',
                        'path'       => 'accounts/users',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title"             => "بيانات العملاء",
                                "data-bs-toggle"    => "tooltip",
                                "data-bs-trigger"   => "hover",
                                "data-bs-dismiss"   => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                    array(
                        'title'      => 'مدرب',
                        'path'       => 'accounts/trainers',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title"             => "بيانات المدربين",
                                "data-bs-toggle"    => "tooltip",
                                "data-bs-trigger"   => "hover",
                                "data-bs-dismiss"   => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                    array(
                        'title'      => 'مدير',
                        'path'       => 'accounts/admins',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title"             => "بيانات المديرين",
                                "data-bs-toggle"    => "tooltip",
                                "data-bs-trigger"   => "hover",
                                "data-bs-dismiss"   => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                ),
            ),
        ),

        // dogs
        array(
            'title' => 'الكلاب',
            'path'  => '/dogs',
            'icon'  => Theme::getSvgIcon("icons/duotone/dog.svg", "svg-icon-2"),
        ),
        // activities
        array(
            'title' => 'التدريبات',
            'path'  => '/activities',
            'icon'  => Theme::getSvgIcon("icons/duotone/dog.svg", "svg-icon-2"),
        ),
        // System
        array(
            'title'      => 'System',
            'icon'       => array(
                'svg'  => Theme::getSvgIcon("icons/duotone/Layout/Layout-4-blocks.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-layers fs-3"></i>',
            ),
            'classes'    => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub'        => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title'      => 'Settings',
                        'path'       => '#',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title"             => "Coming soon",
                                "data-bs-toggle"    => "tooltip",
                                "data-bs-trigger"   => "hover",
                                "data-bs-dismiss"   => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                    array(
                        'title'      => 'Audit Log',
                        'path'       => '#',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title"             => "Coming soon",
                                "data-bs-toggle"    => "tooltip",
                                "data-bs-trigger"   => "hover",
                                "data-bs-dismiss"   => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                    array(
                        'title'  => 'System Log',
                        'path'   => 'log/system',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // Separator
        array(
            'content' => '<div class="separator mx-1 my-4"></div>',
        ),

        // Changelog
        array(
            'title' => 'Changelog v'.theme()->getVersion(),
            'icon'  => Theme::getSvgIcon("icons/duotone/Files/File.svg", "svg-icon-2"),
            'path'  => 'documentation/getting-started/changelog',
        ),
    ),

    // Horizontal menu
    'horizontal' => array(
        // Dashboard
        array(
            'title'   => 'الرئيسية',
            'path'    => 'index',
            'classes' => array('item' => 'me-lg-1'),
        ),
    ),
);
