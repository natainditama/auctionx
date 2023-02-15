<?php

session_start();
require_once __DIR__ . "/../src/config.php";
require_once __DIR__ . "/../vendor/autoload.php";

use NataInditama\Auctionx\App\Router;
use NataInditama\Auctionx\Controllers\AuctionController;
use NataInditama\Auctionx\Controllers\AuthController;
use NataInditama\Auctionx\Controllers\DashboardController;
use NataInditama\Auctionx\Controllers\HomeController;
use NataInditama\Auctionx\Middleware\AuthMiddleware;
use NataInditama\Auctionx\Middleware\GuestMiddleware;

Router::add(path: '/', controller: HomeController::class, function: 'index');

// Dashboard
Router::add(path: '/dashboard', controller: DashboardController::class, function: 'index', middleware: [GuestMiddleware::class]);
Router::add(path: '/dashboard/product', controller: DashboardController::class, function: 'product', middleware: [GuestMiddleware::class]);

// Auction
Router::add(path: '/auction/([0-9a-zA-Z]*)', controller: AuctionController::class, function: 'index');
Router::add(path: '/auction/([0-9a-zA-Z]*)/contributions', controller: AuctionController::class, function: 'contributions');
Router::add(path: '/auction/([0-9a-zA-Z]*)', controller: AuctionController::class, function: 'postQuotation', method: "POST");

// Auth
Router::add(path: '/logout', controller: AuthController::class, function: 'logout', middleware: [GuestMiddleware::class]);
Router::add(path: '/login', controller: AuthController::class, function: 'login', middleware: [AuthMiddleware::class]);
Router::add(path: '/register', controller: AuthController::class, function: 'register', middleware: [AuthMiddleware::class]);
Router::add(path: '/admin/register', controller: AuthController::class, function: 'adminRegister');
Router::add(path: '/login', controller: AuthController::class, function: 'postLogin', method: "POST");
Router::add(path: '/register', controller: AuthController::class, function: 'postRegister', method: "POST");

Router::run();