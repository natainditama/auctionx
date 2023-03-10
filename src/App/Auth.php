<?php

namespace NataInditama\Auctionx\App;

use Exception;
use NataInditama\Auctionx\Models\LevelPetugas;
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

  public static function setSession(Petugas|Masyarakat $user): void
  {
    $level = "masyarakat";
    if ($user instanceof Petugas) {
      $role = new LevelPetugas();
      $level = $role->findByIdLevel($user->id_level)->level;
    }

    $auth = (array) $user;
    $auth["level"] = $level;
    $_SESSION['user'] = $auth;
  }

  public static function getSession(): ?array
  {
    return $_SESSION['user'] ?? null;
  }

  public static function removeSession(): void
  {
    $_SESSION['user'] = null;
    session_unset();
    session_destroy();
  }

  public static function isLogin(): bool
  {
    return (bool) Auth::getSession();
  }
}
