<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

define('__ROOT__', dirname(dirname(__FILE__)));

require_once(__ROOT__ . "/db/connect.php");

$db = new db_connect();
$conn = $db->connect();

$id = $_GET['jenis_rhl'];

$q = "SELECT kph.*, GROUP_CONCAT(CONCAT_WS(',',blok.blok, blok.koord_center_x, blok.koord_center_y, blok.kph_id) ORDER BY blok.blok ASC SEPARATOR ':') AS list_blok
    FROM kph
    LEFT JOIN blok ON kph.id = blok.kph_id
    GROUP BY kph.id
    WHERE kph.id_jenis_rhl=?";
// $stmt = $conn->prepare("SELECT * FROM kph WHERE id=?");
$stmt = $conn->prepare($q);
// $stmt->bindParam("s", $id_rhl);
$stmt->execute([$id]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$all_data = array();

while ($result) {
    extract($result);

    $data = [
        "kph" => $kph,
        "center_x" => $center_x,
        "center_y" => $center_y,
        "center_zoom" => $center_zoom,
        "list_blok" => $list_blok
    ];

    array_push($all_data, $data);
}

echo json_encode($all_data);
