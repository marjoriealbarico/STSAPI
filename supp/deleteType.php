<?php
header("Access-Control-Allow-Origin: *");

$id_type = $_GET['idType'];

try {
    $pdo = new PDO('mysql:host=localhost;dbname=sts_todolist', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'DELETE FROM type WHERE id_type = :id_type';
    $prep = $pdo->prepare($sql);
    $prep->bindParam(':id_type', $id_type, PDO::PARAM_INT);
    $prep->execute();

    //echo "1";
    echo $id_type;
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
