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
<title>Kochbuch - Rezept bearbeiten</title>
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
        <h1>Datensätze bearbeiten:</h1>
        <form action='admin.php' method='get' class="reframe">
        <?php
            include("data.php");
            $id_bea = $_GET["id_bea"];
            $sql = "select * from rezept where rid = '$id_bea'";
            $query = mysqli_query($con,$sql)or die("kein select in bea");
            
            $daten = mysqli_fetch_array($query);
            echo "<p>
					<input type='hidden' name='id' value='".$daten["rid"]."' />
				 </p>";
            echo "<p>Titel:
                    <input type='text' name='tt' value='".$daten["titel"]."' />".
                 "</p>";
            
            echo "<h3>Zutaten und Menge eingeben:</h3>";
            echo "<div class='tier'>";
                echo "<p>Zutat tierisch 1:
                        <input type='text' name='Ztier1' value='".$daten["Zut_tier1"]."' />".
                     "</p>";
                echo "<p>Zutat tierisch 2:
                        <input type='text' name='Ztier2' value='".$daten["Zut_tier2"]."' />".
                     "</p>";
                echo "<p>Zutat tierisch 3:
                        <input type='text' name='Ztier3' value='".$daten["Zut_tier3"]."' />".
                     "</p>";
                echo "<p>Zutat tierisch 4:
                        <input type='text' name='Ztier4' value='".$daten["Zut_tier4"]."' />".
                     "</p>";
            echo "</div>";
            echo "<div class='gemuese'>";
                echo "<p>Zutat 1 Gemüse:
                        <input type='text' name='Zgem1' value='".$daten["Zut_gem1"]."' />".
                     "</p>";
                echo "<p>Zutat 2 Gemüse:
                        <input type='text' name='Zgem2' value='".$daten["Zut_gem2"]."' />".
                     "</p>";
                echo "<p>Zutat 3 Gemüse:
                        <input type='text' name='Zgem3' value='".$daten["Zut_gem3"]."' />".
                     "</p>";
                echo "<p>Zutat 4 Gemüse:
                        <input type='text' name='Zgem4' value='".$daten["Zut_gem4"]."' />".
                     "</p>";
            echo "</div>";
            echo "<div class='gewuerze'>";
                echo "<p>Zutat 1 Gewürz:
                        <input type='text' name='Zgew1' value='".$daten["Zut_gew1"]."' />".
                     "</p>";
                echo "<p>Zutat 2 Gewürz:
                        <input type='text' name='Zgew2' value='".$daten["Zut_gew2"]."' />".
                     "</p>";
                echo "<p>Zutat 3 Gewürz:
                        <input type='text' name='Zgew3' value='".$daten["Zut_gew3"]."' />".
                     "</p>";
                echo "<p>Zutat 4 Gewürz:
                        <input type='text' name='Zgew4' value='".$daten["Zut_gew4"]."' />".
                     "</p>";
            echo "</div>";
            echo "<div class='nahrung'>";
                echo "<p>Zutat 1:
                        <input type='text' name='Znahr1' value='".$daten["Zut_nahr1"]."' />".
                     "</p>";
                echo "<p>Zutat 2:
                        <input type='text' name='Znahr2' value='".$daten["Zut_nahr2"]."' />".
                     "</p>";
                echo "<p>Zutat 3:
                        <input type='text' name='Znahr3' value='".$daten["Zut_nahr3"]."' />".
                     "</p>";
                echo "<p>Zutat 4:
                        <input type='text' name='Znahr4' value='".$daten["Zut_nahr4"]."' />".
                     "</p>";
            echo "</div>";
            echo "<p><span>Zubereitungszeit:</span>
                        <input type='text' name='Ztime' value='".$daten["time"]."'/>
                    Minuten</p>";
            //Schritte
            echo "<h3>Zubereitung - einzelne Schritte:</h3>";
            echo "<div class='textfeld'>";
                echo "<h5>
                        <span>Schritt 1</span>
                        <textarea cols='45' rows='3' name='s1'>".$daten["Schritt1"]."</textarea>
                        
                      </h5>";
            echo "</div>";
            echo "<div class='textfeld'>";
                echo "<h5>
                        <span>Schritt 2</span>
                        <textarea cols='45' rows='3' name='s2'>".$daten["Schritt2"]."</textarea>
                      </h5>";
            echo "</div>";
            echo "<div class='textfeld'>";
                echo "<h5>
                        <span>Schritt 3</span>
                        <textarea cols='45' rows='3' name='s3'>".$daten["Schritt3"]."</textarea>
                      </h5>"; 
            echo "</div>";
            echo "<div class='textfeld'>";
                echo "<h5>
                        <span>Schritt 4</span>
                        <textarea cols='45' rows='3' name='s4'>".$daten["Schritt4"]."</textarea>
                      </h5>";
            echo "</div>";  
            echo "<div class='textfeld'>";
                echo "<h5>
                        <span>Schritt 5</span>
                        <textarea cols='45' rows='3' name='s5'>".$daten["Schritt5"]."</textarea>
                      </h5>";
            echo "</div>";
            echo "<div class='textfeld'>";
                echo "<h5>
                        <span>Schritt 6</span>
                        <textarea cols='45' rows='3' name='s6'>".$daten["Schritt6"]."</textarea>
                      </h5>";
            echo "</div>"; 
            echo "<div class='textfeld'>";
                echo "<h5>
                        <span>Schritt 7</span>
                        <textarea cols='45' rows='3' name='s7'>".$daten["Schritt7"]."</textarea>
                      </h5>";
            echo "</div>";
            echo "<div class='textfeld'>";
                echo "<h5>
                        <span>Schritt 8</span>
                        <textarea cols='45' rows='3' name='s8'>".$daten["Schritt8"]."</textarea>
                      </h5>";
            echo "</div>";  
            echo "<div class='textfeld'>";            
                echo "<h5>
                        <span>Schritt 9</span>
                        <textarea cols='45' rows='3' name='s9'>".$daten["Schritt9"]."</textarea>
                      </h5>";
            echo "</div>";
            echo "<div class='textfeld'>"; 
                echo "<h5>
                        <span>Schritt 10</span>
                        <textarea cols='45' rows='3' name='s10'>".$daten["Schritt10"]."</textarea>
                      </h5>";
            echo "</div>";
            echo "<div class='textfeld'>";
                echo "<h5>
                        <span>Schritt 11</span>
                        <textarea cols='45' rows='3' name='s11'>".$daten["Schritt11"]."</textarea>
                      </h5>";
            echo "</div>";
            echo "<div class='textfeld'>";
                echo "<h5>
                        <span>Schritt 12</span>
                        <textarea cols='45' rows='3' name='s12'>".$daten["Schritt12"]."</textarea>
                      </h5>";
            echo "</div>";
            echo "<div class='textfeld'>";
                echo "<h5>
                        <span>Schritt 13</span>
                        <textarea cols='45' rows='3' name='s13'>".$daten["Schritt13"]."</textarea>
                      </h5>";
            echo "</div>";
            echo "<div class='textfeld'>";
                echo "<h5>
                        <span>Schritt 14</span>
                        <textarea cols='45' rows='3' name='s14'>".$daten["Schritt14"]."</textarea>
                      </h5>";
            echo "</div>";   
            echo "<div class='textfeld'>";
                echo "<h5>
                        <span>Schritt 15</span>
                        <textarea cols='45' rows='3' name='s15'>".$daten["Schritt15"]."</textarea>
                      </h5>";
            echo "</div>"; 
            echo "<div class='textfeld'>";
                echo "<h5>
                        <span>Schritt 16</span>
                        <textarea cols='45' rows='3' name='s16'>".$daten["Schritt16"]."</textarea>
                      </h5>";
            echo "</div>";
            echo "<div class='textfeld'>";
                echo "<h5>
                        <span>Schritt 17</span>
                        <textarea cols='45' rows='3' name='s17'>".$daten["Schritt17"]."</textarea>
                      </h5>";
            echo "</div>"; 
            echo "<div class='textfeld'>";
                echo "<h5>
                        <span>Schritt 18</span>
                        <textarea cols='45' rows='3' name='s18'>".$daten["Schritt18"]."</textarea>
                      </h5>";
            echo "</div>" ;
            echo "<div class='textfeld'>";
                echo "<h5>
                        <span>Schritt 19</span>
                        <textarea cols='45' rows='3' name='s19'>".$daten["Schritt19"]."</textarea>
                      </h5>";
            echo "</div>" ;
            echo "<div class='textfeld'>";
                echo "<h5>
                        <span>Schritt 20</span>
                        <textarea cols='45' rows='3' name='s20'>".$daten["Schritt20"]."</textarea>
                      </h5>";
            echo "</div>";
               
        ?>
        
        <p> <input type='submit' value='Daten ändern' /> </p>
        </form>
</div>
<?php
            if(isset($_GET["upload"]))
            {
            echo $_GET["upload"];
            }
        ?> 
</div><!--ende wrapper-->
</body>