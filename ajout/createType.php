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
        $nom = $_POST['nom'];
        $couleur = $_POST['couleur'];
        $ref_type_parent = $_POST['ref_type_parent'];
      
        // Insert the new list into the database
        $sql = 'INSERT INTO type (nom, couleur, ref_type_parent) VALUES (:nom, :couleur, :ref_type_parent)';
        $prep = $pdo->prepare($sql);
        $prep->bindParam(':nom', $nom);
        $prep->bindParam(':couleur', $couleur);
        $prep->bindParam(':ref_type_parent', $ref_type_parent);
        $prep->execute();
      
        // Return a success message
        http_response_code(200);
        //echo "Type created successfully!";
        echo "1";
      } catch (PDOException $e) {
        // Return an error message
        http_response_code(500);
        echo "Database error: " . $e->getMessage();
        
      }      

} else {
    echo "Invalid";
}
