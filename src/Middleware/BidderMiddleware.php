<?php

namespace NataInditama\Auctionx\Middleware;

use NataInditama\Auctionx\App\Auth;
use NataInditama\Auctionx\App\Flasher;
use NataInditama\Auctionx\App\Middleware;
use NataInditama\Auctionx\App\View;

class BidderMiddleware implements Middleware
{
  function before(): void
  {
    $isLogin = Auth::isLogin();
    $auth = Auth::getSession();
    if ($isLogin && $auth['level'] === "masyarakat") {
      Flasher::setFlasher("warning", "Access denied for your account");
      View::redirect("./");
    }
  }
}
