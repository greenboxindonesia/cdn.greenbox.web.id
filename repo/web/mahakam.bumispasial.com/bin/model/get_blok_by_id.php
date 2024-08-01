<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

define('__ROOT__', dirname(dirname(__FILE__)));

require_once(__ROOT__ . "/db/connect.php");

$db = new db_connect();
$conn = $db->connect();

$id_blok = $_POST['id'];

$stmt = $conn->prepare("SELECT * FROM blok WHERE id=?");
// $stmt->bindParam("s", $id_rhl);
$stmt->execute([$id_blok]);
$result = $stmt->fetch();

extract($result);

$data = [
    "id_blok" => $id,
    "no_blok" => $blok,
    "center_x" => $koord_center_x,
    "center_y" => $koord_center_y,
    "center_zoom" => $center_zoom
];

echo json_encode($data);
