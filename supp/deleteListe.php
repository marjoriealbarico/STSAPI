<?php
header("Access-Control-Allow-Origin: *");

$id_liste = $_GET['idListe'];

try {
    $pdo = new PDO('mysql:host=localhost;dbname=sts_todolist', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'DELETE FROM liste WHERE id_liste = :id_liste';
    $prep = $pdo->prepare($sql);
    $prep->bindParam(':id_liste', $id_liste, PDO::PARAM_INT);
    $prep->execute();

    echo $id_liste;
    //echo "1";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
