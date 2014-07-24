<?php
include_once('../WebFont-class.php');
$webfont = new WebFont();
$url =$webfont->detected_url;
header("Content-Type: text/html");
?>
<?php if ($_POST) {
	$post_data = $_POST;
	$query = '';
	$filename = '';
		foreach($post_data as $k => $v){
			if($k != 'Generate'){
				$query .= $v.',';
				$filename .= $k;
				}
		}
		$query = preg_replace('/,$/','',$query);
		$postdata = http_build_query(
			array(
				'font' => $query
			)
		);

		$opts = array('http' =>
			array(
				'method'  => 'GET',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $postdata
			)
		);

		$css_file = $url.'/bulletproof.php?'.$postdata;
					header('Content-Description: File Transfer');
					header('Content-Type: text/css');
					header('Content-Disposition: attachment; filename='.$filename.'.css');
					header('Content-Transfer-Encoding: text');
					header("Pragma: public");
					header("Cache-Control: maxage=".$expires);
					header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expires) . ' GMT');
					header('Content-Length: ' . filesize($css_file));
					ob_clean();
					flush();
		readfile($css_file);
		exit;
	}


?>

<!DOCTYPE HTML>
<html dir="ltr" lang="my-MM">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width" />
<title>MyanmaPress Web Fonts | ြမန်​မာ့​ပ​ရက်စ် | ြမန်​မာ​တို့​အ​တွက်​ ​ြမန်​မာ့​ပ​ရက်စ်</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/cssfile.php?font=ayar,ayuni,atku,aksn,anyn,awzo,awgg,attl,atdg,atzm,andw,apyt,atpt,atbg,atwt,atka,ajno,zawgyi-one,myanmar3,mymm,pdk,prb,tnln,taln,yko" />
<link href="/css/style.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div id="templatemo_outer_wrapper">

  <div id="templatemo_wrapper">

   	<div id="templatemo_header">
  	<header id="branding" role="banner">
	        <div id="site_title">
					<hgroup>
			<h1>
	<a href="http://myanmapress.com/">
<!--img src="http://myanmapress.com/wp-content/themes/bluemotion/images/logo.png" width="250" height="50" alt="CDN MyanmaPress" /-->
</a>


			 <span id="site-description" style="color:#fff;">ြမန်​မာ​တို့​အ​တွက်​ ​ြမန်​မာ့​ပ​ရက်စ်</span>
	</h1>

</hgroup>


            </div> <!-- end of site_title -->

    </div> <!-- end of header -->


   <div id="templatemo_menu">

			<nav id="access" role="navigation">

				<ul class="menu"><li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14"><a title="ဆိုဒ် အဖွင့်စာမျက်နှာ" href="<?php echo $webfont->detected_url; ?>/">​အ​ဖွင့်​စာ​မျက်​နှာ</a></li>
<li id="menu-item-179" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-179"><a title="ဘေလာ့ဂ်စာမူများ" href="http://myanmapress.com/blog/">ဘေလာ့ဂ်</a></li>
<li id="menu-item-180" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-180"><a title="အကူအညီေတာင်းရန်" href="http://myanmapress.com/help/">အကူအညီ</a></li>
<li id="menu-item-181" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-181"><a title="ဆိုဒ်အေြကာင်း သိေကာင်းစရာများ" href="http://myanmapress.com/about/">သိ​ေကာင်း​စ​ရာ​များ</a></li>
</ul>
  <ul>
<li><a href="http://myanmapress.com/wp-login.php">ဝင်ပါ</a></li>
<li><a href="http://myanmapress.com/wp-login.php?action=register">မှတ်ပံုတင်ပါ</a>
</li>
</ul>

			</nav><!-- #access -->
  </header>
      </div> <!-- end of templatemo_menu -->

      	  <div id="templatemo_main_top"></div>
          <div id="templatemo_main">
<div id="templatemo_content">

<div id="content" class="widecolumn">
<h1>MyanmaPress Web Fonts</h1>

			<h2>Check the font you want in generated bulletproof CSS file.</h2>
