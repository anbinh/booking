<?php

$name = htmlspecialchars($_POST['p_name']);
$email = htmlspecialchars($_POST['p_email']);
$comp = htmlspecialchars($_POST['p_comp']);
$wantone = htmlspecialchars($_POST['p_wantone']);

$listOfCompFile = "src/json/guuse_interested.json";

$listComp = json_decode(file_get_contents($listOfCompFile), true);

$newComp = array($email => array(	"name" 			=> $name,
									"compliment" 	=> $comp,
									"wantone" 		=> $wantone
								)
				);

$listComp = array_merge($listComp, $newComp);

$newCompJSON = json_encode($listComp);

file_put_contents($listOfCompFile, $newCompJSON);

echo "okay";

?>