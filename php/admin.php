<?php
    session_start();
    header("Content-Type: text/html; charset=utf-8");
    if(!isset($_SESSION["bname"]))
    {
        echo "<a href='../index.php'>Nur für Administratoren, zurück zur Startseite</a>";
        session_destroy();
        exit();
    } 
    include("../master.php");
?>
<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8" />
<title>Kochbuch Admin</title>
<!--Mobile-->
<meta name="viewport" content="width=device-width, 
   initial-scale=1.0, 
   maximum-scale=1.0, 
   user-scalable=no">
<!--Fonts-->
<link href='http://fonts.googleapis.com/css?family=Amatic+SC' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Cabin+Sketch:400,700' rel='stylesheet' type='text/css'/>
<!--Styles-->
<link rel="stylesheet" type="text/css" href="../style.css" />
<link rel="stylesheet" type="text/css" href="../css/respo.css" media="screen" /> 
<!--Plugins-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../index.js"></script>
<script type="text/javascript" src="../js/jquery.quickflip.source.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript">
    // http://w3lessons.info/2014/01/12/live-counter-using-jquery-css/
    jQuery(document).ready(function() {
	function count($this){
		var current = parseInt($this.html(), 10);
		current = current + 1; /* Where 1 is increment */

		$this.html(++current);
		if(current > $this.data('count')){
			$this.html($this.data('count'));
		} else {
			setTimeout(function(){count($this)}, 50);
		}
	}
        jQuery(".stat-count").each(function() {
        jQuery(this).data('count', parseInt(jQuery(this).html(), 10));
        jQuery(this).html('0');
        count(jQuery(this));
	});
});
</script>
<script type="text/javascript">
    function profil(nr)
    {
        window.open("popup.php?print_id="+nr,"","width=600px");
    }
</script>
</head>
<body>
<div id="wrapper" class="reframe">
    <div id="content" class="reframe">
    <div class="quickFlip">
        <div class="front">
            <h1>Koch<br /><span>Buch</span></h1>
            <div class='hallo'>
            <?php
                echo"<h4>Hallo ".$_SESSION["bname"]."</h4>";
                echo "<p>Nur schauen, nicht löschen oder bearbeiten möglich.</p>";
                if ($_SESSION["id"] != 1)
                {
                    echo "<p><a href='rezept_neu-gast.php'>neues Rezept einfügen</a></p>";
                }
                else
                {
                    echo "<p><a href='rezept_neu.php'>neues Rezept einfügen</a></p>";
                }
                echo "<p><a href='logout.php'>Logout</a></p>";
                
            ?>
            </div><!--Ende front-->
            <p class='re'><a href='#nogo' class='quickFlipCta'>→ About</a> </p>
            <?php
                if(isset($_GET["insert"]))
                {
                echo "<h5>".$_GET["insert"]."</h5>";
                } 
            ?>
            <?php
                $zahl = "select count(*) from rezept";
                $erg = mysqli_query($con,$zahl) or die("keine Zählung möglich");
                $num = mysqli_fetch_array($erg);
                echo "<div class='stat'>";
                    echo "<p>Es gibt </p>";
                    echo "<p><span class='stat-count'>".$num[0]."</span><p>";
                    echo "<p class='p2'>Rezepte</p>";
                echo "</div>";
            ?>
        </div><!--Ende front-->
        <div class='back'>
            <div id="about">
                <p>Dieses Kochbuch ist meine erste PHP-Seite mit Notepad++ programmiert.</p>
                <p>Ich wünsche Allen viel Spaß beim kochen.</p>
                <p>Es grüsst Euch,</p>
                <p>Christine Ruttka</p>
                <p><strong>Feedback gern erwünscht:</strong></p>
                <p><a href="&#109;&#097;&#105;&#108;&#116;&#111;&#058;&#099;&#104;&#114;&#105;&#115;&#116;&#105;&#110;&#101;&#046;&#114;&#117;&#116;&#116;&#107;&#097;&#064;&#103;&#109;&#097;&#105;&#108;&#046;&#099;&#111;&#109;">Mail Me</a></p>
            </div>
            <p class='quickFlipCta re'>→ Zurück</p>
        </div><!--Ende back-->
    </div><!--Ende quickflip-->
    <?php
        rezepte_bea();
    ?>
    </div><!--ende content-->
</div><!--ende wrapper-->
</body>