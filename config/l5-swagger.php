<?php

return [
    'default' => 'default',

    'documentations' => [
        'default' => [
            'api' => [
                'title' => 'API de Contratos',
            ],

            'routes' => [
                /*
                 * Route for accessing the swagger-ui interface
                 */
                'api' => 'api/documentation',
            ],

            'paths' => [
                /*
                 * Path to the controllers directory
                 */
                'annotations' => [
                    base_path('app/Http/Controllers'),
                    base_path('app/Domain'),
                    base_path('app/Repositories'),
                    base_path('app/UseCases'),
                ],
            ],
        ],
    ],
];
