<?php
session_start();
header("Content-Type: text/html; charset=utf-8");
if(!isset($_SESSION["bname"]))
{
echo "<a href='../index.php'>Nur für Administratoren, zurück zur Startseite</a>";
session_destroy();
exit();
} 
?>
<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8" />
<title>Kochbuch - Bild einfügen</title>
<!--Mobile-->
<meta name="viewport" content="width=device-width, 
   initial-scale=1.0, 
   maximum-scale=1.0, 
   user-scalable=no">
<link href='http://fonts.googleapis.com/css?family=Amatic+SC' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Cabin+Sketch:400,700' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Sunshiney' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="../style.css" />
<link rel="stylesheet" type="text/css" href="../css/respo.css" media="screen" />
</head>
<body>
<div id="wrapper">
    <div id="insertCont">
        <h1>Bild einfügen:</h1>
        <?php
        include("data.php");
        //Abfrage
        $id_bea2 = $_GET["id_bea2"];
        $sql = "select * from rezept where rid = $id_bea2";
        $query = mysqli_query($con,$sql) or die("kein select");
        $daten = mysqli_fetch_array($query);
        
        if (empty($daten["bild1"]))
        {
            //Formular wenn leer
            echo "<form class='reframe' enctype='multipart/form-data' action='admin.php' method='post'>";
            echo "<input type='hidden' value='".$daten["rid"]."' name='id_neu' </></p>";
            echo "<p>Bild: <input type='file' name='pic_neu' /></p>";
            echo "<p> <input type='submit' value='Einfügen' /> </p>";
            echo "</form>";
        }
        else
        {
            //Formular wenn Bild vorhanden
            echo "<form class='reframe' enctype='multipart/form-data' action='admin.php' method='post'>";
            echo "<input type='hidden' value='".$daten["rid"]."' name='id_change' </></p>";
            echo "<img src='".ORDNER_P.$daten["bild1"]."' alt='Bild ".$daten["titel"]."'/>";
            echo "<p>Bild: <input type='file' name='pic_change' /></p>";
        
        echo "<p> <input type='submit' value='Ändern' /> </p>";
        echo "</form>";
        }
        
        
        ?>
</div>
<?php
            if(isset($_GET["upload"]))
            {
            echo $_GET["upload"];
            }
        ?> 
</div><!--ende wrapper-->
</body>