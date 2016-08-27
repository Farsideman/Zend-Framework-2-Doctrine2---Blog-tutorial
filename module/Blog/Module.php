<?php

namespace Blog;

use Blog\Entity\Post;
use Zend\Stdlib\ArrayUtils;

class Module
{
    public function getConfig()
    {
        $config = [];

        $configFiles = [
            __DIR__ . '/config/module.config.php',
            __DIR__ . '/config/routes.config.php',
        ];

        // Merge all module config options
        foreach ($configFiles as $configFile)
        {
            $config = ArrayUtils::merge(
                $config,
                include $configFile
            );
        }

        return $config;

    }

    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ],
            ],
        ];
    }
}