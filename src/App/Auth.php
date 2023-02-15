<?php 

namespace NataInditama\Auctionx\App;

use Exception;
use NataInditama\Auctionx\Models\Masyarakat;
use NataInditama\Auctionx\Models\Petugas;

class Auth
{
  public static function do_login(Masyarakat|Petugas $request): Masyarakat|Petugas
  {
    try {
      $user = $request->findByUsername($request->username);
      if (is_null($user)) {
        throw new Exception("Invalid username");
      }
      if (!password_verify($request->password, $user->password)) {
        throw new Exception("Invalid username or password");
      }
      return $user;
    } catch (Exception $exception) {
      throw $exception;
    }
  }

  public static function do_register(Masyarakat|Petugas $request): void
  {
    try {
      $user = $request->findByUsername($request->username);
      if (isset($user)) {
        throw new Exception("Username already exists");
      }
      $request->save($request);
    } catch (Exception $exception) {
      throw $exception;
    }
  }

  public static function setSession(Masyarakat|Petugas $user): void
  {
    $auth = [
      "username" => $user->username,
      "id" => $user->id,
      "level" => $user instanceof Petugas ? $user?->findLevelById($user?->id_level) : "masyarakat",
    ];
    $_SESSION['user'] = $auth;
  }

  public static function getSession(): ?array
  {
    $auth = $_SESSION['user'] ?? null;
    return $auth;
  }

  public static function removeSession(): void
  {
    $_SESSION['user'] = null;
    session_unset();
    session_destroy();
  }

  public static function isLogin(): bool
  {
    $isLogin = (bool) Auth::getSession();
    return $isLogin;
  }
}