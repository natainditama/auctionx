<?php

namespace NataInditama\Auctionx\Models;

use NataInditama\Auctionx\App\Database;

class Masyarakat extends Database
{
  var $id;
  var $name;
  var $username;
  var $password;
  var $telp;

  public function findByUsername(string $username): ?Masyarakat
  {
    $query = "SELECT `id_user` AS `id`, `nama_lengkap` AS 'name', `username`, `password`, `telp` FROM `tb_masyarakat` WHERE `username` = ?";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("s", $username);
    $statement->execute();
    
    $result = $statement->get_result();
    if ($result) {
      return $result->fetch_object(Masyarakat::class);
    }
    return null;
  }
  
  public function findById(string $userId): ?Masyarakat
  {
    $query = "SELECT `id_user` AS `id`, `nama_lengkap` AS 'name', `username`, `password`, `telp` FROM `tb_masyarakat` WHERE `id_user` = ?";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("s", $username);
    $statement->execute();
    
    $result = $statement->get_result();
    if ($result) {
      return $result->fetch_object(Masyarakat::class);
    }
    return null;
  }
  
  public function save(Masyarakat $user): Masyarakat
  {
    $query = "INSERT INTO `tb_masyarakat`(`id_user`, `nama_lengkap`, `username`, `password`, `telp`) VALUES ('',?,?,?,?)";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("ssss", $user->name, $user->username, password_hash($user->password, PASSWORD_BCRYPT), $user->telp);
    $statement->execute();
    return $user;
  }

}
