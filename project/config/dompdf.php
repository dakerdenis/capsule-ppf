<?php

return [

    'show_warnings' => false,   // Throw an Exception on warnings from dompdf

    'public_path' => null,  // Override the public path if needed

    'convert_entities' => true,

    'options' => [

        'font_dir' => resource_path('fonts'), // advised by dompdf (https://github.com/dompdf/dompdf/pull/782)

        'font_cache' => storage_path('fonts'),

        'temp_dir' => sys_get_temp_dir(),

        'chroot' => realpath(base_path()),

        'allowed_protocols' => [
            'data://' => ['rules' => []],
            'file://' => ['rules' => []],
            'http://' => ['rules' => []],
            'https://' => ['rules' => []],
        ],

        'artifactPathValidation' => null,

        'log_output_file' => null,

        'enable_font_subsetting' => false,

        'pdf_backend' => 'CPDF',

        'default_media_type' => 'screen',

        'default_paper_size' => 'a4',

        'default_paper_orientation' => 'portrait',

        'font_data' => [
            'notosans' => [
                'R' => 'NotoSans-Regular.ttf',
                'useOTL' => true,
                'useKashida' => 75,
            ],
        ],

        'default_font' => 'notosans',

        'dpi' => 96,

        'enable_php' => false,

        'enable_javascript' => true,

        'enable_remote' => false,

        'allowed_remote_hosts' => null,

        'font_height_ratio' => 1.1,

        'enable_html5_parser' => true,
    ],

];
