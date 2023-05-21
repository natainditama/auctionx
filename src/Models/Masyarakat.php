<?php

namespace NataInditama\Auctionx\Models;

use Exception;
use NataInditama\Auctionx\App\Database;

class Masyarakat extends Database
{
  var int $id_user;
  var string $nama_lengkap;
  var string $username;
  var string $password;
  var string $telp;

  public function findByUsername(string $username): ?array
  {
    $query = "SELECT `id_user`, `nama_lengkap`, `username`, `password`, `telp` FROM `tb_masyarakat` WHERE `username` =  ?";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("s", $username);
    $statement->execute();

    $result = $statement->get_result();
    return $result->fetch_assoc();
  }

  public function save(Masyarakat $request): void
  {
    $query = "INSERT INTO `tb_masyarakat`(`nama_lengkap`, `username`, `password`, `telp`) VALUES (?,?,?,?)";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("ssss", $request->nama_lengkap, $request->username, password_hash($request->password, PASSWORD_BCRYPT), $request->telp);
    $statement->execute();
  }

  public function findAll(): ?array
  {
    $query = "SELECT `id_user`, `nama_lengkap`, `username`, `password`, `telp` FROM `tb_masyarakat` ORDER BY `id_user` DESC;";

    $statement = $this->mysqli->prepare($query);
    $statement->execute();

    $result = $statement->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function updateByUserId(Masyarakat $data): void
  {
    $query = "UPDATE `tb_masyarakat` SET `nama_lengkap`=?,`username`=?,`telp`=? WHERE `id_user`=?";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("sssi", $data->nama_lengkap, $data->username, $data->telp, $data->id_user);
    $statement->execute();
  }

  public function deleteByUserId(string $userId): void
  {
    $query = "DELETE FROM `tb_masyarakat` WHERE `id_user`=?";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param('i', $userId);
    $statement->execute();
  }
}
