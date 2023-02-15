<?php

namespace NataInditama\Auctionx\Models;

use NataInditama\Auctionx\App\Database;

class HistoryLelang extends Database
{
  var $id_history;
  var $id_lelang;
  var $id_barang;
  var $id_user;
  var $penawaran_harga;

  public function save(HistoryLelang $request): ?HistoryLelang
  {
    $query = "INSERT INTO `history_lelang`(`id_history`, `id_lelang`, `id_barang`, `id_user`, `penawaran_harga`) VALUES ('',?,?,?,?)";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("ssss", $request->id_lelang, $request->id_barang, $request->id_user, $request->penawaran_harga);
    $statement->execute();

    return $request;
  }

  public function findByIdLelang(string $lelangId): ?array
  {
    $query = "SELECT `id_history`, `id_lelang`, `id_barang`, `history_lelang`.`id_user`, `penawaran_harga`, `nama_lengkap`, `username` FROM `history_lelang` JOIN `tb_masyarakat` ON `history_lelang`.`id_user` = `tb_masyarakat`.`id_user` WHERE `id_lelang` = ? GROUP BY `tb_masyarakat`.`id_user` ORDER BY `penawaran_harga` DESC;";
    $query = "SELECT DISTINCT p1.*, p2.*, `tb_masyarakat`.* FROM `history_lelang` p1 INNER JOIN( SELECT DISTINCT `id_user`, MAX(`penawaran_harga`) harga FROM `history_lelang` WHERE `id_lelang` = ? GROUP BY `id_user` ORDER BY `penawaran_harga` DESC ) p2 ON `p1`.`id_user` = p2.`id_user` INNER JOIN `tb_masyarakat` ON p1.id_user = `tb_masyarakat`.`id_user` WHERE p1.`id_lelang` = ? AND `p1`.`penawaran_harga` = p2.harga ORDER BY `p1`.`penawaran_harga` DESC;";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("ss", $lelangId, $lelangId);
    $statement->execute();
    $result = $statement->get_result();
    if ($result) {
      $array = [];
      while ($row = $result->fetch_assoc()) {
        $array[] = $row;
      }
      return $array;
    }
    return null;
  }
}
