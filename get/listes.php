<?php
 header("Access-Control-Allow-Origin: *");

$pdo = new PDO('mysql:host=localhost;dbname=sts_todolist', 'root', '');

$sql = 'select * from liste';
$prep = $pdo->prepare($sql);
$prep->execute();
$res=$prep->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($res);