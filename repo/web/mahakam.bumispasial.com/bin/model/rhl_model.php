<?php

require_once("bin/db/connect.php");

class RhlModel
{

  function get_all_rhl()
  {
    $db = new db_connect();
    $conn = $db->connect();

    $q = "SELECT * FROM jenis_rhl ORDER BY urutan ASC";
    $result = $conn->query($q);

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public function get_kph_by_rhl($id_rhl)
  {
    $db = new db_connect();
    $conn = $db->connect();

    $q = "SELECT * FROM kph WHERE id_jenis_rhl=" . $id_rhl;
    $result = $conn->query($q);

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public function get_rhl_by_id($id)
  {
    $db = new db_connect();
    $conn = $db->connect();

    $q = "SELECT * FROM jenis_rhl WHERE id=?";
    $stmt = $conn->prepare($q);
    $stmt->execute([$id]);

    return $stmt->fetch();
  }

  public function get_all_kph_blok($id_rhl)
  {
    $db = new db_connect();
    $conn = $db->connect();

    $q = "SELECT kph.*, GROUP_CONCAT(CONCAT_WS(',',blok.id, blok.blok, blok.koord_center_x, blok.koord_center_y, blok.kph_id) ORDER BY blok.blok ASC SEPARATOR ':') AS list_blok
    FROM kph
    LEFT JOIN blok ON kph.id = blok.kph_id
    WHERE kph.id_jenis_rhl=?
    GROUP BY kph.id";

    $stmt = $conn->prepare($q);

    $stmt->execute([$id_rhl]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
