<?php
include("data.php");
//Auslesen
$id_neu = $_POST["id_neu"];
//Bild
$pic_neu = $_FILES["pic_neu"]["name"];
$groesse = $_FILES["pic_neu"]["size"];
$typ = $_FILES["pic_neu"]["type"]; 
$tmp = $_FILES["pic_neu"]["tmp_name"];
$ziel = ORDNER_P.$pic_neu;
//

if( 
		($typ=="image/gif" || $typ =="image/png" || $typ=="image/jpeg" || $typ=="image/pjpeg" || $pic_neu=="")
		&&
		($groesse <= MAXSIZE) )
{
//Insert
$sql = "UPDATE rezept set
                    bild1 = '$pic_neu'
                where rid = '$id_neu'            
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