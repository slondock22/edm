<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Navigation Menu
    |--------------------------------------------------------------------------
    |
    | This array is for Navigation menus of the backend.  Just add/edit or
    | remove the elements from this array which will automatically change the
    | navigation.
    |
    */

    // SIDEBAR LAYOUT - MENU

    'sidebar' => [
        [
            'title' => 'Dashboard',
            'link' => '/admin/dashboard',
            'active' => 'admin/dashboard*',
            'icon' => 'fas fa-home',
        ],
        [
            'title' => 'Event',
            'link' => '#event',
            'active' => 'admin/event*',
            'icon' => 'fas fa-pen-square',
            'children' => [
                [
                    'title' => 'Create Event',
                    'link' => '/admin/event/create',
                    'active' => 'admin/event/create',
                ],
                [
                    'title' => 'Event List',
                    'link' => '/admin/event/list',
                    'active' => 'admin/event/list',
                ]   
            ]
        ],
        [
            'title' => 'Event Broadcast',
            'link' => '#broadcast',
            'active' => 'admin/broadcast*',
            'icon' => 'fas fa-layer-group',
            'children' => [
                [
                    'title' => 'Create Broadcast',
                    'link' => '/admin/broadcast/create',
                    'active' => 'admin/broadcast/create',
                ],
                [
                    
                    'title' => 'Broadcast List',
                    'link' => '/admin/broadcast/list   ',
                    'active' => 'admin/broadcast/list',
                ]  
            ]
        ],
        [
            'title' => 'Attendees',
            'link' => '/admin/checkin',
            'active' => 'admin/checkin*',
            'icon' => 'fas fa-check',
        ],
        [
            'title' => 'Email Marketing',
            'link' => '#email',
            'active' => 'admin/mail*',
            'icon' => 'fas fa-envelope',
            'children' => [
                [
                    'title' => 'Create Campaign',
                    'link' => '/admin/campaign/create',
                    'active' => 'admin/campaign/create',
                ],
                [
                    'title' => 'Campaign List',
                    'link' => '/admin/campaign/list',
                    'active' => 'admin/campaign/list',
                ]
            ]
        ],
        [
            'title' => 'Master Data',
            'link' => '#master',
            'active' => 'admin/master*',
            'icon' => 'fas fa-th-list',
            'children' => [
                [
                    'title' => 'Recepient',
                    'link' => '/admin/master/recepient',
                    'active' => 'admin/master/recepient',
                ],
                [
                    'title' => 'Recepient Group',
                    'link' => '/admin/master/recepient_group',
                    'active' => 'admin/master/recepient_group',
                ],
            ]
        ],
    ],

];
