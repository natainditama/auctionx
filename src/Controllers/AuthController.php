<?php

namespace NataInditama\Auctionx\Controllers;

use Exception;
use NataInditama\Auctionx\App\Auth;
use NataInditama\Auctionx\App\Flasher;
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
            $level = htmlspecialchars($_POST['level']) ?? "masyarakat";
            $request = $level == "admin" ?  new Petugas() : new Masyarakat();
            $request->username = htmlspecialchars($_POST['username']);
            $request->password = htmlspecialchars($_POST['password']);

            $user = Auth::do_login($request);
            Auth::setSession($user);
            View::redirect("./");
        } catch (Exception $error) {
            Flasher::setFlasher("danger", $error->getMessage());
            View::redirect("./login");
        }
    }

    public function register(): void
    {
        View::render("auth/register");
    }

    public function postRegister(): void
    {
        try {
            $level = htmlspecialchars($_POST['level']) ?? "masyarakat";
            $request = $level == "admin" ?  new Petugas() : new Masyarakat();
            $request->username = htmlspecialchars($_POST['username']);
            $request->password = htmlspecialchars($_POST['password']);
            if ($request instanceof Petugas) {
                $request->id_level = "1"; // level admin
                $request->nama_petugas = htmlspecialchars($_POST['name']);
            } elseif ($request instanceof Masyarakat) {
                $request->telp = htmlspecialchars($_POST['telp']);
                $request->nama_lengkap = htmlspecialchars($_POST['name']);
            }

            Auth::do_register($request);
            $user = Auth::do_login($request);
            Auth::setSession($user);
            View::redirect("./");
        } catch (Exception $error) {
            Flasher::setFlasher("danger", $error->getMessage());
            View::redirect("./login");
        }
    }

    public function logout(): void
    {
        Auth::removeSession();
        View::redirect('./');
    }

    public function adminRegister(): void
    {
        View::render("auth/admin/register");
    }

    public function adminLogin(): void
    {
        View::render("auth/admin/login");
    }
}
