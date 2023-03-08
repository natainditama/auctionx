<?php 

namespace NataInditama\Auctionx\Models;

use NataInditama\Auctionx\App\Database;

class Lelang extends Database
{
  var int $id_lelang;
  var int $id_barang;
  var string $tgl_dibuka;
  var string $tgl_ditutup;
  var int $harga_akhir;
  var int $id_user;
  var int $id_petugas;
  var string $status;

  public function findAll(): ?array
  {
    $query = "SELECT `id_lelang`, `tb_lelang`.`id_barang`, `tgl_dibuka`, `tgl_ditutup`, `harga_akhir`, `id_user`, `tb_lelang`.`id_petugas`, `status`, `nama_barang`, `harga_awal`, `deskripsi_barang`, `tb_petugas`.`nama_petugas`, `tb_petugas`.`username` FROM `tb_lelang` INNER JOIN `tb_barang` ON `tb_lelang`.`id_barang` = `tb_barang`.`id_barang` INNER JOIN `tb_petugas` ON `tb_lelang`.`id_petugas` = `tb_petugas`.`id_petugas`";
    $statement = $this->mysqli->prepare($query);
    $statement->execute();

    $result = $statement->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function findAllByStatus(string $status): ?array
  {
    $query = "SELECT `id_lelang`, `tb_lelang`.`id_barang`, `tgl_dibuka`, `tgl_ditutup`, `harga_akhir`, `id_user`, `tb_lelang`.`id_petugas`, `status`, `nama_barang`, `harga_awal`, `deskripsi_barang`, `tb_petugas`.`nama_petugas`, `tb_petugas`.`username` FROM `tb_lelang` INNER JOIN `tb_barang` ON `tb_lelang`.`id_barang` = `tb_barang`.`id_barang` INNER JOIN `tb_petugas` ON `tb_lelang`.`id_petugas` = `tb_petugas`.`id_petugas` WHERE `status` = ?";
    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("s", $status);
    $statement->execute();

    $result = $statement->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function findByBarangId(string $barangId): ?array
  {
    $query = "SELECT `id_lelang`, `tb_lelang`.`id_barang`, `tgl_dibuka`, `tgl_ditutup`, `harga_akhir`, `id_user`, `tb_lelang`.`id_petugas`, `status`, `nama_barang`, `harga_awal`, `deskripsi_barang`, `tb_petugas`.`nama_petugas`, `tb_petugas`.`username` FROM `tb_lelang` INNER JOIN `tb_barang` ON `tb_lelang`.`id_barang` = `tb_barang`.`id_barang` INNER JOIN `tb_petugas` ON `tb_lelang`.`id_petugas` = `tb_petugas`.`id_petugas` WHERE `tb_lelang`.`id_barang` = ?";
    $statement = $this->mysqli->prepare($query);
    $statement->bind_param('s', $barangId);
    $statement->execute();

    $result = $statement->get_result();
    return $result->fetch_assoc();
  }
}