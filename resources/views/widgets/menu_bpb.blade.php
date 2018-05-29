@php
$bpb_menu[] = [
    'label' => 'Beranda',
    'url' => '/si-bpb',
    'icon' => 'fa fa-home',
];
$bpb_menu[] = [
    'label' => 'Master Data',
    'url' => '#',
    'icon' => 'fa fa-list'
];
$bpb_menu[] = [
    'label' => 'Instrument Data',
    'url' => '#',
    'icon' => 'fa fa-list',
    'childs' => [
        [
            'label' => 'Struktur Program', 
            'url' => '/si-bpb/struktur-program', 
            'icon' => 'fa fa-caret-right'
        ],
        [
            'label' => 'Instrument Data', 
            'url' => '#', 
            'icon' => 'fa fa-caret-right',
            'childs' => [
                [
                    'label' => 'Informasi Kewilayahan', 
                    'url' => '/si-bpb/informasi-wilayah', 
                    'icon' => 'fa fa-caret-right'
                ],
                [
                    'label' => 'Pembinaan dan Pengawasan Penyelenggaraan Bangunan Gedung', 
                    'url' => '/si-bpb/pembinaan-pengawasan', 
                    'icon' => 'fa fa-caret-right'
                ],
            ]
        ],
    ]
];
$bpb_menu[] = [
    'label' => 'User Management',
    'url' => '#',
    'icon' => 'fa fa-user',
    'childs' => [
        [
            'label' => 'User BPB', 
            'url' => '/si-bpb/user-bpb', 
            'icon' => 'fa fa-caret-right'
        ],
        [
            'label' => 'User HSBGN', 
            'url' => '/si-bpb/user-hsbgn', 
            'icon' => 'fa fa-caret-right'
        ],
        [
            'label' => 'User PERDABG', 
            'url' => '/si-bpb/user-perdabg', 
            'icon' => 'fa fa-caret-right'
        ],
    ]
];
@endphp

{!! Menu::treeView($bpb_menu) !!}