
<?php
$serverName = "";
$userName = "";
$password = "";
$dbName = "";

session_start();

$connessione = new mysqli($serverName, $userName, $password, $dbName);

$testo = $_SESSION['varname'];
$keywords = $_SESSION['varnameK'];
$link = $_SESSION['varnameL'];

// Stringa Uppercase
$keywordsUpper = strtoupper($keywords);
$keywordsLower = strtolower($keywords);
$keywordsFirstUpper = ucfirst($keywordsLower);
$keywordsUpperLowerFirst = '|'.$keywordsUpper . '|' . $keywordsLower.'|'.$keywordsFirstUpper; 

	$count = 0;

	$sqlInizio = "select id, mail, link, keywords from ore where mail = '".$testo."';";
	$istanzaNuovoUtente = mysqli_query($connessione, $sqlInizio);
	
	if ($istanzaNuovoUtente){  
		//fammi vedere i dati per ogni riga
		while($riga = mysqli_fetch_assoc($istanzaNuovoUtente)){  
			// stampami il contenuto di ogni campo della riga 
				
			$row =  $riga['id'];
			$l = $riga['link'];
			$k = $riga['keywords'];
		
			if($l == $link) {
				$count++;
			}
		}
	}
	
		if($count == 0){
		$sql = "INSERT INTO `ore` (mail, link, keywords) values ('".$testo."', '".$link."', '".$keywordsUpperLowerFirst."')"; 
		$istanza = mysqli_query($connessione, $sql);
		}		
	
		$sqlInizio = "select id, mail, link, keywords from ore where link = '".$link."';";
		$istanzaNuovoUtente = mysqli_query($connessione, $sqlInizio);
		while($row = mysqli_fetch_assoc($istanzaNuovoUtente)){ 
		
		$mail = $row['mail'];
		$link = $row['link'];
		$keywords = $row['keywords'];
		
		}
		
		echo 'mail ' .$mail.'</br>';
		echo 'link '.$link.' </br>';
		echo 'tag '.$keywords.'</br>';

?>	