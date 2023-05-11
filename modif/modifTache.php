<?php
header("Access-Control-Allow-Origin: *");

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the POST data
    $idTache = $_POST['idTache'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $niveau = $_POST['niveau'];

    // Connect to the database
    $pdo = new PDO('mysql:host=localhost;dbname=sts_todolist', 'root', '');

    // Update the name and description of the list in the database
    $sql = 'UPDATE tache SET nom = :nom, description = :description, niveau = :niveau WHERE id_Tache = :idTache';
    $prep = $pdo->prepare($sql);
    $prep->bindParam(':nom', $nom);
    $prep->bindParam(':description', $description);
    $prep->bindParam(':niveau', $niveau);
    $prep->bindParam(':idTache', $idTache);
    $prep->execute();

    //echo "Tache modified successfully! ";
    echo "1";

} else {
    echo "Invalid request method";
}
