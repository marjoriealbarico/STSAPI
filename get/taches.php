<?php
header("Access-Control-Allow-Origin: *");
$pdo = new PDO('mysql:host=localhost;dbname=sts_todolist', 'root', '');

$sql = 'SELECT * FROM tache ';
$params = array();

$prep = $pdo->prepare($sql);
$prep->execute($params);
$res = $prep->fetchAll(PDO::FETCH_ASSOC); // use PDO::FETCH_ASSOC to fetch only associative keys
echo json_encode($res);
