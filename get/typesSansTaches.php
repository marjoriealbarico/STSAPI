<?php
 header("Access-Control-Allow-Origin: *");

$pdo = new PDO('mysql:host=localhost;dbname=sts_todolist', 'root', '');

$sql = 'SELECT * FROM Type WHERE type.id_type NOT IN (SELECT tache.ref_type FROM Tache)';
$prep = $pdo->prepare($sql);
$prep->execute();
$res=$prep->fetchAll();
echo json_encode($res);