<?php
header("Content-Type: text/css");
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
$uri=curPageURL();
require_once('../includes/Browser.php');
$browser = new Browser();
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
								"ayar pyatho pub",	#15
								"ayar natdaw pub",	#16
								"ayar_natdaw_pub",	#17
								"ayar tabaung pub",	#18
								"ayar tapotwe pub",	#19
								"ayar thawka pub",	#20
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
								"aptp",				#36
								"andp",				#37
								"atbp",				#38
								"atpp",				#39
								"atkp",				#40
								"mm3",				#41
								"wmm3",				#42
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
							"ayar_pyatho_pub",	#15
							"ayarnatdawpub",	#16
							"ayarnatdawpub",	#17
							"ayar_tabaung_pub",	#18
							"ayar_tapotwe_pub",	#19
							"ayar_thawka_pub",	#20
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
							"ayar_pyatho_pub",	#36
							"ayarnatdawpub",	#37
							"ayar_tabaung_pub",	#38
							"ayar_tapotwe_pub",	#39
							"ayar_thawka_pub",	#40
							"myanmar3",			#41
							"webmm3",			#42
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
						"ayar_pyatho_pub",	#16
						"ayarnatdawpub",	#17
						"ayar_tabaung_pub",	#18
						"ayar_tapotwe_pub",	#19
						"ayar_thawka_pub",	#20
						"myanmar3",			#21
						"webmm3",			#22
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
		$family="ayar";
		$file="ayar";
		}
		if ($name=="ayar takhu"){
		$family="ayar takhu";
		$file="ayar_takhu";
		}
		if ($name=="ayar kasone"){
		$family="ayar kasone";
		$file="ayar_kasone";
		}
		if ($name=="ayar nayon"){
		$family="ayar nayon";
		$file="ayar_nayon";
		}
		if ($name=="ayar wazo"){
		$family="ayar wazo";
		$file="ayar_wazo";
		}
		if ($name=="ayar wagaung"){
		$family="ayar wagaung";
		$file="ayar_wagaung";
		}
		if ($name=="ayar tawthalin"){
		$family="ayar tawthalin";
		$file="ayar_tawthalin";
		}
		if ($name=="ayar thadingyut"){
		$family="ayar thadingyut";
		$file="ayar_thadingyut";
		}
		if ($name=="ayar tazaungmone"){
		$family="ayar tazaungmone";
		$file="ayar_tazaungmone";
		}
		if ($name=="ayar natdaw"){
		$family="ayar natdaw";
		$file="ayar_natdaw";
		}
		if ($name=="ayar pyatho"){
		$family="ayar pyatho";
		$file="ayar_pyatho";
		}
		if ($name=="ayar tapotwe"){
		$family="ayar tapotwe";
		$file="ayar_tapotwe";
		}
		if ($name=="ayar tabaung"){
		$family="ayar tabaung";
		$file="ayar_tabaung";
		}
		if ($name=="ayar typewriter"){
		$family="ayar typewriter";
		$file="ayar_typewriter";
		}
		if ($name=="ayar thawka"){
		$family="ayar thawka";
		$file="ayar_thawka";
		}
		if ($name=="ayar_thawka_pub"){
		$family="ayar_thawka_pub";
		$file="ayar_thawka_pub";
		}
		if ($name=="ayar_pyatho_pub"){
		$family="ayar_pyatho_pub";
		$file="ayar_pyatho_pub";
		}
		if ($name=="ayar_tapotwe_pub"){
		$family="ayar_tapotwe_pub";
		$file="ayar_tapotwe_pub";
		}
		if ($name=="ayar_tabaung_pub"){
		$family="ayar_tabaung_pub";
		$file="ayar_tabaung_pub";
		}
		if ($name=="ayarnatdawpub"){
		$family="ayarnatdawpub";
		$file="ayarnatdawpub";
		}
		if ($name=="ayar juno"){
		$family="ayar juno";
		$file="ayar_juno";
		}
		if ($name=="myanmar3"){
		$family="myanmar3";
		$file="myanmar3";
		}
		if ($name=="zawgyi-one"){
		$family="zawgyi-one";
		$file="zawgyi-one";
		}
		if ($name=="webmm3"){
		$family="mm3web";
		$file="mm3web";
		}
		if ($name=="padauk"){
		$family="padauk";
		$file="padauk";
		}
		if ($name=="parabaik"){
		$family="parabaik";
		$file="parabaik";
		}
		if ($name=="yunghkio"){
		$family="yunghkio";
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
			echo "@font-face {
font-family:".$family.";
src:url('".$uri."/fonts/".$file.".".$ext."');
unicode-range: U+1000-U+109F, U+AA60-U+AA7B;
}
";
			}else{
			echo "@font-face {
font-family:".$family.";
src:local('".$family."'),url('".$uri."/fonts/".$file.".".$ext."') format('".$format."');
unicode-range: U+1000-U+109F, U+AA60-U+AA7B;
}
";
		}
  }
  }else{
  if(isset($_GET['format'])){
	$fmt=$_GET['format'];
$filter = array("ayar","ayar takhu","ayar kasone","ayar nayon","ayar wazo","ayar wagaung","ayar tawthalin","ayar thadingyut","ayar tazaungmone","ayar natdaw","ayar pyatho","ayar tapotwe","ayar tabaung","ayar juno","ayar typewriter","ayar thawka","ayar_pyatho_pub","ayarnatdawpub","ayar_tabaung_pub","ayar_tapotwe_pub","ayar_thawka_pub","myanmar3","webmm3","zawgyi-one","padauk","parabaik" );
	$fonts=$filter;
	foreach ($fonts as $font){
		$name= $font;
		if ($name=="ayar"){
		$file="ayar";
		}
		if ($name=="ayar takhu"){
		$file="ayar_takhu";
		}
		if ($name=="ayar kasone"){
		$file="ayar_kasone";
		}
		if ($name=="ayar nayon"){
		$file="ayar_nayon";
		}
		if ($name=="ayar wazo"){
		$file="ayar_wazo";
		}
		if ($name=="ayar wagaung"){
		$file="ayar_wagaung";
		}
		if ($name=="ayar tawthalin"){
		$file="ayar_tawthalin";
		}
		if ($name=="ayar thadingyut"){
		$file="ayar_thadingyut";
		}
		if ($name=="ayar tazaungmone"){
		$file="ayar_tazaungmone";
		}
		if ($name=="ayar natdaw"){
		$file="ayar_natdaw";
		}
		if ($name=="ayar pyatho"){
		$file="ayar_pyatho";
		}
		if ($name=="ayar tapotwe"){
		$file="ayar_tapotwe";
		}
		if ($name=="ayar tabaung"){
		$file="ayar_tabaung";
		}
		if ($name=="ayar typewriter"){
		$file="ayar_typewriter";
		}
		if ($name=="ayar thawka"){
		$file="ayar_thawka";
		}
		if ($name=="ayar_thawka_pub"){
		$file="ayar_thawka_pub";
		}
		if ($name=="ayar_pyatho_pub"){
		$file="ayar_pyatho_pub";
		}
		if ($name=="ayarnatdawpub"){
		$file="ayarnatdawpub";
		}
		if ($name=="ayar_tabaung_pub"){
		$file="ayar_tabaung_pub";
		}
		if ($name=="ayar_tapotwe_pub"){
		$file="ayar_tapotwe_pub";
		}
		if ($name=="ayar juno"){
		$file="ayar_juno";
		}
		if ($name=="myanmar3"){
		$file="myanmar3";
		}
		if ($name=="zawgyi-one"){
		$file="zawgyi-one";
		}
		if ($name=="webmm3"){
		$file="mm3web";
		}
		if ($name=="padauk"){
		$file="padauk";
		}
		if ($name=="parabaik"){
		$file="parabaik";
		}
		if ($name=="yunghkio"){
		$file="yunghkio";
		}
		if ($name=="masterpiece"){
		$file="masterpiece";
		}
		if ($name=="mymyanmar"){
		$file="MyMMUnicodeUniversal";
		}
			if( $browser->getBrowser() == Browser::BROWSER_IE ){
			echo "@font-face {
font-family:".$name.";
src:url('".$uri."/fonts/".$file.".".$ext."');
unicode-range: U+1000-U+109F, U+AA60-U+AA7B;
}
";
			}else{
			echo "@font-face {
font-family:".$name.";
src:local('".$name."'),url('".$uri."/fonts/".$file.".".$ext."') format('".$format."');
unicode-range: U+1000-U+109F, U+AA60-U+AA7B;
}
";
		}
		}
	}
	}
}  else {
	$filter = array("ayar","ayar takhu","ayar kasone","ayar nayon","ayar wazo","ayar wagaung","ayar tawthalin","ayar thadingyut","ayar tazaungmone","ayar natdaw","ayar pyatho","ayar tapotwe","ayar tabaung","ayar juno","ayar typewriter","ayar thawka","ayar_pyatho_pub","ayarnatdawpub","ayar_tabaung_pub","ayar_tapotwe_pub","ayar_thawka_pub","myanmar3","webmm3","zawgyi-one","padauk","parabaik" );
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
		$file="ayar";
		}
		if ($name=="ayar takhu"){
		$file="ayar_takhu";
		}
		if ($name=="ayar kasone"){
		$file="ayar_kasone";
		}
		if ($name=="ayar nayon"){
		$file="ayar_nayon";
		}
		if ($name=="ayar wazo"){
		$file="ayar_wazo";
		}
		if ($name=="ayar wagaung"){
		$file="ayar_wagaung";
		}
		if ($name=="ayar tawthalin"){
		$file="ayar_tawthalin";
		}
		if ($name=="ayar thadingyut"){
		$file="ayar_thadingyut";
		}
		if ($name=="ayar tazaungmone"){
		$file="ayar_tazaungmone";
		}
		if ($name=="ayar natdaw"){
		$file="ayar_natdaw";
		}
		if ($name=="ayar pyatho"){
		$file="ayar_pyatho";
		}
		if ($name=="ayar tapotwe"){
		$file="ayar_tapotwe";
		}
		if ($name=="ayar tabaung"){
		$file="ayar_tabaung";
		}
		if ($name=="ayar typewriter"){
		$file="ayar_typewriter";
		}
		if ($name=="ayar thawka"){
		$file="ayar_thawka";
		}
		if ($name=="ayar_thawka_pub"){
		$file="ayar_thawka_pub";
		}
		if ($name=="ayar_pyatho_pub"){
		$file="ayar_pyatho_pub";
		}
		if ($name=="ayarnatdawpub"){
		$file="ayarnatdawpub";
		}
		if ($name=="ayar_tabaung_pub"){
		$file="ayar_tabaung_pub";
		}
		if ($name=="ayar_tapotwe_pub"){
		$file="ayar_tapotwe_pub";
		}
		if ($name=="ayar juno"){
		$file="ayar_juno";
		}
		if ($name=="myanmar3"){
		$file="myanmar3";
		}
		if ($name=="zawgyi-one"){
		$file="zawgyi-one";
		}
		if ($name=="webmm3"){
		$file="mm3web";
		}
		if ($name=="padauk"){
		$file="padauk";
		}
		if ($name=="parabaik"){
		$file="parabaik";
		}
		if ($name=="yunghkio"){
		$file="yunghkio";
		}
		if ($name=="masterpiece"){
		$file="masterpiece";
		}
		if ($name=="mymyanmar"){
		$file="MyMMUnicodeUniversal";
		}
			if( $browser->getBrowser() == Browser::BROWSER_IE ){
			echo "@font-face {
font-family:".$name.";
src:url('".$uri."/fonts/".$file.".".$ext."');
unicode-range: U+1000-U+109F, U+AA60-U+AA7B;
}
";
			}else{
			echo "@font-face {
font-family:".$name.";
src:local('".$name."'),url('".$uri."/fonts/".$file.".".$ext."') format('".$format."');
unicode-range: U+1000-U+109F, U+AA60-U+AA7B;
}
";
		}
		}
  } 

?>
