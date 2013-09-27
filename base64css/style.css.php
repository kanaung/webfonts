<?php
//content type header
header("Content-Type: text/css");

//find current page URL
function curPageURL() {
 $pageURL = 'http';
if (!empty($_SERVER['HTTPS'])) {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["HTTP_HOST"].":".$_SERVER["SERVER_PORT"];
 } else {
  $pageURL .= $_SERVER["HTTP_HOST"];
 }
 return $pageURL;
}
$uri=curPageURL();//this is current page URL

//require browser detect script
require_once('../includes/Browser.php');

//call browser detect script class
$browser = new Browser();

//define ttf fonts in base64 encode


//start font embed code output script
  if($_SERVER["QUERY_STRING"]) {
if(isset($_GET['format'])){
	$fmt = $_GET['format'];
	}else{
if( $browser->getBrowser() == Browser::BROWSER_IE && $browser->getVersion() <= 8){
 $fmt="eot";
}elseif( $browser->getBrowser() == Browser::BROWSER_OPERA && $browser->getVersion() <= 9){
 $fmt="svg";
}elseif( $browser->getBrowser() == Browser::PLATFORM_IPHONE || $browser->getBrowser() == Browser::PLATFORM_IPAD){
 $fmt="svg";
}elseif( $browser->getBrowser() == Browser::BROWSER_ANDROID || $browser->getBrowser() == Browser::PLATFORM_ANDROID){
 $fmt="woff";
}else{
 $fmt="ttf";
}
}
if($fmt=="ttf"){
$ext="ttf";
$format="truetype";
}elseif($fmt=="otf"){
$ext="otf";
$format="opentype";
}elseif($fmt=="woff"){
$ext="woff";
$format="woff";
}elseif($fmt=="svg"){
$ext="svg#font";
$format="svg";
}else{
$ext="ttf";
$format="truetype";
}
if(isset($_GET['font'])){
	$querys = $_GET['font'];
/*Start to Look for duplicate values in query strings*/
/*Define which word is duplicated and will be replaced*/
	$duplicates=array("ayar_takhu",
								"ayar_kasone",		#1
								"ayar_nayon",		#2
								"ayar_wazo",		#3
								"ayar_wagaung",		#4
								"ayar_tawthalin",	#5
								"ayar_thadingyut",	#6
								"ayar_tazaungmone",	#7
								"ayar_natdaw",		#8
								"ayar_pyatho",		#9
								"ayar_tapotwe",		#10
								"ayar_tabaung",		#11
								"ayar_juno",		#12
								"ayar_typewriter",	#13
								"ayar_thawka",		#14
								"tharlon",
								"atku",				#21
								"aksn",				#22
								"anyn",				#23
								"awzo",				#24
								"awgg",				#25
								"attl",				#26
								"atdg",				#27
								"atzm",				#28
								"andw",				#29
								"apyt",				#30
								"atpt",				#31
								"atbg",				#32
								"ajno",				#33
								"atwt",				#34
								"atka",				#35
								"mm3",				#41
								"zg1",				#43
								"pdk",				#44
								"prb",				#45
								"yko",				#46
								"mstp",				#47
								"mymm");			#48
/*Define all replacement words in query strings. $duplicates and $replace must match top to bottom orderly.*/
	$replace=array("ayar takhu",
							"ayar kasone",		#1
							"ayar nayon",		#2
							"ayar wazo",		#3
							"ayar wagaung",		#4
							"ayar tawthalin",	#5
							"ayar thadingyut",	#6
							"ayar tazaungmone",	#7
							"ayar natdaw",		#8
							"ayar pyatho",		#9
							"ayar tapotwe",		#10
							"ayar tabaung",		#11
							"ayar juno",		#12
							"ayar typewriter",	#13
							"ayar thawka",		#14
							"tharlon",
							"ayar takhu",		#21
							"ayar kasone",		#22
							"ayar nayon",		#23
							"ayar wazo",		#24
							"ayar wagaung",		#25
							"ayar tawthalin",	#26
							"ayar thadingyut",	#27
							"ayar tazaungmone",	#28
							"ayar natdaw",		#29
							"ayar pyatho",		#30
							"ayar tapotwe",		#31
							"ayar tabaung",		#32
							"ayar juno",		#33
							"ayar typewriter",	#34
							"ayar thawka",		#35
							"myanmar3",			#41
							"zawgyi-one",		#43
							"padauk",			#44
							"parabaik",			#45
							"yunghkio",			#46
							"masterpiece",		#47
							"mymyanmar");		#48
/*replace all necessary words to continue removing duplicated words*/
	$uniques= str_replace($duplicates,$replace,$querys);
	$query = explode(",",$uniques);
	$filter = array("ayar",
						"ayar takhu",		#1
						"ayar kasone",		#2
						"ayar nayon",		#3
						"ayar wazo",		#4
						"ayar wagaung",		#5
						"ayar tawthalin",	#6
						"ayar thadingyut",	#7
						"ayar tazaungmone",	#8
						"ayar natdaw",		#9
						"ayar pyatho",		#10
						"ayar tapotwe",		#11
						"ayar tabaung",		#12
						"ayar juno",		#13
						"ayar typewriter",	#14
						"ayar thawka",		#15
						"tharlon",
						"myanmar3",			#21
						"zawgyi-one",		#23
						"padauk",			#24
						"parabaik",			#25
						"yunghkio",			#26
						"masterpiece",		#27
						"mymyanmar");		#28
	$fontsduplicates=array_intersect($query, $filter);
/*Remove all duplicated fonts name from array*/
	$fonts = array_unique($fontsduplicates);//this line will give you an array of unique font family names.
	foreach ($fonts as $font){
		$name= $font;
		if ($name=="ayar"){
		$family = ucfirst($name);
		$file="ayar";
		}
		if ($name=="ayar takhu"){
		$family = ucfirst($name);
		$file="ayar_takhu";
		}
		if ($name=="ayar kasone"){
		$family = ucfirst($name);
		$file="ayar_kasone";
		}
		if ($name=="ayar nayon"){
		$family = ucfirst($name);
		$file="ayar_nayon";
		}
		if ($name=="ayar wazo"){
		$family = ucfirst($name);
		$file="ayar_wazo";
		}
		if ($name=="ayar wagaung"){
		$family = ucfirst($name);
		$file="ayar_wagaung";
		}
		if ($name=="ayar tawthalin"){
		$family = ucfirst($name);
		$file="ayar_tawthalin";
		}
		if ($name=="ayar thadingyut"){
		$family = ucfirst($name);
		$file="ayar_thadingyut";
		}
		if ($name=="ayar tazaungmone"){
		$family = ucfirst($name);
		$file="ayar_tazaungmone";
		}
		if ($name=="ayar natdaw"){
		$family = ucfirst($name);
		$file="ayar_natdaw";
		}
		if ($name=="ayar pyatho"){
		$family = ucfirst($name);
		$file="ayar_pyatho";
		}
		if ($name=="ayar tapotwe"){
		$family = ucfirst($name);
		$file="ayar_tapotwe";
		}
		if ($name=="ayar tabaung"){
		$family = ucfirst($name);
		$file="ayar_tabaung";
		}
		if ($name=="ayar typewriter"){
		$family = ucfirst($name);
		$file="ayar_typewriter";
		}
		if ($name=="ayar thawka"){
		$family = ucfirst($name);
		$file="ayar_thawka";
		}
		if ($name=="ayar juno"){
		$family = ucfirst($name);
		$file="ayar_juno";
		}
		if ($name=="tharlon"){
		$family = ucfirst($name);
		$file="tharlon";
		}
		if ($name=="myanmar3"){
		$family = ucfirst($name);
		$file="myanmar3";
		}
		if ($name=="zawgyi-one"){
		$family = ucfirst($name);
		$file="zawgyi-one";
		}
		if ($name=="padauk"){
		$family = ucfirst($name);
		$file="padauk";
		}
		if ($name=="parabaik"){
		$family = ucfirst($name);
		$file="parabaik";
		}
		if ($name=="yunghkio"){
		$family = ucfirst($name);
		$file="yunghkio";
		}
		if ($name=="masterpiece"){
		$family="Masterpiece Uni Sans";
		$file="masterpiece";
		}
		if ($name=="mymyanmar"){
		$family="MyMyanmar Universal";
		$file="MyMMUnicodeUniversal";
		}

		if( $browser->getBrowser() == Browser::BROWSER_IE ){
			if ($ext == "ttf") {
			include_once('../includes/'.$file.'_ttf.php');
			$cons = strtoupper($file);
			$constant = $cons.'_TTF';
			printf("@font-face{ font-family:\"%s\";%s unicode-range: U+1000-U+109F, U+AA60-U+AA7B;}\n", $family, constant($constant));		
			}else{
			printf("@font-face {font-family:\"%s\";src:url('%s/fonts/%s.eot');unicode-range: U+1000-U+109F, U+AA60-U+AA7B;}\n", $family, $uri, $file);	
				}
			}else{
			if ($ext == "ttf") {
			include_once('../includes/'.$file.'_ttf.php');
			$cons = strtoupper($file);
			$constant = $cons.'_TTF';
			printf("@font-face{ font-family:\"%s\";%s unicode-range: U+1000-U+109F, U+AA60-U+AA7B;}\n", $family, constant($constant));	
			}else{
			printf("@font-face {font-family:\"%s\";src:url('%s/fonts/%s.%s');unicode-range: U+1000-U+109F, U+AA60-U+AA7B;}\n", $family, $uri, $file, $ext);	
				}
		}
  }
  }else{
  if(isset($_GET['format'])){
	$fmt=$_GET['format'];
$filter = array("ayar","ayar takhu","ayar kasone","ayar nayon","ayar wazo","ayar wagaung","ayar tawthalin","ayar thadingyut","ayar tazaungmone","ayar natdaw","ayar pyatho","ayar tapotwe","ayar tabaung","ayar juno","ayar typewriter","ayar thawka","tharlon","myanmar3","zawgyi-one","padauk","parabaik" );
	$fonts=$filter;
	foreach ($fonts as $font){
		$name= $font;
		if ($name=="ayar"){
		$family = ucfirst($name);
		$file="ayar";
		}
		if ($name=="ayar takhu"){
		$family = ucfirst($name);
		$file="ayar_takhu";
		}
		if ($name=="ayar kasone"){
		$family = ucfirst($name);
		$file="ayar_kasone";
		}
		if ($name=="ayar nayon"){
		$family = ucfirst($name);
		$file="ayar_nayon";
		}
		if ($name=="ayar wazo"){
		$family = ucfirst($name);
		$file="ayar_wazo";
		}
		if ($name=="ayar wagaung"){
		$family = ucfirst($name);
		$file="ayar_wagaung";
		}
		if ($name=="ayar tawthalin"){
		$family = ucfirst($name);
		$file="ayar_tawthalin";
		}
		if ($name=="ayar thadingyut"){
		$family = ucfirst($name);
		$file="ayar_thadingyut";
		}
		if ($name=="ayar tazaungmone"){
		$family = ucfirst($name);
		$file="ayar_tazaungmone";
		}
		if ($name=="ayar natdaw"){
		$family = ucfirst($name);
		$file="ayar_natdaw";
		}
		if ($name=="ayar pyatho"){
		$family = ucfirst($name);
		$file="ayar_pyatho";
		}
		if ($name=="ayar tapotwe"){
		$family = ucfirst($name);
		$file="ayar_tapotwe";
		}
		if ($name=="ayar tabaung"){
		$family = ucfirst($name);
		$file="ayar_tabaung";
		}
		if ($name=="ayar typewriter"){
		$family = ucfirst($name);
		$file="ayar_typewriter";
		}
		if ($name=="ayar thawka"){
		$family = ucfirst($name);
		$file="ayar_thawka";
		}
		if ($name=="ayar juno"){
		$family = ucfirst($name);
		$file="ayar_juno";
		}
		if ($name=="tharlon"){
		$family = ucfirst($name);
		$file="tharlon";
		}
		if ($name=="myanmar3"){
		$family = ucfirst($name);
		$file="myanmar3";
		}
		if ($name=="zawgyi-one"){
		$family = ucfirst($name);
		$file="zawgyi-one";
		}
		if ($name=="padauk"){
		$family = ucfirst($name);
		$file="padauk";
		}
		if ($name=="parabaik"){
		$family = ucfirst($name);
		$file="parabaik";
		}
		if ($name=="yunghkio"){
		$family = ucfirst($name);
		$file="yunghkio";
		}
		if ($name=="masterpiece"){
		$family="Masterpiece Uni Sans";
		$file="masterpiece";
		}
		if ($name=="mymyanmar"){
		$family="MyMyanmar Universal";
		$file="MyMMUnicodeUniversal";
		}
		if( $browser->getBrowser() == Browser::BROWSER_IE ){
			if ($ext == "ttf") {
			include_once('../includes/'.$file.'_ttf.php');
			$cons = strtoupper($file);
			$constant = $cons.'_TTF';
			printf("@font-face{ font-family:\"%s\";%s unicode-range: U+1000-U+109F, U+AA60-U+AA7B;}\n", $family, constant($constant));		
			}else{
			printf("@font-face {font-family:\"%s\";src:url('%s/fonts/%s.eot');unicode-range: U+1000-U+109F, U+AA60-U+AA7B;}\n", $family, $uri, $file);	
				}
			}else{
			if ($ext == "ttf") {
			include_once('../includes/'.$file.'_ttf.php');
			$cons = strtoupper($file);
			$constant = $cons.'_TTF';
			printf("@font-face{ font-family:\"%s\";%s unicode-range: U+1000-U+109F, U+AA60-U+AA7B;}\n", $family, constant($constant));	
			}else{
			printf("@font-face {font-family:\"%s\";src:url('%s/fonts/%s.%s');unicode-range: U+1000-U+109F, U+AA60-U+AA7B;}\n", $family, $uri, $file, $ext);	
				}
		}
		}
	}
	}
}  else {
	$filter = array("ayar","ayar takhu","ayar kasone","ayar nayon","ayar wazo","ayar wagaung","ayar tawthalin","ayar thadingyut","ayar tazaungmone","ayar natdaw","ayar pyatho","ayar tapotwe","ayar tabaung","ayar juno","ayar typewriter","ayar thawka","tharlon","myanmar3","zawgyi-one","padauk","parabaik" );
	$fonts=$filter;
	if( $browser->getBrowser() == Browser::BROWSER_IE && $browser->getVersion() <= 8){
	 $fmt="eot";
	}elseif( $browser->getBrowser() == Browser::BROWSER_OPERA && $browser->getVersion() <= 9){
	 $fmt="svg";
	}elseif( $browser->getBrowser() == Browser::PLATFORM_IPHONE || $browser->getBrowser() == Browser::PLATFORM_IPAD){
	 $fmt="svg";
	}elseif( $browser->getBrowser() == Browser::BROWSER_ANDROID || $browser->getBrowser() == Browser::PLATFORM_ANDROID){
	$fmt="woff";
	}else{
	 $fmt="ttf";
	}
	if($fmt=="ttf"){
	$ext="ttf";
	$format="truetype";
	}elseif($fmt=="otf"){
	$ext="otf";
	$format="opentype";
	}elseif($fmt=="woff"){
	$ext="woff";
	$format="woff";
	}elseif($fmt=="svg"){
	$ext="svg#font";
	$format="svg";
	}else{
	$ext="ttf";
	$format="truetype";
	}
	foreach ($fonts as $font){
		$name= $font;
		if ($name=="ayar"){
		$family = ucfirst($name);
		$file="ayar";
		}
		if ($name=="ayar takhu"){
		$family = ucfirst($name);
		$file="ayar_takhu";
		}
		if ($name=="ayar kasone"){
		$family = ucfirst($name);
		$file="ayar_kasone";
		}
		if ($name=="ayar nayon"){
		$family = ucfirst($name);
		$file="ayar_nayon";
		}
		if ($name=="ayar wazo"){
		$family = ucfirst($name);
		$file="ayar_wazo";
		}
		if ($name=="ayar wagaung"){
		$family = ucfirst($name);
		$file="ayar_wagaung";
		}
		if ($name=="ayar tawthalin"){
		$family = ucfirst($name);
		$file="ayar_tawthalin";
		}
		if ($name=="ayar thadingyut"){
		$family = ucfirst($name);
		$file="ayar_thadingyut";
		}
		if ($name=="ayar tazaungmone"){
		$family = ucfirst($name);
		$file="ayar_tazaungmone";
		}
		if ($name=="ayar natdaw"){
		$family = ucfirst($name);
		$file="ayar_natdaw";
		}
		if ($name=="ayar pyatho"){
		$family = ucfirst($name);
		$file="ayar_pyatho";
		}
		if ($name=="ayar tapotwe"){
		$family = ucfirst($name);
		$file="ayar_tapotwe";
		}
		if ($name=="ayar tabaung"){
		$family = ucfirst($name);
		$file="ayar_tabaung";
		}
		if ($name=="ayar typewriter"){
		$family = ucfirst($name);
		$file="ayar_typewriter";
		}
		if ($name=="ayar thawka"){
		$family = ucfirst($name);
		$file="ayar_thawka";
		}
		if ($name=="ayar juno"){
		$family = ucfirst($name);
		$file="ayar_juno";
		}
		if ($name=="tharlon"){
		$family = ucfirst($name);
		$file="tharlon";
		}
		if ($name=="myanmar3"){
		$family = ucfirst($name);
		$file="myanmar3";
		}
		if ($name=="zawgyi-one"){
		$family = ucfirst($name);
		$file="zawgyi-one";
		}
		if ($name=="padauk"){
		$family = ucfirst($name);
		$file="padauk";
		}
		if ($name=="parabaik"){
		$family = ucfirst($name);
		$file="parabaik";
		}
		if ($name=="yunghkio"){
		$family = ucfirst($name);
		$file="yunghkio";
		}
		if ($name=="masterpiece"){
		$family="Masterpiece Uni Sans";
		$file="masterpiece";
		}
		if ($name=="mymyanmar"){
		$family="MyMyanmar Universal";
		$file="MyMMUnicodeUniversal";
		}
		if( $browser->getBrowser() == Browser::BROWSER_IE ){
			if ($ext == "ttf") {
			include_once('../includes/'.$file.'_ttf.php');
			$cons = strtoupper($file);
			$constant = $cons.'_TTF';
			printf("@font-face{ font-family:\"%s\";%s unicode-range: U+1000-U+109F, U+AA60-U+AA7B;}\n", $family, constant($constant));		
			}else{
			printf("@font-face {font-family:\"%s\";src:url('%s/fonts/%s.eot');unicode-range: U+1000-U+109F, U+AA60-U+AA7B;}\n", $family, $uri, $file);	
				}
			}else{
			if ($ext == "ttf") {
			include_once('../includes/'.$file.'_ttf.php');
			$cons = strtoupper($file);
			$constant = $cons.'_TTF';
			printf("@font-face{ font-family:\"%s\";%s unicode-range: U+1000-U+109F, U+AA60-U+AA7B;}\n", $family, constant($constant));	
			}else{
			printf("@font-face {font-family:\"%s\";src:url('%s/fonts/%s.%s');unicode-range: U+1000-U+109F, U+AA60-U+AA7B;}\n", $family, $uri, $file, $ext);	
				}
		}
		}
  } 

?>
