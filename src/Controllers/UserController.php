<?php

namespace NataInditama\Auctionx\Controllers;

use NataInditama\Auctionx\App\Auth;
use NataInditama\Auctionx\App\View;
use NataInditama\Auctionx\Models\HistoryLelang;
use NataInditama\Auctionx\Models\Lelang;
use NataInditama\Auctionx\Models\Masyarakat;
use NataInditama\Auctionx\Models\Petugas;

class UserController
{
  private ?array $session;
  private Masyarakat $user;
  private Petugas $admin;
  private HistoryLelang $history;
  private Lelang $auction;

  public function __construct()
  {
    $this->session = Auth::getSession();
    $this->user = new Masyarakat();
    $this->history = new HistoryLelang();
    $this->admin = new Petugas();
    $this->auction = new Lelang();
  }

  public function show(string $username, ?string $level = "masyarakat"): void
  {
    if ($level !== "masyarakat") {
      $profile = (array) $this->admin->findByUsername($username);
      $contributions = $this->auction->findAllByPetugasId($profile['id_petugas']);
    } else {      
      $profile = (array) $this->user->findByUsername($username);
      $contributions = $this->history->findAllBindingHistoryByUserId($profile['id_user']);
    }

    if (count($profile) > 0) {
      View::render($view ?? "user/show", [
        "profile" => $profile,
        "history" => $contributions,
        "auth" => $this->session
      ]);
      return;
    }
    View::render("404");
  }

  public function profile(): void
  {
    $this->show($this->session['username'], $this->session['level']);
  }

  public function setting(): void
  {
    View::render("user/setting");
  }
}
