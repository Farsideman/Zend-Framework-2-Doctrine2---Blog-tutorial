<?php

namespace Blog; //Used for Doctrine path

return [
    'controllers'  => [
        'invokables' => [
            'Blog\\Controller\\Post' => 'Blog\\Controller\\PostController',
        ],
    ],
    'doctrine'        => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [
                    __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src'
                    . DIRECTORY_SEPARATOR . __NAMESPACE__ . DIRECTORY_SEPARATOR . 'Entity',
                ]
            ],
            'orm_default'             => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'view',
        ],
    ],
];