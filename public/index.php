<?php

session_start();
require_once __DIR__ . "/../src/config.php";
require_once __DIR__ . "/../vendor/autoload.php";

use NataInditama\Auctionx\App\Router;
use NataInditama\Auctionx\Controllers\AuctionController;
use NataInditama\Auctionx\Controllers\AuthController;
use NataInditama\Auctionx\Controllers\BiddingController;
use NataInditama\Auctionx\Controllers\HomeController;
use NataInditama\Auctionx\Controllers\UserController;
use NataInditama\Auctionx\Middleware\AuthMiddleware;
use NataInditama\Auctionx\Middleware\BidderMiddleware;
use NataInditama\Auctionx\Middleware\GuestMiddleware;
use NataInditama\Auctionx\Middleware\SellerMiddleware;

// Home Routes
Router::add(path: '/', controller: HomeController::class, function: 'index');
Router::add(path: '/pricing', controller: HomeController::class, function: 'pricing');

// Auth Routes
Router::add(path: '/logout', controller: AuthController::class, function: 'logout', middleware: [GuestMiddleware::class]);
Router::add(path: '/login', controller: AuthController::class, function: 'login', middleware: [SellerMiddleware::class]);
Router::add(path: '/register', controller: AuthController::class, function: 'register', middleware: [AuthMiddleware::class]);
Router::add(path: '/premium/register', controller: AuthController::class, function: 'adminRegister', middleware: [SellerMiddleware::class]);
Router::add(path: '/login', controller: AuthController::class, function: 'postLogin', method: "POST");
Router::add(path: '/register', controller: AuthController::class, function: 'postRegister', method: "POST");

// Auction Routes
Router::add(path: '/auction', controller: AuctionController::class, function: 'index');
Router::add(path: '/auction', controller: AuctionController::class, function: 'store', method: "POST");
Router::add(path: '/auction/export', controller: AuctionController::class, function: 'export', middleware: [BidderMiddleware::class]);
Router::add(path: '/auction/create', controller: AuctionController::class, function: 'create', middleware: [GuestMiddleware::class, BidderMiddleware::class]);
Router::add(path: '/auction/([0-9]*)', controller: AuctionController::class, function: 'show');
Router::add(path: '/auction/([0-9]*)', controller: AuctionController::class, function: 'bid', method: "POST");
Router::add(path: '/auction/([0-9]*)/edit', controller: AuctionController::class, function: 'edit', middleware: [GuestMiddleware::class, BidderMiddleware::class]);
Router::add(path: '/auction/([0-9]*)/update', controller: AuctionController::class, function: 'update', method: "POST");
Router::add(path: '/auction/([0-9]*)/destroy', controller: AuctionController::class, function: 'destroy', method: "POST");
Router::add(path: '/auction/([0-9]*)/contributions', controller: AuctionController::class, function: 'contributions');

// Bidding Routes
Router::add(path: '/bidding', controller: BiddingController::class, function: 'index', middleware: [GuestMiddleware::class, SellerMiddleware::class]);
Router::add(path: '/bidding/([0-9]*)/destroy', controller: BiddingController::class, function: 'destroy', method: "POST");

// User Routes
Router::add(path: "/profile", controller: UserController::class, function: 'profile', middleware: [GuestMiddleware::class]);
Router::add(path: "/setting", controller: UserController::class, function: 'setting', middleware: [GuestMiddleware::class]);
Router::add(path: "/setting", controller: UserController::class, function: 'updateProfile', method: "POST");
Router::add(path: "/user", controller: UserController::class, function: 'index', middleware: [BidderMiddleware::class]);
Router::add(path: '/user', controller: UserController::class, function: 'store', method: "POST");
Router::add(path: '/user/([0-9a-zA-Z]*)', controller: UserController::class, function: 'show');
Router::add(path: '/user/([0-9a-zA-Z]*)/update', controller: UserController::class, function: 'update', method: "POST");
Router::add(path: '/user/([0-9a-zA-Z]*)/destroy', controller: UserController::class, function: 'destroy', method: "POST");


Router::run();
