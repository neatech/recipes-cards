<?php
include("data.php");
//Auslesen
$id_change = $_POST["id_change"];
//Bild
$pic_change = $_FILES["pic_change"]["name"];
$groesse = $_FILES["pic_change"]["size"];
$typ = $_FILES["pic_change"]["type"]; 
$tmp = $_FILES["pic_change"]["tmp_name"];
$ziel = ORDNER_P.$pic_change;
//

if( 
		($typ=="image/gif" || $typ =="image/png" || $typ=="image/jpeg" || $typ=="image/pjpeg")
		&&
		($groesse <= MAXSIZE) )
{
//Insert
$sql = "UPDATE rezept set
                    bild1 = '$pic_change'
                where rid = '$id_change'            
";
mysqli_query($con,$sql) or die("kein insert");
move_uploaded_file($tmp,$ziel);
header("Location: admin.php?insert=Datensatz einfügen erfolgreich");
}
else
{
	header("Location: bild_neu.php?meldung=Datei nicht ok");
}
?>