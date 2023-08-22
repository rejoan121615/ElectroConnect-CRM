@php
    use Illuminate\Support\Facades\Route;
    $currentRoute = Route::currentRouteName();
    $currentUrl = '/'.explode('.', $currentRoute)[0];
    // dd($url);
@endphp

@php
    $navItems = [
        [
            'name' => 'Menu',
        ],
        [
            'name' => 'Dashboard',
            'icon' => '<i class="bi bi-grid-fill"></i>',
            'active' => true,
            'url' => '/',
        ],
        [
            'name' => 'Products',
            'icon' => '  <i class="bi bi-stack"></i>',
            'active' => false,
            'url' => '/product',
            'child' => [
                [
                    'name' => 'All Product',
                    'icon' => '<i class="bi bi-list-nested"></i>',
                    'active' => false,
                    'url' => '/product',
                ],
                [
                    'name' => 'Add Product',
                    'icon' => '<i class="bi bi-plus-circle-fill"></i>',
                    'active' => false,
                    'url' => '/product/create',
                ],
                [
                    'name' => 'Catagory',
                    'icon' => '<i class="bi bi-columns-gap"></i>',
                    'active' => false,
                    'url' => '/category',
                ],
                [
                    'name' => 'Brands',
                    'icon' => '<i class="bi bi-box-fill"></i>',
                    'active' => false,
                    'url' => '/brand',
                ],
            ],
        ],
        [
            'name' => 'Sales',
            'icon' => '  <i class="bi bi-cart4"></i>',
            'active' => false,
            'url' => '/sales',
            'child' => [
                [
                    'name' => 'All Sales',
                    'icon' => '<i class="bi bi-list-nested"></i>',
                    'active' => false,
                    'url' => '/sales',
                ],
                [
                    'name' => 'New Sale',
                    'icon' => '<i class="bi bi-plus-circle-fill"></i>',
                    'active' => false,
                    'url' => '/sales/create',
                ],
                // [
                //     'name' => 'Manage Sale',
                //     'icon' => '<i class="bi bi-pencil-fill"></i>',
                //     'active' => false,
                //     'url' => '/sales/edit',
                // ],
                [
                    'name' => 'Invoices',
                    'icon' => '<i class="bi bi-receipt"></i>',
                    'active' => false,
                    'url' => '/sales/invoice',
                ],
                // [
                //     'name' => 'Returns',
                //     'icon' => '<i class="bi bi-arrow-clockwise"></i>',
                //     'active' => false,
                //     'url' => '/sales/return',
                // ],
            ],
        ],
        [
            'name' => 'Inventory',
            'icon' => '<i class="bi bi-boxes"></i>',
            'active' => false,
            'url' => '/inventory',
            'child' => [
                [
                    'name' => 'All',
                    'icon' => '<i class="bi bi-box2"></i>',
                    'active' => false,
                    'url' => '/inventory',
                ],
                [
                    'name' => 'Add New',
                    'icon' => '<i class="bi bi-plus-circle-fill"></i>',
                    'active' => false,
                    'url' => '/inventory/create',
                ],
            ],
        ],
        [
            'name' => 'Suppliers',
            'icon' => '  <i class="bi bi-truck"></i>',
            'active' => false,
            'url' => '/supplier',
            'child' => [
                [
                    'name' => 'Supplier List',
                    'icon' => '<i class="bi bi-list-stars"></i>',
                    'active' => false,
                    'url' => '/supplier',
                ],
                [
                    'name' => 'Add New',
                    'icon' => '<i class="bi bi-plus-circle-fill"></i>',
                    'active' => false,
                    'url' => '/supplier/create',
                ],
                // [
                //     'name' => 'Edit Supplier',
                //     'icon' => '<i class="bi bi-pencil-fill"></i>',
                //     'active' => false,
                //     'url' => '/supplier/catagory',
                // ],
                // [
                //     'name' => 'Supplier Orders',
                //     'icon' => '<i class="bi bi-list"></i>',
                //     'active' => false,
                //     'url' => '/supplier/brands',
                // ],
            ],
        ],
        [
            'name' => 'Customers',
            'icon' => '  <i class="bi bi-person-circle"></i>',
            'active' => false,
            'url' => '/customer',
            'child' => [
                [
                    'name' => 'Customer List',
                    'icon' => '<i class="bi bi-list-stars"></i>',
                    'active' => false,
                    'url' => '/customer',
                ],
                [
                    'name' => 'Add New',
                    'icon' => '<i class="bi bi-plus-circle-fill"></i>',
                    'active' => false,
                    'url' => '/customer/create',
                ],
                // [
                //     'name' => 'Edit Supplier',
                //     'icon' => '<i class="bi bi-pencil-fill"></i>',
                //     'active' => false,
                //     'url' => '/customer/catagory',
                // ],
                // [
                //     'name' => 'Supplier Orders',
                //     'icon' => '<i class="bi bi-list"></i>',
                //     'active' => false,
                //     'url' => '/supplier/brands',
                // ],
            ],
        ],
        // [
        //     'name' => 'Customers',
        //     'icon' => '  <i class="bi bi-person-circle"></i>',
        //     'active' => false,
        //     'url' => '/customers',
        //     'child' => [
        //         [
        //             'name' => 'Customer List',
        //             'icon' => '<i class="bi bi-list-stars"></i>',
        //             'active' => false,
        //             'url' => '/customers/add',
        //         ],
        //         // [
        //         //     'name' => 'Customer Communication',
        //         //     'icon' => '<i class="bi bi-chat-dots"></i>',
        //         //     'active' => false,
        //         //     'url' => '/customers/edit',
        //         // ],
        //         // [
        //         //     'name' => 'Support Tickets',
        //         //     'icon' => '<i class="bi bi-ticket-detailed"></i>',
        //         //     'active' => false,
        //         //     'url' => '/customers/support',
        //         // ],
        //     ],
        // ],
        [
            'name' => 'Tasks & meeting',
            'icon' => '  <i class="bi bi-calendar3"></i>',
            'active' => false,
            'url' => '/task',
            'child' => [
                [
                    'name' => 'Task List',
                    'icon' => '<i class="bi bi-card-list"></i>',
                    'active' => false,
                    'url' => '/task',
                ],
                // [
                //     'name' => 'New Task',
                //     'icon' => '<i class="bi bi-plus-circle-fill"></i>',
                //     'active' => false,
                //     'url' => '/task/create',
                // ],
                // [
                //     'name' => 'Chats',
                //     'icon' => '<i class="bi bi-wechat"></i>',
                //     'active' => false,
                //     'url' => '/task/chat',
                // ],
                // [
                //     'name' => 'Calendar',
                //     'icon' => '<i class="bi bi-calendar2"></i>',
                //     'active' => false,
                //     'url' => '/task/calendar',
                // ],
            ],
        ],
        // [
        //     'name' => 'Reports',
        //     'icon' => '  <i class="bi bi-cart4"></i>',
        //     'active' => false,
        //     'url' => '/reports',
        //     'child' => [
        //         [
        //             'name' => 'Sale Reports',
        //             'icon' => '<i class="bi bi-grid-fill"></i>',
        //             'active' => false,
        //             'url' => '/reports/add',
        //         ],
        //         [
        //             'name' => 'Inventory Reports',
        //             'icon' => '<i class="bi bi-grid-fill"></i>',
        //             'active' => false,
        //             'url' => '/reports/edit',
        //         ],
        //         [
        //             'name' => 'Customer Reports',
        //             'icon' => '<i class="bi bi-grid-fill"></i>',
        //             'active' => false,
        //             'url' => '/reports/catagory',
        //         ],
        //         [
        //             'name' => 'Custom Reports',
        //             'icon' => '<i class="bi bi-grid-fill"></i>',
        //             'active' => false,
        //             'url' => '/reports/brands',
        //         ],
        //     ],
        // ],
    ];

    
