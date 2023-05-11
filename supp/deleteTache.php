<?php
header("Access-Control-Allow-Origin: *");

$id_tache = $_GET['idTache'];

try {
    $pdo = new PDO('mysql:host=localhost;dbname=sts_todolist', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'DELETE FROM tache WHERE id_tache = :id_tache';
    $prep = $pdo->prepare($sql);
    $prep->bindParam(':id_tache', $id_tache, PDO::PARAM_INT);
    $prep->execute();

    //echo "id:".$id_tache;
    echo "1";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
