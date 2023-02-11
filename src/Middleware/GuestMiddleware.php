<?php 

namespace NataInditama\Auctionx\Middleware;

use NataInditama\Auctionx\App\Middleware;
use NataInditama\Auctionx\App\View;

class GuestMiddleware implements Middleware
{
  function before(): void
  {
    if (!isset($_SESSION['user'])) {
      View::render("./login");
    }
  }
}