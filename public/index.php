<?php

session_start();
require_once __DIR__ . "/../src/config.php";
require_once __DIR__ . "/../vendor/autoload.php";

use NataInditama\Auctionx\App\Router;
use NataInditama\Auctionx\Controllers\AuthController;
use NataInditama\Auctionx\Controllers\HomeController;
use NataInditama\Auctionx\Middleware\AuthMiddleware;
use NataInditama\Auctionx\Middleware\GuestMiddleware;

Router::add(path: '/', controller: HomeController::class, function: 'index');

// Auth Routes
Router::add(path: '/logout', controller: AuthController::class, function: 'logout', middleware: [GuestMiddleware::class]);
Router::add(path: '/login', controller: AuthController::class, function: 'login', middleware: [AuthMiddleware::class]);
Router::add(path: '/register', controller: AuthController::class, function: 'register', middleware: [AuthMiddleware::class]);
Router::add(path: '/admin', controller: AuthController::class, function: 'adminRegister');
Router::add(path: '/login', controller: AuthController::class, function: 'postLogin', method: "POST");
Router::add(path: '/register', controller: AuthController::class, function: 'postRegister', method: "POST");

Router::run();