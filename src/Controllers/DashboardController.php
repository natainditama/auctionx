<?php

namespace NataInditama\Auctionx\Controllers;

use NataInditama\Auctionx\App\Auth;
use NataInditama\Auctionx\App\View;
use NataInditama\Auctionx\Models\Barang;
use NataInditama\Auctionx\Models\Lelang;
use NataInditama\Auctionx\Models\Masyarakat;
use NataInditama\Auctionx\Models\Petugas;

class DashboardController
{
  public ?array $session = null;
  public Lelang $auction;
  public Barang $product;

  public function __construct()
  {
    $auth = Auth::getSession();
    $this->auction = new Lelang();
    $this->product = new Barang();

    if (isset($auth)) {
      $user = $auth['level'] == "masyarakat" ?  new Masyarakat() : new Petugas();
      $user = (array) $user->findByUsername($auth['username']);
      $user['level'] = $auth['level'];
      $this->session = $user;
    }
  }

  public function index(): void
  {
    View::render("dashboard/index", [
      "auth" => $this->session,
      "showSidebar" => true,
    ]);
  }
  
  public function product(): void
  {
    $products = $this->product->findAll();

    View::render("dashboard/product", [
      "auth" => $this->session,
      "products" => $products,
      "showSidebar" => true,
    ]);
  }
}
