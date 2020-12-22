<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'admin' => [
        'user' => [
            'name' => 'user',
            'actions' => [
                'customer' => 'admin/user/customer',
                'company' => 'admin/user/company',
                'administrator' => 'admin/user/administrator',
            ],
            'icon' => 'ti-user'
        ],
        'category' => [
            'name' => 'category',
            'actions' => [
                'category' => 'admin/category',
                'incident' => 'admin/category/incident',
            ],
            'icon' => 'ti-pencil-alt'
        ],
//        'booking' => [
//            'name' =>  'Booking',
//            'actions' => [
//                'room_booking' => 'admin/room_booking',
//                'event_booking' =>  'admin/event_booking'
//            ],
//            'icon' => 'ti-control-forward'
//        ],
//        'event' => [
//            'name' => 'Event',
//            'actions' => [
//                'view' => 'admin/event',
//            ],
//            'icon' => 'ti-ticket'
//        ],
//        'food' => [
//            'name' => 'Food Menu',
//            'actions' => [
//                'view' => 'admin/food',
//            ],
//            'icon' => 'ti-pencil-alt'
//        ],
//        'room_type' => [
//            'name' => 'Room Type',
//            'actions' => [
//                'view' => 'admin/room_type',
//            ],
//            'icon' => 'ti-home'
//        ],
//        'facility' => [
//            'name' => 'Facility',
//            'actions' => [
//                'view' => 'admin/facility',
//            ],
//            'icon' => 'ti-crown'
//        ],
//        'slider' => [
//            'name' => 'Slider',
//            'actions' => [
//                'view' => 'admin/slider',
//            ],
//            'icon' => 'ti-layout-grid2'
//        ],
//        'Review' => [
//            'name' => 'Review',
//            'actions' => [
//                'view' => 'admin/review',
//            ],
//            'icon' => 'ti-star'
//        ],
//        'Page' => [
//            'name' => 'Page',
//            'actions' => [
//                'view' => 'admin/page',
//            ],
//            'icon' => 'ti-star'
//        ],
    ],

];
