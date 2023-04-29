<?php

namespace NataInditama\Auctionx\Controllers;

use Exception;
use NataInditama\Auctionx\App\Auth;
use NataInditama\Auctionx\App\Database;
use NataInditama\Auctionx\App\Flasher;
use NataInditama\Auctionx\App\View;
use NataInditama\Auctionx\Models\HistoryLelang;
use NataInditama\Auctionx\Models\Lelang;

class BiddingController
{
  public ?array $session = null;
  public HistoryLelang $history;
  public Lelang $auction;

  public function __construct()
  {
    $this->session = Auth::getSession();
    $this->history = new HistoryLelang();
    $this->auction = new Lelang();
  }

  public function index(): void
  {
    $bidHistory = $this->history->findAllBindingHistoryByUserId($this->session['id_user']);
    View::render("bidding/index", [
      "history" => $bidHistory
    ]);
  }

  public function destroy(int $productId): void
  {
    $mysli = Database::getConnection();
    $mysli->begin_transaction();
    try {
      $userId = $this->session['id_user'];
      $id_lelang = $_POST['id_lelang'];
      $this->history->deleteByUserIdAndBarangId($userId, $productId);

      // Ubah harga penawaran paling tinggi
      $history = $this->history->findAllByLelangId($id_lelang);
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
        $topBiding->id_lelang = $id_lelang;
        $this->auction->updateBidingHistoryByLelangId($topBiding);
      }

      $mysli->commit();
      Flasher::setFlasher("warning", "Your data has been deleted.");
      View::redirect("./bidding");
    } catch (Exception $error) {
      $mysli->rollback();
      Flasher::setFlasher("danger", $error->getMessage());
      View::redirect("./bidding");
    }
  }
}
