<?php
include("data.php");
$bn = $_POST["bn"];
$pwd = $_POST["pwd"];
$sql = "select * from admin WHERE bname = '$bn' AND passw = '$pwd' ";
$query = mysqli_query($con,$sql);

if(mysqli_num_rows($query))
{
    session_start();
    $daten = mysqli_fetch_array($query);
    
    $_SESSION["bname"] = $daten["bname"];
    $_SESSION["id"] = $daten["aid"];
    header("Location: admin.php");
}
//---Anmeden nicht möglich:----------------------
else
{
    header("Location: ../index.php?hinweis=Anmelden fehlgeschlagen");
    destroy_session();
}
?>