<?php
include_once('webfont.php');
?>

<?php
$url = 'http://webfont.ayar.co/'; //no trailing slash
$webfont = new WebFont();
if(isset($webfont->ios_version)){
//echo $webfont->ios_version;
}
//echo $webfont->browser_name;
if($webfont->mobile_browser){
//	echo "This is Safari Browser";
	}
//$webfont->redirect_css();
$webfont->echo_css();
//echo $webfont->font_format;
//print_r($webfont->fonts);
//print_r($webfont->get_font);
//print_r($webfont->font_family);
//echo $webfont->css_file;
//print_r($webfont->css_style);
//print_r($webfont->svg_fontname);
function output(){
	global $webfont;
	$supportsGzip = strpos( $_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip' ) !== false;
	$content = $webfont->css_file;
	$offset = 60 * 60;
    $expire = "expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
	header("Content-Type: text/css");
	header( $expire );
    header( 'Content-Length: ' . strlen( $content ) );

	if($supportsGzip === false){

    header('Content-Encoding: gzip');

    header('Vary: Accept-Encoding');
     $content = gzencode( trim( $content ) , 9);
	}
	print $content;
	}
	if(isset($_POST['rebuild']))
		echo 'Rebuilt';
//output();
?>
