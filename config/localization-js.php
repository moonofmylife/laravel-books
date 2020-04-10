<?php

return [

    /*
     * Set the names of files you want to add to generated javascript.
     * Otherwise all the files will be included.
     *
     * 'messages' => [
     *     'validation',
     *     'forum/thread',
     * ],
     */
    'messages' => [
        'auth',
        'buttons',
        'flash_alerts',
        'menu',
        'modal',
        'models',
        'pages',
        'pagination',
        'passwords',
        'table',
        'validation'
    ],

    /*
     * The default path to use for the generated javascript.
     */
    'path' => resource_path('js/translations.js'),
];
