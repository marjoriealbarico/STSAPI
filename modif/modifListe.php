<?php
header("Access-Control-Allow-Origin: *");

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the POST data
    $idListe = $_POST['idListe'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];

    // Connect to the database
    $pdo = new PDO('mysql:host=localhost;dbname=sts_todolist', 'root', '');

    // Update the name and description of the list in the database
    $sql = 'UPDATE liste SET nom = :nom, description = :description WHERE id_liste = :idListe';
    $prep = $pdo->prepare($sql);
    $prep->bindParam(':nom', $nom);
    $prep->bindParam(':description', $description);
    $prep->bindParam(':idListe', $idListe);
    $prep->execute();

    // Return the ID of the new list
    //$id_liste = $pdo->lastInsertId();
    //echo $id_liste;
    echo "1";
} else {
    echo "Invalid request method";
}
