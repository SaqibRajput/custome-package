<?php

    $router->get('/service-name', function () use ($router) {
        return [$router->app->version(). ' | Its '.env('APP_NAME', '(APP_NAME key is missing)').' API Service'];
    });