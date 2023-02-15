<?php 

namespace NataInditama\Auctionx\Controllers;

use NataInditama\Auctionx\App\Auth;
use NataInditama\Auctionx\App\View;
use NataInditama\Auctionx\Models\Lelang;
use NataInditama\Auctionx\Models\Masyarakat;
use NataInditama\Auctionx\Models\Petugas;

class HomeController
{
  public ?array $session = null;
  public Lelang $auction;

  public function __construct()
  {    
    $auth = Auth::getSession();
    $this->auction = new Lelang();
    
    if (isset($auth)) {
      $user = $auth['level'] == "masyarakat" ?  new Masyarakat() : new Petugas();
      $user = (array) $user->findByUsername($auth['username']);
      $user['level'] = $auth['level'];
      $this->session = $user;
    }
  }

  public function index(): void
  {
    $auctions = $this->auction->findAll();

    View::render("home/index", [
      'products' => $auctions,
      "auth" => $this->session,
    ]);      
  }
  
}