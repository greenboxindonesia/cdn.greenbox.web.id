<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

define('__ROOT__', dirname(dirname(__FILE__)));

require_once(__ROOT__ . "/db/connect.php");

$db = new db_connect();
$conn = $db->connect();

$id_rhl = $_POST['id_rhl'];

$stmt = $conn->prepare("SELECT * FROM jenis_rhl WHERE id=?");
// $stmt->bindParam("s", $id_rhl);
$stmt->execute([$id_rhl]);
$result = $stmt->fetch();

echo json_encode($result);
