<?php

namespace NataInditama\Auctionx\Controllers;

use Exception;
use NataInditama\Auctionx\App\Auth;
use NataInditama\Auctionx\App\View;
use NataInditama\Auctionx\Models\HistoryLelang;
use NataInditama\Auctionx\Models\Lelang;

class AuctionController
{
  public ?array $session = null;
  public Lelang $auction;
  public HistoryLelang $history;

  public function __construct()
  {
    $this->session = Auth::getSession();
    $this->auction = new Lelang();
    $this->history = new HistoryLelang();
  }

  public function index(): void
  {
    if (isset($this->session) && $this->session['level'] != "masyarakat") {
      $auctions = $this->auction->findAll();

      View::render("auction/dashboard", [
        "products" => $auctions,
        "auth" => $this->session,
      ]);

      return;
    }

    $products = $this->auction->findAllByStatus('dibuka');
    View::render("auction/index", [
      "products" => $products,
      "auth" => $this->session,
    ]);
  }

  public function create(): void
  {
    View::render("auction/form");
  }

  public function store(): void
  {
    try {
    } catch (Exception $th) {
      throw $th;
    }
  }

  public function show(string $barangId, ?array $model = [], ?string $view = null): void
  {
    $auction = $this->auction->findByBarangId($barangId);

    if (isset($auction)) {
      $history = $this->history->findAllByLelangId($auction['id_lelang']);
      View::render($view ?? "auction/show", array_merge([
        "auction" => $auction,
        "auth" => $this->session,
        "history" => $history,
      ], $model));
      return;
    }
    View::render("404");
  }

  public function edit(string $barangId): void
  {
    # code...
  }

  public function update(string $barangId): void
  {
    # code...
  }

  public function destroy(string $barangId): void
  {
    # code...
  }

  public function contributions(string $barangId): void
  {
    $this->show($barangId, [], "auction/contributions");
  }

  public function bidAuction(): void
  {
    try {
      $request = new HistoryLelang();
      $request->penawaran_harga = $_POST['price'];
      $request->id_barang = $_POST['id_barang'];
      $request->id_lelang = $_POST['id_lelang'];
      $request->id_user = $_POST['id_user'];

      $history = $this->history->findAllByLelangId($request->id_lelang);
      foreach ($history as $key => $value) {
        if($value['penawaran_harga'] === $request->penawaran_harga){
          throw new Exception("Penawaran harga tidak boleh sama");
        }
      }

      $request->save($request);
      $this->show($request->id_barang, [
        "alert" => [
          "type" => "success",
          "message" => "data telah disimpan"
        ]
      ]);
    } catch (Exception $th) {
      $this->show($request->id_barang, [
        "alert" => [
          "type" => "danger",
          "message" => $th->getMessage(),
        ]
      ]);
    }
  }
}
