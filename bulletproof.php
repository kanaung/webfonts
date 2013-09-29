<?php
include_once('webfont.php');
?>

<?php
$url = 'http://webfont.ayar.co/'; //no trailing slash
$webfont = new WebFont();

//$webfont->get_bulletproof();
//var_export($webfont);
$webfont->generate_bulletproof();
?>
