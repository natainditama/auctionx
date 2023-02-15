<?php 

namespace NataInditama\Auctionx\Middleware;

use NataInditama\Auctionx\App\Auth;
use NataInditama\Auctionx\App\Middleware;
use NataInditama\Auctionx\App\View;

class GuestMiddleware implements Middleware
{
  function before(): void
  {
    $isLogin = (bool) Auth::getSession();
    if (!$isLogin) {
      View::redirect('./login');
    }
  }
}