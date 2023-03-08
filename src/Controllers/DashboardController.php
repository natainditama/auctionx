<?php 

namespace NataInditama\Auctionx\Controllers;

use NataInditama\Auctionx\App\Auth;
use NataInditama\Auctionx\App\View;
use NataInditama\Auctionx\Models\Barang;
use NataInditama\Auctionx\Models\HistoryLelang;
use NataInditama\Auctionx\Models\Lelang;

class DashboardController
{
  public array $session;
  public Lelang $auction;
  public Barang $product;
  public HistoryLelang $history;

  public function __construct()
  {
    $this->session = Auth::getSession();
  }

  public function index(): void
  {
    $auctions = $this->auction->findAll() ?? [];

    View::render("dashboard/index", [
      "auction" => $auctions,
    ]);
  }
}