<form method='POST' action="#">
<table>
<tr>
<td><input type="checkbox" value="ay" name="Ayar" /><label for="Ayar">Ayar</label></td>
<td><input type="checkbox" value="atku" name="Takhu" /><label for="Ayar Takhu">Ayar Takhu</label></td>
<td><input type="checkbox" value="aksn" name="Kasone" /><label for="Ayar Kasone">Ayar Kasone</label></td>
<td><input type="checkbox" value="anyn" name="Nayon" /><label for="Ayar Nayon">Ayar Nayon</label></td>
<td><input type="checkbox" value="awzo" name="Wazo" /><label for="Ayar Wazo">Ayar Wazo</label></td>
<td><input type="checkbox" value="awgg" name="Wagaung" /><label for="Ayar Wagaung">Ayar Wagaung</label></td>
<td><input type="checkbox" value="attl" name="Ayar Tawthalin" /><label for="Ayar Tawthalin">Ayar Tawthalin</label></td>
<td><input type="checkbox" value="atdg" name="Ayar Thadingyut" /><label for="Ayar Thadingyut">Ayar Thadingyut</label></td>
</tr>
<tr>
<td><input type="checkbox" value="atzm" name="Tazaungmone" /><label for="Ayar Tazaungmone">Ayar Tazaungmone</label></td>
<td><input type="checkbox" value="andw" name="Natdaw" /><label for="Ayar Natdaw">Ayar Natdaw</label></td>
<td><input type="checkbox" value="apyt" name="Pyatho" /><label for="Ayar Pyatho">Ayar Pyatho</label></td>
<td><input type="checkbox" value="atpt" name="Tapotwe" /><label for="Ayar Tapotwe">Ayar Tapotwe</label></td>
<td><input type="checkbox" value="atbg" name="Tabaung" /><label for="Ayar Tabaung">Ayar Tabaung</label></td>
<td><input type="checkbox" value="ajno" name="Juno" /><label for="Ayar Juno">Ayar Juno</label></td>
<td><input type="checkbox" value="atwt" name="Typewriter" /><label for="Ayar Typewriter">Ayar Typewriter</label></td>
<td><input type="checkbox" value="atka" name="Thawka" /><label for="Ayar Thawka">Ayar Thawka</label></td>
</tr>
<tr>
<td><input type="checkbox" value="zg1" name="Zawgyi-One" /><label for="Zawgyi-One">Zawgyi-One</label></td>
<td><input type="checkbox" value="mm3" name="Myanmar3" /><label for="Myanmar3">Myanmar3</label></td>
<td><input type="checkbox" value="pdk" name="Padauk" /><label for="Padauk">Padauk</label></td>
<td><input type="checkbox" value="prb" name="Parabaik" /><label for="Parabaik">Parabaik</label></td>
<td><input type="checkbox" value="taln" name="Tharlon" /><label for="Tharlon">Tharlon</label></td>
<td><input type="checkbox" value="yko" name="Yunghkio" /><label for="Yunghkio">Yunghkio</label></td>
<td><input type="checkbox" value="mymm" name="MyMyanmar" /><label for="My Myanmar">My Myanmar</label></td>
<td><input type="checkbox" value="ayuni" name="AyarUni" /><label for="Ayar Uni">Ayar Uni</label></td>
</tr>
</table>
<input type="submit" name="Generate" value="Generate"/>
</form>
</div>
</div>


        	<div class="cleaner"></div>
        </div> <!-- end of templatemo_main -->

        <div id="templatemo_main_bottom"></div>

 	<footer id="colophon" role="contentinfo">
         <div id="templatemo_footer">

       		 မူပိုင် &copy; 2011 <a href="http://myanmapress.com">ြမန်​မာ့​ပ​ရက်စ်</a>. မူပိုင်<br />  @credits <a href="http://www.iwebsitetemplate.com" target="_parent">Website Templates</a>, <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>


        </div> <!-- end of templatemo_footer -->
  	</footer><!-- #colophon -->
    </div>
	<!-- end of wrapper -->

</div> <!-- end of outter wrapper -->

</html>
