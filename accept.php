<?php
require('connection.php');
$id=$_GET['idR'];
$req=$connexion->prepare("select * from randez where idR='$id'");
$req->execute();
$res=$req->fetchAll();
if (count($res) >= 1) {
    foreach($res as $v){
        $idP=$v['idP'];
        $idH=$v['idH'];
        $dateR=$v['dateR'];
        $idS=$v['idS'];
        $code=$v['code'];
        $req=$connexion->prepare("insert into accepted(idP,idH,dateR,idS,code)values('$idP','$idH','$dateR','$idS','$code')");
$req->execute();
$req=$connexion->prepare("delete from randez where idR='$id'");
$req->execute();
header('location:admin.php');
    }
}




?>