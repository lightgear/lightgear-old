<?php

Asset::register(
    array(
        'libraries/ckeditor/ckeditor.js',
        'libraries/ckeditor/config.js',
        'libraries/ckeditor/styles.js',
        'scripts/ckeditor.js',
        'styles/less/base.less'
    )
);

Asset::register(
    array(
        'libraries/ckeditor/skins/moono',
        'libraries/ckeditor/lang',
        'libraries/ckeditor/plugins',
    ),
    array('link_resource' => false)
);
