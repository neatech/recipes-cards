<?php
$con = @mysqli_connect("localhost","crutt_kochbuch","CR_Koechin","cruttka_kochbuch") or die("kein Server oder DB gefunden");
mysqli_set_charset($con,"utf8");
define("MAXSIZE",500000);
define("ORDNER","images/");
define("ORDNER_P","../images/");
?>