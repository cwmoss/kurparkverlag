<?php

if (!defined('SLOWFOOT_BASE')) {
    define('SLOWFOOT_BASE', __DIR__ . '/../');
}

hook::add('sanity.resolve_link', function($m, $ds){
    var_dump($m);
});

hook::add_filter('sanity.block_serializers', function($ds, $config){
    return [
        'marks'=>[
            'link' => [
                'head' => function ($mark) use($ds){
                    return '<a href="' . sanity_link_url($mark, $ds) . '">';
                },
                'tail' => '</a>'
            ],
            'authorLink' => [
                'head' => function ($mark) use($ds){
                    return '<a href="' . sanity_link_url($mark, $ds) . '">';
                },
                'tail' => '</a>'
            ]
        ]
        ,
        'reference' => function ($item, $parent, $htmlBuilder) use($ds){
            // print_r($item);
            return sprintf('<div class="video">link %s %s</div>', 
                $item['attributes']['_ref'],
                $ds->get_path($item['attributes']['_ref'])
            );
        },
        
        'videoEmbed' =>function ($item, $parent, $htmlBuilder) {
            // print_r($item);
            return sprintf('<div class="video">%s</div>', convertYoutube($item['attributes']['url']));
        },
        'xxxlistItem' => function ($item, $parent, $htmlBuilder) {
          return '<li class="my-list-item">' . implode('\n', $item['children']) . '</li>';
        },
        'xxxgeopoint' => function ($item) {
          $attrs = $item['attributes'];
          $url = 'https://www.google.com/maps/embed/v1/place?key=someApiKey&center=';
          $url .= $attrs['lat'] . ',' . $attrs['lng'];
          return '<iframe class="geomap" src="' . $url . '" allowfullscreen></iframe>';
        },
        'xxxpet' => function ($item, $parent, $htmlBuilder) {
          return '<p class="pet">' . $htmlBuilder->escape($item['attributes']['name']) . '</p>';
        }
    ];
});

function sanity_link_url($link, $ds){
    if($link['_type']=='link') return $link['href'];
    return $link['internal'] ? $ds->get_path($link['internal']['_ref']) : (  $link['route'] ? path_page($link['route']): $link['external'] );
}

function convertYoutube($string) {
    return preg_replace(
        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
        "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen width=\"640\" height=\"360\" frameborder=\"0\"></iframe>",
        $string
    );
}

/* 
    $sl could be 
    - a sanity#link object
    - a sanity#nav_item
*/
function xxsanity_link($sl, $opts=[], $ds){
    $link = $sl['link'];
    if(!$link) $link = $sl;
    #print_r($link);
    $url = sanity_link_url($link, $ds);

    $text = $opts['text']?:$sl['text'];
    if(!$text){
        if($link['internal']){
            $internal = $ds->ref($link['internal']);
            $text = $internal['title'];
        }else{
            $text = $url;
        }
    }
    return sprintf('<a href="%s">%s</a>', $url, $text);
}


