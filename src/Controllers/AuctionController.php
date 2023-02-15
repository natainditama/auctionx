<?php

namespace NataInditama\Auctionx\Controllers;

use Exception;
use mysqli;
use NataInditama\Auctionx\App\Auth;
use NataInditama\Auctionx\App\View;
use NataInditama\Auctionx\Models\HistoryLelang;
use NataInditama\Auctionx\Models\Lelang;
use NataInditama\Auctionx\Models\Masyarakat;
use NataInditama\Auctionx\Models\Petugas;

class AuctionController
{
  public ?array $session = null;
  public Lelang $auction;
  public HistoryLelang $history;

  public function __construct()
  {
    $auth = Auth::getSession();
    $this->auction = new Lelang();
    $this->history = new HistoryLelang();

    if (isset($auth)) {
      $user = $auth['level'] == "masyarakat" ?  new Masyarakat() : new Petugas();
      $user = (array) $user->findByUsername($auth['username']);
      $user['level'] = $auth['level'];
      $this->session = $user;
    }
  }

  public function index(string $barangId): void
  {
    $auction = $this->auction->findByBarangId($barangId);

    if (isset($auction)) {
      $history = (array) $this->history->findByIdLelang($auction['id_lelang']);
      View::render("home/auction", [
        "auction" => $auction,
        'auth' => $this->session,
        "history" => $history
      ]);
    } else {
      View::render("not-found");
    }
  }

  public function contributions(string $barangId): void
  {
    $auction = $this->auction->findByBarangId($barangId);

    if (isset($auction)) {
      $history = (array) $this->history->findByIdLelang($auction['id_lelang']);
      View::render("home/contributions", [
        'auth' => $this->session,
        "auction" => $auction,
        "history" => $history
      ]);
    } else {
      View::render("not-found");
    }
  }

  public function postQuotation(): void
  {
    $auction = $this->auction->findByBarangId($_POST['id_barang']);
    $history = (array) $this->history->findByIdLelang($auction['id_lelang']);

    try {
      $request = new HistoryLelang();
      $request->penawaran_harga = $_POST['price'];
      $request->id_barang = $_POST['id_barang'];
      $request->id_lelang = $_POST['id_lelang'];
      $request->id_user = $_POST['id_user'];

      $this->history->save($request);
      View::render("home/auction", [
        'auth' => $this->session,
        "auction" => $auction,
        "history" => $history,
        'alert' => [
          "type" => "success",
          "message" => "Data disimpan"
        ]
      ]);
    } catch (Exception $th) {
      View::render("home/auction/", [
        'auth' => $this->session,
        "auction" => $auction,
        "history" => $history,
        'alert' => [
          "type" => "danger",
          "message" => $th->getMessage()
        ]
      ]);
    }
  }
}
