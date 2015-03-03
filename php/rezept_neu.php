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
<title>Kochbuch - Rezept einfügen</title>
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
<div id="wrapper" class="reframe">
    <div id="insertCont" class="reframe">
        <h1>Datensätze einfügen:</h1>
        <?php
            if(isset($_GET["meldung"]))
            {
            echo $_GET["meldung"];
            }
        ?> 
        <form class="reframe" enctype="multipart/form-data" action="insert.php" method="post">
            <p><span>Titel*: </span><input type="text" name="tt" /></p>
            <p>Bild: <input type="file" name="pic" /></p>
            <h3>Zutaten und Menge eingeben:</h3>
            <div class="tier">
                <h4>Tierische Produkte:</h4>
                <p><span>Zutat 1 tierisch</span><input type="text" name="Ztier1" /></p>
                <p><span>Zutat 2 tierisch</span><input type="text" name="Ztier2" /></p>
                <p><span>Zutat 3 tierisch</span><input type="text" name="Ztier3" /></p>
                <p><span>Zutat 4 tierisch</span><input type="text" name="Ztier4" /></p>
            </div>
            <div class="gemuese">
                <h4>Gemüse:</h4>
                <p><span>Zutat 1 Gemüse</span><input type="text" name="Zgem1" /></p>
                <p><span>Zutat 2 Gemüse</span><input type="text" name="Zgem2" /></p>
                <p><span>Zutat 3 Gemüse</span><input type="text" name="Zgem3" /></p>
                <p><span>Zutat 4 Gemüse</span><input type="text" name="Zgem4" /></p>
            </div>
            <div class="gewuerze">
                <h4>Gewürze:</h4>
                <p><span>Zutat 1 Gewürz</span><input type="text" name="Zgew1" /></p>
                <p><span>Zutat 2 Gewürz</span><input type="text" name="Zgew2" /></p>
                <p><span>Zutat 3 Gewürz</span><input type="text" name="Zgew3" /></p>
                <p><span>Zutat 4 Gewürz</span><input type="text" name="Zgew4" /></p>
            </div>
            <div class="nahrung">
                <h4>Grundnahrungsmittel:</h4>
                <p><span>Zutat 1 </span><input type="text" name="Znahr1" /></p>
                <p><span>Zutat 2 </span><input type="text" name="Znahr2" /></p>
                <p><span>Zutat 3 </span><input type="text" name="Znahr3" /></p>
                <p><span>Zutat 4 </span><input type="text" name="Znahr4" /></p>
            </div>
            <p><span>Zubereitungszeit*: </span><input type="text" name="Ztime" /></p>
            <h3>Zubereitung - einzelne Schritte:</h3>
            <div class="textfeld" >
                <h5><span>Schritt 1*</span> <textarea name="s1"></textarea></h5>
            </div>
            <div class="textfeld">
                <h5><span>Schritt 2*</span> <textarea name="s2"></textarea></h5>
            </div>
            <div class="textfeld">
                <h5><span>Schritt 3*</span> <textarea  name="s3"></textarea></h5>
            </div>
            <div class="textfeld">
                <h5><span>Schritt 4</span> <textarea name="s4"></textarea></h5>
            </div>
            <div class="textfeld">
                <h5><span>Schritt 5</span> <textarea name="s5"></textarea></h5>
            </div>
            <div class="textfeld">
                <h5><span>Schritt 6</span> <textarea name="s6"></textarea></h5>
            </div>
            <div class="textfeld">
                <h5><span>Schritt 7</span> <textarea name="s7"></textarea></h5>
            </div>
            <div class="textfeld">
                <h5><span>Schritt 8</span> <textarea name="s8"></textarea></h5>
            </div>
            <div class="textfeld">
                <h5><span>Schritt 9</span> <textarea name="s9"></textarea></h5>
            </div>
            <div class="textfeld">
                <h5><span>Schritt 10</span> <textarea  name="s10"></textarea></h5>
            </div>
            <div class="textfeld">
                <h5><span>Schritt 11</span> <textarea name="s11"></textarea></h5>
            </div>
            <div class="textfeld">
                <h5><span>Schritt 12</span> <textarea name="s12"></textarea></h5>
            </div>
            <div class="textfeld">
                <h5><span>Schritt 13</span> <textarea name="s13"></textarea></h5>
            </div>
            <div class="textfeld">
                <h5><span>Schritt 14</span> <textarea name="s14"></textarea></h5>
            </div>
            <div class="textfeld">
                <h5><span>Schritt 15</span> <textarea name="s15"></textarea></h5>
            </div>
            <div class="textfeld">
                <h5><span>Schritt 16</span> <textarea name="s16"></textarea></h5>
            </div>
            <div class="textfeld">
                <h5><span>Schritt 17</span> <textarea name="s17"></textarea></h5>
            </div>
            <div class="textfeld">
                <h5><span>Schritt 18</span> <textarea name="s18"></textarea></h5>
            </div>
            <div class="textfeld">
                <h5><span>Schritt 19</span> <textarea name="s19"></textarea></h5>
            </div>
            <div class="textfeld">
                <h5><span>Schritt 20</span> <textarea name="s20"></textarea></h5>
            </div>
            <p><input type="submit" value="Daten senden" name="btn" /></p>
         
        </form>
    </div>
</div><!--ende wrapper-->
</body>