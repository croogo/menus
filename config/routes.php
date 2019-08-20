<?php

use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin('Croogo/Menus', ['path' => '/'], function (RouteBuilder $route) {
    $route->prefix('admin', function (RouteBuilder $route) {
        $route->setExtensions(['json']);

        $route->scope('/menus', [], function (RouteBuilder $route) {
            $route->fallbacks();
        });
    });
});
