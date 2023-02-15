<?php 

namespace NataInditama\Auctionx\Controllers;

use Exception;
use NataInditama\Auctionx\App\Auth;
use NataInditama\Auctionx\App\View;
use NataInditama\Auctionx\Models\Masyarakat;
use NataInditama\Auctionx\Models\Petugas;

class AuthController
{
  public function login(): void
  {
    View::render("auth/login");
  }

  public function postLogin(): void
  {
    try {
      $request = new Petugas();
      $request->username = $_POST['username'];
      $request->password = $_POST['password'];
      $admin = $request->findByUsername($request->username);
      if(is_null($admin)){
        $request = new Masyarakat();
        $request->username = $_POST['username'];
        $request->password = $_POST['password'];
      }
      
      $user = Auth::do_login($request);
      Auth::setSession($user);
      View::redirect("./dashboard");
    } catch (Exception $error) {      
      View::render("auth/login", [
        "alert" => [
          "type" => "danger",
          "message" => $error->getMessage(),
          ]
        ]);
    } 
  }

  public function register(): void
  {
    View::render("auth/register");
  }

  public function postRegister(): void
  {    
    try {
      $level = $_POST['level'] ?? "masyarakat";
      $request = $level == "admin" ?  new Petugas() : new Masyarakat();
      $request->name = $_POST['name'];
      $request->telp = $_POST['telp'];
      $request->username = $_POST['username'];
      $request->password = $_POST['password'];
      if ($request instanceof Petugas) {
        $request->id_level = "1"; // level admin
      }

      Auth::do_register($request);
      Auth::setSession($request);
      View::redirect("./dashboard");
    } catch (Exception $error) {
      View::render("auth/register", [
        "alert" => [
          "type" => "danger",
          "message" => $error->getMessage(),
        ]
      ]);

    }
  }

  public function logout(): void
  {
    Auth::removeSession();
    View::redirect('./login');
  }

  public function adminRegister(): void
  {
    View::render("admin/register");
  }

}