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

// // Home Routes
Router::add('/', HomeController::class, 'index');
Router::add('/pricing', HomeController::class, 'pricing');

// Auth Routes
Router::add('/logout', AuthController::class, 'logout', "GET", [GuestMiddleware::class]);
Router::add('/login', AuthController::class, 'login', "GET", [SellerMiddleware::class]);
Router::add('/register', AuthController::class, 'register', "GET", [AuthMiddleware::class]);
Router::add('/premium/register', AuthController::class, 'adminRegister', "GET", [SellerMiddleware::class]);
Router::add('/login', AuthController::class, 'postLogin', "POST");
Router::add('/register', AuthController::class, 'postRegister', "POST");

// Auction Routes
Router::add('/auction', AuctionController::class, 'index');
Router::add('/auction', AuctionController::class, 'store', "POST");
Router::add('/auction/export', AuctionController::class, 'export', "GET", [BidderMiddleware::class]);
Router::add('/auction/create', AuctionController::class, 'create', "GET", [GuestMiddleware::class, BidderMiddleware::class]);
Router::add('/auction/([0-9]*)', AuctionController::class, 'show');
Router::add('/auction/([0-9]*)', AuctionController::class, 'bid', "POST");
Router::add('/auction/([0-9]*)/edit', AuctionController::class, 'edit', "GET", [GuestMiddleware::class, BidderMiddleware::class]);
Router::add('/auction/([0-9]*)/update', AuctionController::class, 'update', "POST");
Router::add('/auction/([0-9]*)/destroy', AuctionController::class, 'destroy', "POST");
Router::add('/auction/([0-9]*)/contributions', AuctionController::class, 'contributions');

// Bidding Routes
Router::add('/bidding', BiddingController::class, 'index', "GET", [GuestMiddleware::class, SellerMiddleware::class]);
Router::add('/bidding/([0-9]*)/destroy', BiddingController::class, 'destroy', "POST");

// User Routes
Router::add("/profile", UserController::class, 'profile', "GET", [GuestMiddleware::class]);
Router::add("/setting", UserController::class, 'setting', "GET", [GuestMiddleware::class]);
Router::add("/setting", UserController::class, 'updateProfile', "POST");
Router::add("/user", UserController::class, 'index', "GET", [BidderMiddleware::class]);
Router::add('/user', UserController::class, 'store', "POST");
Router::add('/user/([0-9a-zA-Z]*)', UserController::class, 'show');
Router::add('/user/([0-9a-zA-Z]*)/update', UserController::class, 'update', "POST");
Router::add('/user/([0-9a-zA-Z]*)/destroy', UserController::class, 'destroy', "POST");


Router::run();