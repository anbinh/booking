<?php

$listOfCompFile = "src/json/guuse_interested.json";

$listComp = json_decode(file_get_contents($listOfCompFile), true);

$listing = array_reverse($listComp);

$count = 0;

$htmlReturn = '';

foreach ($listing as $email => $info) {
	if ($count == 3) break;
	$htmlReturn .= '<div class="item">';
	$htmlReturn .= '<div class="sender-name"><i class="fa fa-user"></i> '.$info["name"].'</div>';
	$htmlReturn .= '<div class="sender-text">'.$info["compliment"].'</div>';
	$htmlReturn .= "</div>";
	$count++;
}

echo $htmlReturn;

?>