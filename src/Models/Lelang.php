<?php 

namespace NataInditama\Auctionx\Models;

use NataInditama\Auctionx\App\Database;

class Lelang extends Database
{
  var $id_lelang;
  var $id_barang;
  var $tgl_dibuka;
  var $tgl_ditutup;
  var $harga_akhir;
  var $id_user;
  var $id_petugas;
  var $status;

  public function findAll(): ?array
  {
    $query = "SELECT `id_lelang`, `tb_lelang`.`id_barang`, `tgl_dibuka`, `tgl_ditutup`, `harga_akhir`, `id_user`, `tb_lelang`.`id_petugas`, `status`, `nama_barang`, `harga_awal`, `deskripsi_barang`, `tb_petugas`.`nama_petugas`, `tb_petugas`.`username` FROM `tb_lelang` INNER JOIN `tb_barang` ON `tb_lelang`.`id_barang` = `tb_barang`.`id_barang` INNER JOIN `tb_petugas` ON `tb_lelang`.`id_petugas` = `tb_petugas`.`id_petugas`;";
    $result = $this->mysqli->query($query);
    if ($result->num_rows) {
      while ($row = $result->fetch_assoc()) {
        $array[] = $row;
      }
      return $array;
    }
    return null;

  }

  public function findByBarangId(string $barangId): ?array
  {
    $query = "SELECT `id_lelang`, `tb_lelang`.`id_barang`, `tgl_dibuka`, `tgl_ditutup`, `harga_akhir`, `id_user`, `tb_lelang`.`id_petugas`, `status`, `nama_barang`, `harga_awal`, `deskripsi_barang`, `tb_petugas`.`nama_petugas`, `tb_petugas`.`username` FROM `tb_lelang` INNER JOIN `tb_barang` ON `tb_lelang`.`id_barang` = `tb_barang`.`id_barang` INNER JOIN `tb_petugas` ON `tb_lelang`.`id_petugas` = `tb_petugas`.`id_petugas` WHERE `tb_lelang`.`id_barang` = ?";
    $statement = $this->mysqli->prepare($query);
    $statement->bind_param('s', $barangId);
    $statement->execute();

    $result = $statement->get_result();
    if ($result) {
      return $result->fetch_assoc();
    }
    return null;
  }
}