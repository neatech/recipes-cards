<?php
include("data.php");
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <title>Kochbuch Rezept Print</title>
    <link href='http://fonts.googleapis.com/css?family=Amatic+SC' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Cabin+Sketch:400,700' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" type="text/css" href="../css/popup.css" />
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready( function() {
            $(function() {
                $('#printcont ul li:empty').remove();
                $('#printcont ol li span:empty' ).remove();
                $('#printcont ol li:empty' ).remove();
            });
        });
    </script>
    <script type="text/javascript">
            function profil(nr)
            {
                window.open("popup.php?id="+nr+,"","width=600px");
            }
    </script>
</head>
<body>
<div id="wrapper">
<?php
    $print_id=$_GET["print_id"];
    $sql = "select * from rezept where rid = '$print_id'";
    $query = mysqli_query($con,$sql) or die ("kein select");
    $daten = mysqli_fetch_array($query);
    echo "<div id='printcont'>";
        echo "<h1>".$daten["titel"]."</h1>";
        // Links
        echo "<div id='left'>";
            if($daten["bild1"]=="")
            {
                echo "<img src='../bilder/nopic.jpg' alt='Bild comming soon' />";
            }
            else
            {
                echo "<img src='".ORDNER_P.$daten["bild1"]."' alt='Bild ".$daten["titel"]."'/>";
            }
            echo "<p>gekocht in <strong>".$daten["time"]."</strong> Minuten<p>";
            echo "<ul>";
                echo "<li>".$daten["Zut_tier1"]."</li>";
                echo "<li>".$daten["Zut_tier2"]."</li>";
                echo "<li>".$daten["Zut_tier3"]."</li>";
                echo "<li>".$daten["Zut_tier4"]."</li>";
                echo "<li>".$daten["Zut_gem1"]."</li>";
                echo "<li>".$daten["Zut_gem2"]."</li>";
                echo "<li>".$daten["Zut_gem3"]."</li>";
                echo "<li>".$daten["Zut_gem4"]."</li>";
                echo "<li>".$daten["Zut_gew1"]."</li>";
                echo "<li>".$daten["Zut_gew2"]."</li>";
                echo "<li>".$daten["Zut_gew3"]."</li>";
                echo "<li>".$daten["Zut_gew4"]."</li>";
                echo "<li>".$daten["Zut_nahr1"]."</li>";
                echo "<li>".$daten["Zut_nahr2"]."</li>";
                echo "<li>".$daten["Zut_nahr3"]."</li>";
                echo "<li>".$daten["Zut_nahr4"]."</li>";
            echo "</ul>";
        echo "</div>";
        //rechts
        echo "<div class='right'>";
            echo "<ol>";
                    echo "<li><span>".$daten["Schritt1"]."</span></li>";
                    echo "<li><span>".$daten["Schritt2"]."</span></li>";
                    echo "<li><span>".$daten["Schritt3"]."</span></li>";
                    echo "<li><span>".$daten["Schritt4"]."</span></li>";
                    echo "<li><span>".$daten["Schritt5"]."</span></li>";
                    echo "<li><span>".$daten["Schritt6"]."</span></li>";
                    echo "<li><span>".$daten["Schritt7"]."</span></li>";
                    echo "<li><span>".$daten["Schritt8"]."</span></li>";
                    echo "<li><span>".$daten["Schritt9"]."</span></li>";
                    echo "<li><span>".$daten["Schritt10"]."</span></li>";
                echo "</ol>";
         echo "<button onclick='window.print()'>Print<button/>";
        echo "</div>";
    echo "</div>";//Ende print
?>
<div >
<p>Viel Freude beim Kochen wünscht Christine Ruttka aus der CR-Media-Lounge</p> 
</div>
</div><!--ende wrapper-->
</body>