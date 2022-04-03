<?php

return [
    'site_name' => 'Kurpark Verlag',
    'site_description' => 'krimis, ritter vom bka, max müller, spannung, unterhaltung',
    'site_url' => 'https://kurparkverlag.de',
    // TODO: solve genenv vs ENV problem
    'path_prefix' => getenv('PATH_PREFIX') ?: $_ENV['PATH_PREFIX'] ?: '',
    'title_template' => '',
    'store' => 'sqlite',
    'sources' => [
        
        'sanity' => [
            'dataset' => 'production',
            'projectId' => 'mfsmduab',
            'useCdn' => true,
            // 'query' => '*[_type=="custom-type-query"]'
        ]
        
    ],
    'preview' => [
        'sanity' => [
            'dataset' => 'production',
            'projectId' => $_ENV['SANITY_ID'],
            'useCdn' => false,
            //'withCredentials' => true,
            'token' => $_ENV['SANITY_TOKEN']
        ]
    ],
    'templates' => [
        'post' => '/p/:slug.current',
        'page' => '/:slug.current',
        //fn ($doc) => 'newsletter/' . $doc['slug']['current']
    ],
    'assets' => [
        'dir' => 'images',
        'path' => '/images',
        'download' => true, 
        'profiles' => [
            'small' => [
                's' => '600x400',
                'mode' => 'fit'
            ],
            'post' => [
                'size' => '500x', 
                
            ]
        ],
        
        'resize_cdn' => function($img, $resize_opts){
            return sanity_resize($img, $resize_opts);
        }
    ],
    'hooks' => [
       # 'on_load' => function ($row, $ds) {
       #     return $row;
       # }
    ]
];
