<?php
    session_start();
    header("Content-Type: text/html; charset=utf-8");
    
    include("master.php");
?>
<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8" />
<title>Kochbuch</title>
<!--Mobile-->
<meta name="viewport" content="width=device-width, 
   initial-scale=1.0, 
   maximum-scale=1.0, 
   user-scalable=no">
<!--Fonts-->
<link href='http://fonts.googleapis.com/css?family=Amatic+SC' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Cabin+Sketch:400,700' rel='stylesheet' type='text/css'/>
<!--Styles-->
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="css/respo.css" media="screen" /> 
<!--Plugins-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="index.js"></script>
<script type="text/javascript" src="js/jquery.quickflip.source.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
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
    function print(nr)
    {
        window.open("php/popup.php?print_id="+nr,"","width=600px");
    }
</script>
</head>
<body>
<div id="wrapper" class="reframe">
    <div id="container" class="reframe">
    <div class="quickFlip">
        <div class="front">
            <h1>Koch<br /><span>Buch</span></h1>
            <div id="accordion">
                <h3>Login</h3>
                <div>
                    <form action="php/login_check.php" method="post">
                        <p><input type="text" name="bn"/></p>
                        <p><input type="password" name="pwd"/></p>
                        <p><input type="submit" value="Login"/></p>
                    </form>
                </div><!--Ende login-->
                <h3>Gast Login</h3>
                <div>
                    <form action="php/login_check.php" method="post">
                        <p><input type="text" name="bn" value="gast"/></p>
                        <p><input type="password" name="pwd" value="gast123"/></p>
                        <p><input type="submit" value="Login"/></p>
                    </form>
                </div><!--Ende gast-->
            </div><!--Ende accordion-->
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
            <p class='re'><a href='#nogo' class='quickFlipCta'>→ About</a> </p>
            <?php
                if(isset($_GET["hinweis"]))
                {
                echo "<h5>".$_GET["hinweis"]."</h5>";
                } 
            ?>
        </div><!--Ende front-->
        <div class='back'>
            <div id="about">
                <p>Dieses Kochbuch ist meine erste PHP-Seite, programmiert mit Notepad++.</p>
                <p>(Abschlussarbeit <a href="http://kurs.cr-media-lounge.de/" target="blank">WBS-Kurs</a>)</p>
                <p>Ich wünsche Allen viel Spaß beim Anschauen oder beim Kochen.</p>
                <p>Es grüsst Euch,</p>
                <p>Christine Ruttka</p>
                <p>aus der <a href="http://cr-media-lounge.de/" target="blank">CR Media Lounge</a></p>
                <p><strong>Feedback gern erwünscht:</strong></p>
                <p><a href="&#109;&#097;&#105;&#108;&#116;&#111;&#058;&#099;&#104;&#114;&#105;&#115;&#116;&#105;&#110;&#101;&#046;&#114;&#117;&#116;&#116;&#107;&#097;&#064;&#103;&#109;&#097;&#105;&#108;&#046;&#099;&#111;&#109;">Mail Me</a></p>
            </div>
            <p class='quickFlipCta re'>→ Zurück</p>
        </div><!--Ende back-->
    </div><!--Ende quickflip-->
    <?php
        rezepte();
    ?>
    </div><!--ende container-->
</div><!--ende wrapper-->
</body>