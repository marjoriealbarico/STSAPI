<?php
header("Access-Control-Allow-Origin: *");

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Connect to the database
        $pdo = new PDO('mysql:host=localhost;dbname=sts_todolist', 'root', '');
      
        // Set error mode to exceptions
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        // Get the POST data
        $ref_liste = $_POST['refListe'];
        $ref_type = $_POST['refType'];
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $niveau = $_POST['niveau'];
      
        // Insert the new list into the database
        $sql = 'INSERT INTO tache (nom, description, niveau, ref_liste, ref_type) 
        VALUES (:nom, :description, :niveau, :ref_liste, :ref_type);';
        $prep = $pdo->prepare($sql);
        $prep->bindParam(':ref_liste', $ref_liste);
        $prep->bindParam(':ref_type', $ref_type);
        $prep->bindParam(':nom', $nom);
        $prep->bindParam(':description', $description);
        $prep->bindParam(':niveau', $niveau);
        $prep->execute();
      
        // Return a success message
        http_response_code(200);
        //echo "Tache created successfully!";
        echo "1";
      } catch (PDOException $e) {
        // Return an error message
        http_response_code(500);
        echo "Database error: " . $e->getMessage();
      }      

} else {
    echo "Invalid";
}
