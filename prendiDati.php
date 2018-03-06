<?php
include_once('simple_html_dom.php');

$serverName = "";
$userName = "";
$password = "";
$dbName = "";
$conn = new mysqli($serverName, $userName, $password, $dbName);
	
$sql = "select id, link, keywords from ore where id;";
$istance = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($istance)){ 
		
		unset($arrToString);
		
		
		
		$i++;
		
		$id = $row['id'];
		$link = $row['link'];
		$keywords = $row['keywords'];	

		// keywords is a string with words like "|apple|kiwi|pear"

		$arrayKeywords = explode("|", $keywords); 

		
		// link is a string like "www.fruit.com"

		$text =  file_get_html($link)->plaintext;

		//clear all number and signs
		$clear = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($text))))));
		$arrayLink = explode(" ", $clear);
		//trim space at start and end of each word inside two array
		$aLink =array_map('trim',$arrayLink);
		$aKeywords =array_map('trim',$arrayKeywords);

		
		//print_r($aLink);
		
		foreach ($aKeywords as $arrKeywords) {
		
			$length = count($aLink);
			for ($a = 0; $a < $length; $a++) {
				if($aLink[$a] == $arrKeywords){
					for ($x = -10; $x < 10; $x++) {
						echo  $aLink[$a + $x] . ' ';
					$arrToString[] =  $aLink[$a + $x] . ' ';
					}
					echo '</br>';
				}
			}
		}
		// ancora da inserire la query che raccoglie i dati e li invia al db	
		
		$nuovaStringa = implode(" ",$arrToString);
		$sql="UPDATE ore SET nuovaStringa = '".$nuovaStringa ."' WHERE id = $id;";
		$result = mysqli_query($conn, $sql);
		
	}
	?>
	