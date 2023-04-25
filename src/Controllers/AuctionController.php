<?php

namespace NataInditama\Auctionx\Controllers;

use Exception;
use NataInditama\Auctionx\App\Auth;
use NataInditama\Auctionx\App\Database;
use NataInditama\Auctionx\App\Flasher;
use NataInditama\Auctionx\App\View;
use NataInditama\Auctionx\Models\Barang;
use NataInditama\Auctionx\Models\HistoryLelang;
use NataInditama\Auctionx\Models\Lelang;

class AuctionController
{
  public ?array $session = null;
  public Lelang $auction;
  public HistoryLelang $history;
  public Barang $product;

  public function __construct()
  {
    $this->session = Auth::getSession();
    $this->auction = new Lelang();
    $this->history = new HistoryLelang();
    $this->product = new Barang();
  }

  public function index(): void
  {
    if (isset($this->session) && $this->session['level'] != "masyarakat") {
      $products = $this->auction->findAll();
      if ($this->session['level'] == "administrator") {
        $products = $this->auction->findAllByPetugasId($this->session['id_petugas']);
      }
      View::render("auction/dashboard", [
        "products" => $products,
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
    View::render("auction/form", [
      "auth" => $this->session
    ]);
  }

  public function store(): void
  {
    $mysqli = Database::getConnection();
    $mysqli->begin_transaction();
    try {
      $request = new Barang();
      $request->nama_barang = $_POST['nama_barang'];
      $request->tgl = $_POST['tgl_dibuka'];
      $request->harga_awal = $_POST['harga_awal'];
      $request->deskripsi_barang = $_POST['deskripsi_barang'];
      $result = $this->product->save($request);

      $newAuction = new Lelang();
      $newAuction->id_barang = $result->insert_id;
      $newAuction->tgl_dibuka = $request->tgl;
      $newAuction->tgl_ditutup = $_POST['tgl_ditutup'];
      $newAuction->harga_akhir = 0;
      $newAuction->id_petugas = $this->session['id_petugas'];
      $newAuction->id_user = null;
      $newAuction->status = $_POST['status'];
      $this->auction->save($newAuction);

      $mysqli->commit();
      Flasher::setFlasher("success", "Your auction request has been saved");
      View::redirect("./auction");
    } catch (Exception $th) {
      $mysqli->rollback();
      Flasher::setFlasher("danger", $th->getMessage());
      View::redirect("./auction/create");
    }
  }

  public function show(string $barangId, ?string $view = null): void
  {
    $auction = $this->auction->findByBarangId($barangId);
    $products = $this->auction->findAllByStatus("dibuka");

    if (isset($auction)) {
      $history = $this->history->findAllByLelangId($auction['id_lelang']);
      View::render($view ?? "auction/show", [
        "auction" => $auction,
        "auth" => $this->session,
        "history" => $history,
        "products" => array_slice($products, rand(0, count($products) / 2), 3)
      ]);
      return;
    }
    View::render("404");
  }

  public function edit(string $barangId): void
  {
    $product = $this->auction->findByBarangId($barangId);

    if (isset($product)) {
      View::render("auction/form", [
        "product" => $product,
        "action" => "edit",
        "auth" => $this->session
      ]);
      return;
    }
    View::render("404");
  }

  public function update(string $barangId): void
  {
    $mysqli = Database::getConnection();
    $mysqli->begin_transaction();
    try {
      $request = new Barang();
      $request->id_barang = $barangId;
      $request->nama_barang = $_POST['nama_barang'];
      $request->tgl = $_POST['tgl_dibuka'];
      $request->harga_awal = $_POST['harga_awal'];
      $request->deskripsi_barang = $_POST['deskripsi_barang'];
      $this->product->updateByBarangId($request);

      $newAuction = new Lelang();
      $newAuction->id_barang = $barangId;
      $newAuction->tgl_dibuka = $request->tgl;
      $newAuction->tgl_ditutup = $_POST['tgl_ditutup'];
      $newAuction->status = $_POST['status'];
      $this->auction->updateByBarangId($newAuction);

      $mysqli->commit();
      Flasher::setFlasher("success", "Your auction request has been saved");
      View::redirect("./auction");
    } catch (Exception $th) {
      $mysqli->rollback();
      Flasher::setFlasher("danger", $th->getMessage());
      View::redirect("./auction");
    }
  }

  public function destroy(string $barangId): void
  {
    $mysqli = Database::getConnection();
    $mysqli->begin_transaction();
    try {
      $this->history->deleteByBarangId($barangId);
      $this->auction->deleteByBarangId($barangId);
      $this->product->deleteByBarangId($barangId);

      $mysqli->commit();
      Flasher::setFlasher("warning", "Your data has been deleted.");
      View::redirect("./auction");
    } catch (Exception $th) {
      $mysqli->rollback();
      Flasher::setFlasher("danger", $th->getMessage());
      View::redirect("./auction");
    }
  }

  public function contributions(string $barangId): void
  {
    $this->show($barangId, "auction/contributions");
  }

  public function bid(): void
  {
    $mysqli = Database::getConnection();
    $mysqli->begin_transaction();
    try {
      $request = new HistoryLelang();
      $request->penawaran_harga = $_POST['price'];
      $request->id_barang = $_POST['id_barang'];
      $request->id_lelang = $_POST['id_lelang'];
      $request->id_user = $_POST['id_user'];

      // Check jika harga telah ada
      $history = $this->history->findAllByLelangId($request->id_lelang);
      foreach ($history as $key => $value) {
        if ($value['penawaran_harga'] === $request->penawaran_harga) {
          throw new Exception("Your bid request already exists");
        }
      }

      // check jika sudah membuat penawaran harga
      $currentHistory = $this->history->findByUserIdAndBarangId($request->id_user, $request->id_barang);
      if (isset($currentHistory)) {
        $this->history->updateBidingPriceByUserId($request);
      } else {
        $this->history->save($request);
      }

      // Ubah harga penawaran paling tinggi
      $history = $this->history->findAllByLelangId($request->id_lelang);
      if (isset($history[0])) {
        $topBiding = new HistoryLelang();
        $topBiding->penawaran_harga = $history[0]['penawaran_harga'];
        $topBiding->id_user = $history[0]['id_user'];
        $topBiding->id_lelang = $history[0]['id_lelang'];
        $this->auction->updateBidingHistoryByLelangId($topBiding);
      } else {
        $topBiding = new HistoryLelang();
        $topBiding->penawaran_harga = 0;
        $topBiding->id_user = null;
        $topBiding->id_lelang = $request->id_lelang;
        $this->auction->updateBidingHistoryByLelangId($topBiding);
      }

      $mysqli->commit();
      Flasher::setFlasher("success", "Your bid request has been saved");
      View::redirect("./auction/$request->id_barang");
    } catch (Exception $th) {
      $mysqli->rollback();
      Flasher::setFlasher("danger", $th->getMessage());
      View::redirect("./auction/$request->id_barang");
    }
  }

  public function export(): void
  {
    $products = $this->auction->findAll();
    if ($this->session['level'] == "administrator") {
      $products = $this->auction->findAllByPetugasId($this->session['id_petugas']);
    }
    View::renderFile("auction/export", [
      "products" => $products,
    ]);
    return;
  }
}
