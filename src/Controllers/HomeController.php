<?php

namespace NataInditama\Auctionx\Controllers;

use NataInditama\Auctionx\App\Auth;
use NataInditama\Auctionx\App\View;
use NataInditama\Auctionx\Models\Barang;
use NataInditama\Auctionx\Models\HistoryLelang;
use NataInditama\Auctionx\Models\Lelang;
use NataInditama\Auctionx\Models\Masyarakat;

class HomeController
{
  private ?array $session;
  public Lelang $auction;
  public Barang $product;
  public Masyarakat $user;
  public HistoryLelang $history;

  public function __construct()
  {
    $this->session = Auth::getSession();
    $this->auction = new Lelang();
    $this->product = new Barang();
    $this->user = new Masyarakat();
    $this->history = new HistoryLelang();
  }

  public function index(): void
  {
    if (isset($this->session)) {
      if (isset($this->session['id_user']) && $this->session['level'] == "masyarakat") {
        $auction = $this->auction->findAll();
        $contribution = $this->history->findAllByUserId($this->session['id_user']);
        $history = $this->history->findAllByUserId($this->session['id_user']);

        $array = [];
        foreach ($history as $key => $row) {
          array_push($array, $row['penawaran_harga']);
        }

        $highest = number_format(!empty($array) ? max($array) : 0, 0, "", ".");
        $total = number_format(array_sum($array), 2, ",", ".");
        $avarage = number_format(!empty($array) ? array_sum($array) / count($array) : 0, 0, "", ".");
        $avarageContribution = !empty($contribution) && !empty($auction) ?  count($contribution) / count($auction) * 100 : 0;

        View::render("dashboard/index", [
          "auction" => $auction,
          "contribution" => $avarageContribution,
          "avarage" => $avarage,
          "highest" => $highest,
          "total" => $total,
          "auth" => $this->session,
        ]);
      } elseif (isset($this->session['id_petugas']) && $this->session['level'] != "masyarakat") {
        if ($this->session['level'] == "petugas") {
          $auction = $this->auction->findAllByPetugasId($this->session['id_petugas']);
        } else{
          
        }

        View::render("dashboard/index", [
          "auth" => $this->session,
        ]);
      }
    } else {
      $auctions = $this->auction->findAllByStatus('dibuka');
      View::render("auction/index", [
        "products" => $auctions,
        "auth" => $this->session,
      ]);
    }
  }

  public function pricing(): void
  {
    View::render("pricing");
  }

}