@endphp


<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/compiled/svg/logo.svg') }}" alt="Logo"
                            srcset="" /></a>
                </div>
                <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                        height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                        <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path
                                d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                opacity=".3"></path>
                            <g transform="translate(-210 -1)">
                                <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                <circle cx="220.5" cy="11.5" r="4"></circle>
                                <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                            </g>
                        </g>
                    </svg>
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer" />
                        <label class="form-check-label"></label>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                        </path>
                    </svg>
                </div>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                {{-- navigation items  --}}
                @foreach ($navItems as $nav)
                    @if (isset($nav['icon']))
                    @php
                        // dd( explode('.', $currentRoute));
                    @endphp
                        <li
                            class="sidebar-item {{ $nav['url'] == $currentUrl ? 'active' : '' }} {{ isset($nav['child']) ? 'has-sub' : '' }} ">
                            {{-- class="sidebar-item {{ $currentUrl.'/' === $nav['url'] ? active : '' }} {{ $nav['active'] ? 'active' : '' }} {{ isset($nav['child']) ? 'has-sub' : '' }} "> --}}
                            <a href="{{ $nav['url'] }}" class="sidebar-link">
                                {!! $nav['icon'] !!}
                                <span>{{ $nav['name'] }}</span>
                            </a>
                            {{-- check if sub menu available  --}}
                            @if (isset($nav['child']))
                                <ul class="submenu {{ $nav['url'] == $currentUrl ? 'submenu-open' : '' }} ">
                                    @foreach ($nav['child'] as $subNav)
                                        <li class="submenu-item {{ $subNav['active'] ? 'active' : '' }}">
                                            <a href="{{ $subNav['url'] }}" class="submenu-link d-flex ">
                                                <div style=" width: 1.2rem; margin-right: 5px;">
                                                    {!! $subNav['icon'] !!}
                                                </div>
                                                <span>{{ $subNav['name'] }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @else
                        <li class="sidebar-title {{ isset($nav['style']) ? 'mt-5' : '' }}">{{ $nav['name'] }} </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
