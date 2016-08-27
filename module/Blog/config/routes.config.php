<?php

return [
    'router' => [
        'routes' => [
            //routeName: blog
            //route: /blog
            'blog' => [
                'type'          => 'Literal',
                'may_terminate' => true,
                'options'       => [
                    'route'    => '/blog',
                'defaults' => [
                    'module'     => 'Blog',
                    'controller' => 'Blog\\Controller\\Post',
                    'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
];