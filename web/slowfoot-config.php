<?php
require_once "site.php";

use slowfoot\configuration;
use slowfoot\image\profile;
use slowfoot_plugin\phuety\phuety_adapter;
use slowfoot_plugin\sanity;
use slowfoot\image\configuration as img_config;

$is_buildhost = preg_match("/kurparkverlag/", $_SERVER['HTTP_HOST'] ?? "");
$is_dev = (($_ENV["SLFT_ENV"] ?? "") == "dev");

return new configuration(
    site_name: 'Kurpark Verlag',
    site_description: 'krimis, ritter vom bka, max müller, spannung, unterhaltung',
    site_url: 'https://kurparkverlag.de',
    // TODO: solve genenv vs ENV problem
    path_prefix: $_ENV['PATH_PREFIX'] ?? '',
    title_template: '',
    store: 'sqlite',
    template_engine: phuety_adapter::class,
    plugins: [
        new sanity\sanity('mfsmduab', $_ENV['SANITY_TOKEN'] ?? "")
    ],
    sources: [
        'sanity' => sanity\sanity::data_loader(...)
    ],
    templates: [
        'post' => '/p/:slug.current',
        'page' => '/:slug.current',
    ],
    assets: new img_config(
        download: true,
        profiles: [
            "small" => new profile(
                size: "600x400",
                mode: "fit"
            ),
            "post" => new profile(
                size: "500x"
            )
        ],
        resize_cdn: function ($img, $resize_opts) {
            return sanity\sanity::sanity_resize($img, $resize_opts);
        }
    ),

    hooks: [
        'after_build' => function (configuration $conf) use ($is_dev) {
            file_put_contents($conf->dist . '/Version', date("YmdHis"));
            if ($is_dev) return;
            shell_exec("cd {$conf->base}; rsync -avz dist/ ../htdocs/");
        }
    ]
);
