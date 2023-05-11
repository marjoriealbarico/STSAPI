<?php
header("Access-Control-Allow-Origin: *");
$pdo = new PDO('mysql:host=localhost;dbname=sts_todolist', 'root', '');
$id_liste = isset($_GET['id_liste']) ? $_GET['id_liste'] : null;
$sql = 'SELECT l.description AS liste_description, l.nom as liste_nom, l.id_liste, t.*, tp.nom AS type_nom, tp.couleur AS type_couleur, tp.ref_type_parent as type_refparent
        FROM liste l 
        LEFT JOIN tache t ON t.ref_liste = l.id_liste 
        LEFT JOIN type tp ON t.ref_type = tp.id_type
          ';
/*$sql = 'SELECT * FROM type';*/

$prep = $pdo->prepare($sql);
$prep->execute();

$res = $prep->fetchAll(PDO::FETCH_ASSOC); // use PDO::FETCH_ASSOC to fetch only associative keys
echo json_encode($res);
