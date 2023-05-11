<?php
header("Access-Control-Allow-Origin: *");

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the POST data
    $nom = $_POST['nom'];
    $description = $_POST['description'];

    // Connect to the database
    $pdo = new PDO('mysql:host=localhost;dbname=sts_todolist', 'root', '');

    // Insert the new list into the database
    $sql = 'INSERT INTO liste (nom, description) VALUES (:nom, :description)';
    $prep = $pdo->prepare($sql);
    $prep->bindParam(':nom', $nom);
    $prep->bindParam(':description', $description);
    $prep->execute();

    // Return the ID of the new list
    //$id_liste = $pdo->lastInsertId();
    //echo $id_liste;

    echo "1";

} else {
    echo "Invalid request method";
}
