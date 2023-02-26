<?php

namespace NataInditama\Auctionx\Models;

use NataInditama\Auctionx\App\Database;

class Masyarakat extends Database
{
  var int $id_user;
  var string $nama_lengkap;
  var string $username;
  var string $password;
  var string $telp;

  public function findByUsername(string $username): ?Masyarakat
  {
    $query = "SELECT `id_user`, `nama_lengkap`, `username`, `password`, `telp` FROM `tb_masyarakat` WHERE `username` =  ?";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("s", $username);
    $statement->execute();

    $result = $statement->get_result();
    return $result->fetch_object(Masyarakat::class);
  }

  public function save(Masyarakat $request): void
  {
    $query = "INSERT INTO `tb_masyarakat`(`id_user`, `nama_lengkap`, `username`, `password`, `telp`) VALUES ('',?,?,?,?)";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("ssss", $request->nama_lengkap, $request->username, password_hash($request->password, PASSWORD_BCRYPT), $request->telp);
    $statement->execute();
  }
}
