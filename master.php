<?php
    include("php/data.php");
    function rezepte ()
    {
        $con = @mysqli_connect("localhost","crutt_kochbuch","CR_Koechin","cruttka_kochbuch") or die("kein Server oder DB gefunden");
        mysqli_set_charset($con,"utf8");
        $sql = "select * from rezept order by titel";
        $query = mysqli_query($con,$sql) or die ("kein select");
        while($daten = mysqli_fetch_array($query))
        {
            echo "<div class='quickFlip'>";
            // Vorderseite
            echo "<div class='front'>";
                echo "<div class='titelFlip'>";
                    echo "<h4>".$daten["titel"]."</h4>";
                echo "</div>";
                if($daten["bild1"]=="")
                {
                    echo "<img src='bilder/nopic.jpg' alt='Bild comming soon' />";
                }
                else
                {
                    echo "<img src='".ORDNER.$daten["bild1"]."' alt='Bild ".$daten["titel"]."'/>";
                }
                echo "<div class='scollzut'>";
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
                echo "<p class='re'><a href='#nogo' class='quickFlipCta'>→ Zubereitung</a> </p>";
                echo "<div class='stat'>";
                    echo "<p>gekocht in </p>";
                    echo "<p><span class='stat-count'>".$daten["time"]."</span><p>";
                    echo "<p class='p2'>Minuten</p>";
                echo "</div>";
            echo "</div>";
            //Rückseite
            echo "<div class='back'>";
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
                        echo "<li><span>".$daten["Schritt11"]."</span></li>";
                        echo "<li><span>".$daten["Schritt12"]."</span></li>";
                        echo "<li><span>".$daten["Schritt13"]."</span></li>";
                        echo "<li><span>".$daten["Schritt14"]."</span></li>";
                        echo "<li><span>".$daten["Schritt15"]."</span></li>";
                        echo "<li><span>".$daten["Schritt16"]."</span></li>";
                        echo "<li><span>".$daten["Schritt17"]."</span></li>";
                        echo "<li><span>".$daten["Schritt18"]."</span></li>";
                        echo "<li><span>".$daten["Schritt19"]."</span></li>";
                        echo "<li><span>".$daten["Schritt20"]."</span></li>";
                    echo "</ol>";
                 echo "<p class='quickFlipCta re'>→ Zurück</p>";
                 $print_id=$daten["rid"];
                echo "<button type='button' onclick='javascript:print(".$print_id.")'>Print<button/>";
             echo "</div>";
        echo "</div>";//Ende qickflip
        }//Ende while
    }//Ende rezept
    /*-------------------------------------
    * Rezept bearbeiten
    ---------------------------------------*/
    function rezepte_bea ()
    {
        $con = @mysqli_connect("localhost","crutt_kochbuch","CR_Koechin","cruttka_kochbuch") or die("kein Server oder DB gefunden");
        mysqli_set_charset($con,"utf8");
        $sql = "select * from rezept order by titel";
        $query = mysqli_query($con,$sql) or die ("kein select");
        while($daten = mysqli_fetch_array($query))
        {
            echo "<div class='quickFlip'>";
            // Vorderseite
            echo "<div class='front'>";
                echo "<div class='titelFlip'>";
                    echo "<h4>".$daten["titel"]."</h4>";
                echo "</div>";
                //Gast darf nicht löschen:
                if ($_SESSION["id"] != 1)
                {
                    echo "<a class='del' href='#nogo' title='Rezept löschen'>X</a>";
                }
                else
                {
                //Löschen Link
                    echo "<a class='del' onclick='return confirm(\"Wollen sie wirklich?\");' href='delete.php?id_del=".$daten["rid"]."'  title='Rezept löschen'>X</a>";
                }
                // Gast auf andere Bea Seite geschickt:
                if ($_SESSION["id"] != 1)
                {
                     //Gast Link
                    echo "<a class='bea' href='rezept_bea-gast.php?id_bea=".$daten["rid"]."' title='Rezept bearbeiten'>B</a>";
                }
                else
                {
                    //Bearbeiten Link
                    echo "<a class='bea' href='rezept_bea.php?id_bea=".$daten["rid"]."' title='Rezept bearbeiten'>B</a>";
                }
                //Bild anzeigen
                if($daten["bild1"]=="")
                {
                    echo "<img src='../bilder/nopic.jpg' alt='Bild comming soon' />";
                }
                else
                {
                    echo "<img src='".ORDNER_P.$daten["bild1"]."' alt='Bild ".$daten["titel"]."'/>";
                }
                // Gast darf Bild nicht bearbeiten:
                if ($_SESSION["id"] != 1)
                {
                    echo "<a class='bildBea' href='bild_neu-gast.php?id_bea2=".$daten["rid"]."' title='Bild bearbeiten'>B</a>";
                }
                else
                {
                    // Bild bearbeiten
                    echo "<a class='bildBea' href='bild_neu.php?id_bea2=".$daten["rid"]."' title='Bild bearbeiten'>B</a>";
                }
                echo "<div class='scollzut'>";
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
                echo "<p class='re'><a href='#nogo' class='quickFlipCta'>→ Zubereitung</a> </p>";
                echo "<div class='stat'>";
                    echo "<p>gekocht in </p>";
                    echo "<p><span class='stat-count'>".$daten["time"]."</span><p>";
                    echo "<p class='p2'>Minuten</p>";
                echo "</div>";
            echo "</div>";
            //Rückseite
            echo "<div class='back'>";
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
                        echo "<li><span>".$daten["Schritt11"]."</span></li>";
                        echo "<li><span>".$daten["Schritt12"]."</span></li>";
                        echo "<li><span>".$daten["Schritt13"]."</span></li>";
                        echo "<li><span>".$daten["Schritt14"]."</span></li>";
                        echo "<li><span>".$daten["Schritt15"]."</span></li>";
                        echo "<li><span>".$daten["Schritt16"]."</span></li>";
                        echo "<li><span>".$daten["Schritt17"]."</span></li>";
                        echo "<li><span>".$daten["Schritt18"]."</span></li>";
                        echo "<li><span>".$daten["Schritt19"]."</span></li>";
                        echo "<li><span>".$daten["Schritt20"]."</span></li>";
                    echo "</ol>";
                 echo "<p class='quickFlipCta re'>→ Zurück</p>";
                 $print_id=$daten["rid"];
                 echo "<button type='button' onclick='javascript:print(".$print_id.")'>Print<button/>";
             echo "</div>";
        echo "</div>";//Ende qickflip
        }//Ende while
    }//Ende rezept
?>