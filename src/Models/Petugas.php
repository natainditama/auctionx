<?php 

namespace NataInditama\Auctionx\Models;

use NataInditama\Auctionx\App\Database;

class Petugas extends Database
{
  var $id; 
  var $name;
  var $username;
  var $password;
  var $telp;
  var ?string $id_level;

  public function findByUsername(string $username): ?Petugas
  {
    $query = "SELECT `id_petugas` AS `id`, `nama_petugas` AS `name`, `username`, `password`, `telp`, `id_level` FROM `tb_petugas` WHERE `username` = ?";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("s", $username);
    $statement->execute();

    $result = $statement->get_result();
    if ($result) {
      return $result->fetch_object(Petugas::class);
    }
    return null;
  }
  
  public function findById(string $petugasId): ?Petugas
  {
    $query = "SELECT `id_petugas` AS `id`, `nama_petugas` AS `name`, `username`, `password`, `telp`, `id_level` FROM `tb_petugas` WHERE `id_petugas` = ?";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("s", $petugasId);
    $statement->execute();

    $result = $statement->get_result();
    if ($result) {
      return $result->fetch_object(Petugas::class);
    }
    return null;
  }

  public function save(Petugas $user): Petugas
  {
    $query = "INSERT INTO `tb_petugas`(`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `id_level`) VALUES ('',?,?,?,?,?)";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("sssss", $user->name, $user->username, password_hash($user->password, PASSWORD_BCRYPT), $user->telp, $user->id_level);
    $statement->execute();
    return $user;
  }
  
  public function findLevelById(string $id): string
  {
    $query = "SELECT `level` FROM `tb_level` WHERE `id_level` = ?";
    $statement = $this->mysqli->prepare($query);
    $statement->bind_param('s', $id);
    $statement->execute();

    $result = $statement->get_result();
    if ($result) {
      return $result->fetch_assoc()['level'];
    }
    return "masyarakat";

  }

}