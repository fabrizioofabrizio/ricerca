
<?php
$serverName = "";
$userName = "";
$password = "";
$dbName = "";

session_start();

$testo = $_POST["testo"];
$keywords = $_POST['keywords'];
$link = $_POST['link'];




$keywords = str_replace(' ', '|', $keywords);




$_SESSION['varname'] = $testo;
$_SESSION['varnameK'] = $keywords;
$_SESSION['varnameL'] = $link;

?>
