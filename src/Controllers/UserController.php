<?php

namespace NataInditama\Auctionx\Controllers;

use Exception;
use NataInditama\Auctionx\App\Auth;
use NataInditama\Auctionx\App\Database;
use NataInditama\Auctionx\App\Flasher;
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

  public function index(): void
  {
    $users = $this->user->findAll();
    View::render("./user/index", [
      "users" => $users,
      "auth" => $this->session
    ]);
  }

  public function show(string $username): void
  {
    $profile = $this->user->findByUsername($username);
    $contributions = $this->history->findAllBindingHistoryByUserId($profile['id_user']);

    if (count($profile) > 0) {
      View::render("user/show", [
        "profile" => $profile,
        "history" => $contributions,
        "auth" => $this->session
      ]);
      return;
    }
    View::render("404");
  }

  public function setting(): void
  {
    $profile = $this->user->findByUsername($this->session['username']);
    View::render("user/setting", [
      "auth" => $this->session,
      "profile" => $profile
    ]);
  }

  public function updateProfile(): void
  {
    $userId = $this->session['id_user'];
    $this->update($userId, "profile");
  }

  public function profile(): void
  {
    $username = $this->session['username'];
    $level = $this->session['level'];

    if ($level !== "masyarakat") {
      $profile = $this->admin->findByUsername($username);
      $contributions = $this->auction->findAllByPetugasId($profile['id_petugas']);
    } else {
      $profile = $this->user->findByUsername($username);
      $contributions = $this->history->findAllBindingHistoryByUserId($profile['id_user']);
    }

    if (count($profile) > 0) {
      View::render("user/show", [
        "profile" => $profile,
        "history" => $contributions,
        "auth" => $this->session
      ]);
      return;
    }
    View::render("404");
  }
  
  public function update(string $userId, string $redirect = null): void
  {
    $mysqli = Database::getConnection();
    $mysqli->begin_transaction();
    try {
      $request = new Masyarakat();
      $request->id_user = htmlspecialchars($userId);
      $request->username = htmlspecialchars($_POST['username']);
      $request->telp = htmlspecialchars($_POST['telp']);
      $request->nama_lengkap = htmlspecialchars($_POST['name']);
      $this->user->updateByUserId($request);

      if ($redirect === "profile") {
        $profile = $this->user->findByUsername($this->session['username']);
        Auth::setSession($profile);
      }

      $mysqli->commit();
      Flasher::setFlasher("success", "Your request has been saved");
      View::redirect($redirect ?? "./user");
    } catch (Exception $th) {
      $mysqli->rollback();
      Flasher::setFlasher("danger", $th->getMessage());
      View::redirect($redirect ?? "./user");
    }
  }

  public function destroy(string $userId): void
  {
    $mysqli = Database::getConnection();
    $mysqli->begin_transaction();
    try {
      $this->user->deleteByUserId($userId);

      $mysqli->commit();
      Flasher::setFlasher("warning", "Your data has been deleted");
      View::redirect("./user");
    } catch (Exception $th) {
      $mysqli->rollback();
      Flasher::setFlasher("danger", $th->getMessage());
      View::redirect("./user");
    }
  }

  public function store(): void
  {
    $mysqli = Database::getConnection();
    $mysqli->begin_transaction();
    try {
      $request = new Masyarakat();
      $request->username = htmlspecialchars($_POST['username']);
      $request->telp = htmlspecialchars($_POST['telp']);
      $request->nama_lengkap = htmlspecialchars($_POST['name']);
      $request->password = htmlspecialchars($_POST['password']);      
      Auth::do_register($request);

      $mysqli->commit();
      Flasher::setFlasher("success", "Your data has been saved");
      View::redirect("./user");
    } catch (Exception $th) {
      $mysqli->rollback();
      Flasher::setFlasher("danger", $th->getMessage());
      View::redirect("./user");
    }
  }
}
