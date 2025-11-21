<?php
require('connection.php');
$id=$_GET['id'];

$req=$connexion->prepare("delete from randez where idR='$id'");
$req->execute();
header('location:admin.php');
?>