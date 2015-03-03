<?php
include("data.php");
//Auslesen
$tt = $_POST["tt"];
//Bild
$bild = $_FILES["pic"]["name"];
$groesse = $_FILES["pic"]["size"];
$typ = $_FILES["pic"]["type"]; 
$tmp = $_FILES["pic"]["tmp_name"];
$ziel = ORDNER_P.$bild;
//
$Ztier1 = $_POST["Ztier1"];
$Ztier2 = $_POST["Ztier2"];
$Ztier3 = $_POST["Ztier3"];
$Ztier4 = $_POST["Ztier4"];
$Zgem1 = $_POST["Zgem1"];
$Zgem2 = $_POST["Zgem2"];
$Zgem3 = $_POST["Zgem3"];
$Zgem4 = $_POST["Zgem4"];
$Zgew1 = $_POST["Zgew1"];
$Zgew2 = $_POST["Zgew2"];
$Zgew3 = $_POST["Zgew3"];
$Zgew4 = $_POST["Zgew4"];
$Znahr1 = $_POST["Znahr1"];
$Znahr2 = $_POST["Znahr2"];
$Znahr3 = $_POST["Znahr3"];
$Znahr4 = $_POST["Znahr4"];
$Ztime = $_POST["Ztime"];
$s1 = $_POST["s1"];
$s2 = $_POST["s2"];
$s3 = $_POST["s3"];
$s4 = $_POST["s4"];
$s5 = $_POST["s5"];
$s6 = $_POST["s6"];
$s7 = $_POST["s7"];
$s8 = $_POST["s8"];
$s9 = $_POST["s9"];
$s10 = $_POST["s10"];
$s11 = $_POST["s11"];
$s12 = $_POST["s12"];
$s13 = $_POST["s13"];
$s14 = $_POST["s14"];
$s15 = $_POST["s15"];
$s16 = $_POST["s16"];
$s17 = $_POST["s17"];
$s18 = $_POST["s18"];
$s19 = $_POST["s19"];
$s20 = $_POST["s20"];

//Muster
if( 
		($typ=="image/gif" || $typ =="image/png" || $typ=="image/jpeg" || $typ=="image/pjpeg" || $bild=="")
		&&
		($groesse <= MAXSIZE) )
{
//Insert
$sql = "INSERT INTO rezept(titel,bild1,Zut_tier1,Zut_tier2,Zut_tier3,Zut_tier4,Zut_gem1,Zut_gem2,Zut_gem3,Zut_gem4,Zut_gew1,Zut_gew2,Zut_gew3,Zut_gew4,Zut_nahr1,Zut_nahr2,Zut_nahr3,Zut_nahr4,time,Schritt1,Schritt2,Schritt3,Schritt4,Schritt5,Schritt6,Schritt7,Schritt8,Schritt9,Schritt10,Schritt11,Schritt12,Schritt13,Schritt14,Schritt15,Schritt16,Schritt17,Schritt18,Schritt19,Schritt20)
                   VALUES('$tt','$bild','$Ztier1','$Ztier2','$Ztier3','$Ztier4','$Zgem1','$Zgem2','$Zgem3','$Zgem4','$Zgew1','$Zgew2','$Zgew3','$Zgew4','$Znahr1','$Znahr2','$Znahr3','$Znahr4','$Ztime','$s1','$s2','$s3','$s4','$s5','$s6','$s7','$s8','$s9','$s10','$s11','$s12','$s13','$s14','$s15','$s16','$s17','$s18','$s19','$s20')
                   
";
mysqli_query($con,$sql) or die("kein insert");
move_uploaded_file($tmp,$ziel);
header("Location: admin.php?insert=Datensatz einfügen erfolgreich");
}
else
{
	header("Location: rezept_neu.php?meldung=Datei nicht ok");
}
?>