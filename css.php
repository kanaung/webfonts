<?php
include_once('webfont.php');
?>

<?php
$url = 'http://webfont.ayar.co/'; //no trailing slash
$webfont = new WebFont();

$webfont->echo_css();
?>
