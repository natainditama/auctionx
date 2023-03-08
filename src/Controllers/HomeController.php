<?php 

namespace NataInditama\Auctionx\Controllers;

use NataInditama\Auctionx\App\Auth;
use NataInditama\Auctionx\App\View;
use NataInditama\Auctionx\Models\Barang;
use NataInditama\Auctionx\Models\Lelang;
use NataInditama\Auctionx\Models\Masyarakat;

class HomeController
{
  private ?array $session;
  public Lelang $auction;
  public Barang $product;
  public Masyarakat $user;

  public function __construct()
  {
    $this->session = Auth::getSession();
    $this->auction = new Lelang();
    $this->product = new Barang();
    $this->user = new Masyarakat();
  }

  public function index(): void
  {
    if (isset($this->session)) {
      $auctions = $this->auction->findAll();
      $products = $this->product->findAll();
      $users = $this->user->findAll();

      View::render("dashboard/index", [
        "auctions" => $auctions,
        "products" => $auctions,
        "users" => $users,
        "auth" => $this->session,
        "showSidebar" => true,
      ]);
    } else{
      $auctions = $this->auction->findAllByStatus('dibuka');
      View::render("auction/index", [
        "products" => $auctions,
        "auth" => $this->session,
      ]);      
      
    }
  }
}