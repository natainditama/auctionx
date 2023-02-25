<?php

namespace NataInditama\Auctionx\Middleware;

use NataInditama\Auctionx\App\Auth;
use NataInditama\Auctionx\App\Middleware;
use NataInditama\Auctionx\App\View;

class AuthMiddleware implements Middleware
{
  function before(): void
  {
    $isLogin = Auth::isLogin();
    if ($isLogin) {
      View::redirect('./');
    }
  }
}
