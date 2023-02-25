<?php

session_start();
require_once __DIR__ . "/../src/config.php";
require_once __DIR__ . "/../vendor/autoload.php";

use NataInditama\Auctionx\App\Router;
use NataInditama\Auctionx\Controllers\HomeController;
use NataInditama\Auctionx\Middleware\AuthMiddleware;
use NataInditama\Auctionx\Middleware\GuestMiddleware;

Router::add(path: '/', controller: HomeController::class, function: 'index');
Router::add(path: '/detail/([0-9a-zA-Z]*)', controller: HomeController::class, function: 'detail');
Router::add(path: '/admin', controller: HomeController::class, function: 'admin', middleware: [GuestMiddleware::class]);
Router::add(path: '/login', controller: HomeController::class, function: 'login', middleware: [AuthMiddleware::class]);

Router::run();