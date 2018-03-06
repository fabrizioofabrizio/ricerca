<?php
include_once('simple_html_dom.php');

$serverName = "";
$userName = "";
$password = "";
$dbName = "";
$connessione = new mysqli($serverName, $userName, $password, $dbName);

/////////////////////////////////////////////////////////////////////////////////////////
// Recuperare tutti i dati che ci servono da db e suddividerli
/////////////////////////////////////////////////////////////////////////////////////////

// fare un ciclo che esegua per ogni riga tutto questo script

$sql = "select id, nuovaStringa, vecchiaStringa, mail, link, keywords from ore;";
$istanza = mysqli_query($connessione, $sql);
if ($istanza){  
	//fammi vedere i dati per ogni riga
	while($riga = mysqli_fetch_assoc($istanza)){ 
	$id =  $riga['id'];
	$mail =  $riga['mail'];
	$link = $riga['link'];
	$keywords = $riga['keywords'];
	$nuovaStringa = $riga['nuovaStringa'];
	$vecchiaStringa = $riga['vecchiaStringa'];

		if($vecchiaStringa != $nuovaStringa){
		
			$to      = $mail;
			$subject = 'Controlla il sito';
			$message = $nuovaStringa. "\r\n" .  $link;
			$headers = 'From: http://onecorse.xyz' . "\r\n" . 
				'Reply-To: http://onecorse.xyz' . "\r\n" .  
				'X-Mailer: PHP/' . phpversion(); 

			
			
			mail($to, $subject, $message, $headers);
			
			$countMail = 0;
			
			$vecchiaStringa = $nuovaStringa;
						
			$sql="UPDATE ore SET vecchiaStringa = '".$vecchiaStringa ."' WHERE id = $id;";
			$result = mysqli_query($connessione, $sql);
			
		} 
	}
}
?>