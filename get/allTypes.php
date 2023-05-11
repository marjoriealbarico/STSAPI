<?php
header("Access-Control-Allow-Origin: *");
$pdo = new PDO('mysql:host=localhost;dbname=sts_todolist', 'root', '');
$id_liste = isset($_GET['id_liste']) ? $_GET['id_liste'] : null;

$sql = 'SELECT * FROM type';

$prep = $pdo->prepare($sql);
$prep->execute();

$res = $prep->fetchAll(PDO::FETCH_ASSOC); // use PDO::FETCH_ASSOC to fetch only associative keys
echo json_encode($res);
