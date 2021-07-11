<?php
return array(
    'index' => array(
        'title' => 'الرئيسية',
        'description' => '',
        'view' => 'index',
        'layout' => array(
            'page-title' => array(
                'breadcrumb' => false // hide breadcrumb
            ),
        ),
        'assets' => array(
            'custom' => array(
                'js' => array(
                    'js/custom/widgets.js',
                ),
            ),
        ),
    ),

    'documentation' => array(
        // Apply for all documentation pages
        '*' => array(
            // Layout
            'layout' => array(
                // Aside
                'aside' => array(
                    'display' => true, // Display aside
                    'theme' => 'light', // Set aside theme(dark|light)
                    'minimize' => false, // Allow aside minimize toggle
                    'menu' => 'documentation' // Set aside menu type(main|documentation)
                ),

                'header' => array(
                    'left' => 'page-title',
                ),

                'toolbar' => array(
                    'display' => false,
                ),

                'page-title' => array(
                    'layout' => 'documentation',
                    'description' => false,
                    'responsive' => true,
                    'responsive-target' => '#kt_header_nav' // Responsive target selector
                ),
            ),
        ),
    ),

    'login' => array(
        'title' => 'Login',
        'assets' => array(
            'custom' => array(
                'js' => array(
                    'js/custom/authentication/sign-in/general.js',
                ),
            ),
        ),
    ),

    'register' => array(
        'title' => 'Register',
        'assets' => array(
            'custom' => array(
                'js' => array(
                    'js/custom/authentication/sign-up/general.js',
                ),
            ),
        ),
    ),

    'forgot-password' => array(
        'title' => 'Forgot Password',
        'assets' => array(
            'custom' => array(
                'js' => array(
                    'js/custom/authentication/password-reset/password-reset.js',
                ),
            ),
        ),
    ),

    'accounts' => array(
        '*' => array(
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js' => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                    ),
                ),
            ),
        ),

        'admins' => array(
            'title' => 'قائمة المديرين',
            'top_bar' => [
                'create' => [
                    'caption' => 'إضافة جديد',
                    'title' => 'مدير جديد',
                    'url' => '/accounts/admins/create',
                ]
            ],
            'create'=>[
                'title' => 'تسجيل مدير جديد',
            ],
            'edit'=>[
                'title' => 'تعديل مدير',
            ]
        ),
        'doctors' => array(
            'title' => 'قائمة الأطباء',
            'top_bar' => [
                'create' => [
                    'caption' => 'إضافة جديد',
                    'title' => 'طبيب جديد',
                    'url' => '/accounts/doctors/create',
                ]
            ],
            'create'=>[
                'title' => 'تسجيل طبيب جديد',
            ],
        ),
        'vendors' => array(
            'title' => 'قائمة الموردين',
            'top_bar' => [
                'create' => [
                    'caption' => 'إضافة جديد',
                    'title' => 'مورد جديد',
                    'url' => '/accounts/vendors/create',
                ]
            ],
            'create'=>[
                'title' => 'تسجيل مورد جديد',
            ],
        ),
        'trainers' => array(
            'title' => 'قائمة المدربين',
            'top_bar' => [
                'create' => [
                    'caption' => 'إضافة جديد',
                    'title' => 'مدرب جديد',
                    'url' => '/accounts/trainers/create',
                ]
            ],
            'create'=>[
                'title' => 'تسجيل مدرب جديد',
            ],
            '*.sessions'=>[
                'title' => 'قائمة المدربين',
                'top_bar' => [
                    'create' => [
                        'caption' => 'إضافة جديد',
                        'title' => 'مدرب جديد',
                        'url' => '/accounts/trainers/create',
                    ]
                ],
            ]
        ),
        'users' => array(
            'title' => 'قائمة العملاء',
            'top_bar' => [
                'create' => [
                    'caption' => 'إضافة جديد',
                    'title' => 'عميل جديد',
                    'url' => '/accounts/users/create',
                ]
            ],
            'create'=>[
                'title' => 'تسجيل عميل جديد',
            ]
        ),
    ),

    'dogs' => array(
        'title'  => 'الكــــلاب',
        'top_bar' => [
            'create' => [
                'caption' => 'إضافة جديد',
                'title' => 'كلب جديد',
                'url' => '/dogs/create',
            ]
        ],
        'assets' => array(
            'custom' => array(
                'css' => array(
                    'plugins/custom/datatables/datatables.bundle.css',
                ),
                'js'  => array(
                    'plugins/custom/datatables/datatables.bundle.js',
                ),
            ),
        ),
    ),

    'activities' => array(
        'title'  => 'التدريبات',
        'top_bar' => [
            'create' => [
                'caption' => 'إضافة جديد',
                'title' => 'تدريب جديد',
                'url' => '/activities/create',
            ]
        ],
        'assets' => array(
            'custom' => array(
                'css' => array(
                    'plugins/custom/datatables/datatables.bundle.css',
                ),
                'js'  => array(
                    'plugins/custom/datatables/datatables.bundle.js',
                ),
            ),
        ),
    ),

    'expenses' => array(
        'title'  => 'النفقات',
        'top_bar' => [
            'create' => [
                'caption' => 'إضافة جديد',
                'title' => 'نفقة جديد',
                'url' => '/expenses/create',
            ]
        ],
        'assets' => array(
            'custom' => array(
                'css' => array(
                    'plugins/custom/datatables/datatables.bundle.css',
                ),
                'js'  => array(
                    'plugins/custom/datatables/datatables.bundle.js',
                ),
            ),
        ),
    ),
    'vaccines' => array(
            'title'  => 'التطعيمات',
            'top_bar' => [
                'create' => [
                    'caption' => 'إضافة جديد',
                    'title' => 'تطعيم جديد',
                    'url' => '/vaccines/create',
                ]
            ],
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js'  => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                    ),
                ),
            ),
        ),
    'hospitalities' => array(
        'title'  => 'الاستضافات',
        'top_bar' => [
            'create' => [
                'caption' => 'إضافة جديد',
                'title' => 'استضافة جديدة',
                'url' => '/hospitalities/create',
            ]
        ],
        'assets' => array(
            'custom' => array(
                'css' => array(
                    'plugins/custom/datatables/datatables.bundle.css',
                ),
                'js'  => array(
                    'plugins/custom/datatables/datatables.bundle.js',
                ),
            ),
        ),
    ),
);
