<?php

session_start();
require_once __DIR__ . "/../src/config.php";
require_once __DIR__ . "/../vendor/autoload.php";

use NataInditama\Auctionx\App\Router;
use NataInditama\Auctionx\Controllers\AuctionController;
use NataInditama\Auctionx\Controllers\AuthController;
use NataInditama\Auctionx\Controllers\HomeController;
use NataInditama\Auctionx\Controllers\ProductController;
use NataInditama\Auctionx\Middleware\AuthMiddleware;
use NataInditama\Auctionx\Middleware\GuestMiddleware;

// Dashboard Routes
Router::add(path: '/', controller: HomeController::class, function: 'index');

// Auth Routes
Router::add(path: '/logout', controller: AuthController::class, function: 'logout', middleware: [GuestMiddleware::class]);
Router::add(path: '/login', controller: AuthController::class, function: 'login', middleware: [AuthMiddleware::class]);
Router::add(path: '/register', controller: AuthController::class, function: 'register', middleware: [AuthMiddleware::class]);
Router::add(path: '/admin', controller: AuthController::class, function: 'adminRegister');
Router::add(path: '/login', controller: AuthController::class, function: 'postLogin', method: "POST");
Router::add(path: '/register', controller: AuthController::class, function: 'postRegister', method: "POST");

// Product Routes
// Router::add(path: '/product', controller: ProductController::class, function: 'index', middleware: [GuestMiddleware::class]);
// Router::add(path: '/product', controller: ProductController::class, function: 'store', method: "POST", middleware: [GuestMiddleware::class]);
// Router::add(path: '/product/([0-9a-zA-Z]*)', controller: ProductController::class, function: 'show', middleware: [GuestMiddleware::class]);
// Router::add(path: '/product/([0-9a-zA-Z]*)/destroy', controller: ProductController::class, function: 'destroy', middleware: [GuestMiddleware::class], method: "POST");
// Router::add(path: '/product/([0-9a-zA-Z]*)/update', controller: ProductController::class, function: 'update', middleware: [GuestMiddleware::class], method: "POST");

// Auction Routes
Router::add(path: '/auction', controller: AuctionController::class, function: 'index');
Router::add(path: '/auction/create', controller: AuctionController::class, function: 'create');
Router::add(path: '/auction', controller: AuctionController::class, function: 'store', method: "POST");
Router::add(path: '/auction/([0-9]*)', controller: AuctionController::class, function: 'show');
Router::add(path: '/auction/([0-9]*)/edit', controller: AuctionController::class, function: 'edit');
Router::add(path: '/auction/([0-9]*)/update', controller: AuctionController::class, function: 'update', method: "POST");
Router::add(path: '/auction/([0-9]*)/destroy', controller: AuctionController::class, function: 'destroy', method: "POST");
Router::add(path: '/auction/([0-9]*)', controller: AuctionController::class, function: 'bidAuction', method: "POST");
Router::add(path: '/auction/([0-9]*)/contributions', controller: AuctionController::class, function: 'contributions');

Router::run();