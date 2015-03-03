<?php
include("data.php");
$id = $_POST["id"];
$tt = $_POST["tt"];		
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
$sql = "UPDATE rezept set 
                        titel = '$tt',
                        Zut_tier1 = '$Ztier1',
                        Zut_tier2 = '$Ztier2',
                        Zut_tier3 = '$Ztier3',
                        Zut_tier4 = '$Ztier4',
                        Zut_gem1 = '$Zgem1',
                        Zut_gem2 = '$Zgem2',
                        Zut_gem3 = '$Zgem3',
                        Zut_gem4 = '$Zgem4',
                        Zut_gew1 = '$Zgew1',
                        Zut_gew2 = '$Zgew2',
                        Zut_gew3 = '$Zgew3',
                        Zut_gew4 = '$Zgew4',
                        Zut_nahr1 = '$Znahr1',
                        Zut_nahr2 = '$Znahr2',
                        Zut_nahr3 = '$Znahr3',
                        Zut_nahr4 = '$Znahr4',
                        time = '$Ztime',
                        Schritt1 = '$s1',
                        Schritt2 = '$s2',
                        Schritt3 = '$s3',
                        Schritt4 = '$s4',
                        Schritt5 = '$s5',
                        Schritt6 = '$s6',
                        Schritt7 = '$s7',
                        Schritt8 = '$s8',
                        Schritt9 = '$s9',
                        Schritt10 = '$s10',
                        Schritt11 = '$s11',
                        Schritt12 = '$s12',
                        Schritt13 = '$s13',
                        Schritt14 = '$s14',
                        Schritt15 = '$s15',
                        Schritt16 = '$s16',
                        Schritt17 = '$s17',
                        Schritt18 = '$s18',
                        Schritt19 = '$s19',
                        Schritt20 = '$s20'
                        
                        where rid ='$id'
                        
                        ";

                        
    
mysqli_query($con,$sql) or die("kein update möglich");
		
header("Location: admin.php?insert=update erfolgreich");


 exit();
?>