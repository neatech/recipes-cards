<?php
include("data.php");
$id_del = $_GET["id_del"]; 
$sql = "delete from rezept where rid='$id_del'";
//Abfrage ausführen 
mysqli_query($con,$sql) or die("kein delete");
//Weiterleitung zum Admin
header("Location: admin.php");
?>