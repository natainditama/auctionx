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
            $level = $_POST['level'] ?? "masyarakat";
            $request = $level == "admin" ?  new Petugas() : new Masyarakat();
            $request->username = $_POST['username'];
            $request->password = $_POST['password'];

            $user = Auth::do_login($request);
            Auth::setSession($user);
            View::redirect("./login");
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
            $request->username = $_POST['username'];
            $request->password = $_POST['password'];
            if ($request instanceof Petugas) {
                $request->id_level = "1"; // level admin
                $request->nama_petugas = $_POST['name'];
            }  elseif ($request instanceof Masyarakat) {
                $request->telp = $_POST['telp'];
                $request->nama_lengkap = $_POST['name'];
            }

            Auth::do_register($request);
            Auth::setSession($request);
            View::redirect("./");
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

    public function adminLogin(): void
    {
        View::render("admin/login");
    }
}
