<?php

namespace NataInditama\Auctionx\Models;

use NataInditama\Auctionx\App\Database;

class Petugas extends Database
{
  var int $id_petugas;
  var string $nama_petugas;
  var string $username;
  var string $password;
  var int $id_level;

  public function findByUsername(string $username): ?array
  {
    $query = "SELECT `id_petugas`, `nama_petugas`, `username`, `password`, `id_level` FROM `tb_petugas` WHERE `username` =  ?";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("s", $username);
    $statement->execute();

    $result = $statement->get_result();
    return $result->fetch_assoc();
  }

  public function save(Petugas $request): void
  {
    $query = "INSERT INTO `tb_petugas`(`nama_petugas`, `username`, `password`, `id_level`) VALUES (?,?,?,?)";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("sssi", $request->nama_petugas, $request->username, password_hash($request->password, PASSWORD_BCRYPT), $request->id_level);
    $statement->execute();
  }
}
