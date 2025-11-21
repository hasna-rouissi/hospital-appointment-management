<?php

require('connection.php');


if(isset($_GET['city_id'])) {
  
    $cityId = $_GET['city_id'];

    $req = $connexion->prepare("SELECT * FROM hospital WHERE idC = ?");
    $req->execute([$cityId]);
    
   
    $hospitals = $req->fetchAll(PDO::FETCH_ASSOC);
    
  
    echo json_encode($hospitals);
} else {
   
    echo json_encode([]);
}
?>
