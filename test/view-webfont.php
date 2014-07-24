<?php
include_once('../WebFont-class.php');

$webfont = new WebFont();

$all_query_vars = $webfont->all_query_vars;

header("Content-Type: text/html");
?>
<!DOCTYPE HTML>
<html dir="ltr" lang="my-MM">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width" />
<title>MyanmaPress Web Fonts | ြမန်​မာ့​ပ​ရက်စ် | ြမန်​မာ​တို့​အ​တွက်​ ​ြမန်​မာ့​ပ​ရက်စ်</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" href="<?php echo $webfont->detected_url; ?>/css/webfont-css.php?font=ayar,ayuni,atku,aksn,anyn,awzo,awgg,attl,atdg,atzm,andw,apyt,atpt,atbg,atwt,atka,ajno,zawgyi-one,myanmar3,mymm,pdk,prb,tnln,taln,yko" />
<link href="<?php echo $webfont->detected_url; ?>/css/style.css" rel="stylesheet" type="text/css" />

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

			<h2>List of query to use in URL.</h2>
<?php
echo '<table>';
foreach ($all_query_vars as $font => $query) {

echo '<tr>';
echo '<td width="200">'.$font.'</td>';
echo '<td>';
echo '| ';
foreach( array_unique($query) as $que ){
echo $que.' | ';
	}
echo '</td>';
echo '</tr>';

}

echo '</table>';

?>
			<p>All Ayar Fonts supported.
			</p>
			<p>Also support Zawgyi-One</p>

		<div style="">You are using
		<?php echo $webfont->browser_name; ?> - <?php echo $webfont->browser_version; ?>
		</div>
			<h1>CSS links</h1>
			<div style="font-family:Ayar, Tahoma;">

			<h2>Examples and Instructions</h2>
			Sample code (rule is simple, just include desired font seperated by comma) : <br />
			<code>
				&lt;link href='<?php echo $webfont->detected_url; ?>/css/webfont-css.php?font=ayar,ayartakhu,ayarkasone,ayarnayon,ayarwazo,ayarwagaung, ayartawthalin,ayarthadingyut,ayartazaungmone,ayarnatdaw, ayarpyatho,ayartapotwe,ayartabaung,ayartypewriter, ayarthawka,ayarjuno,zawgyi-one,myanmar3' rel='stylesheet' type='text/css'/&gt;
			</code>
			<h3>Specifying font format</h3>
			<code>
			&lt;link href='<?php echo $webfont->detected_url; ?>/css/webfont-css.php?font=ayar,myanmar3&format=svg' rel='stylesheet' type='text/css'/&gt;
			</code>
			<pre>Note: Do not use space character in url to avoid unexpected problem.</pre>

			<h2>Ayar - ဧရာ</h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ြကီးရှင်သည် အာယုဝဍ္ဎနေဆးညွှန်းစာကို ဇလွန်ေဈးေဘး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Ayar Uni, Tahoma;">
			<h2>Ayar Uni - ဧရာ ယူနီ </h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Ayar Takhu, Tahoma;">
			<h2>Ayar Takhu - ဧရာ တန်ခူး</h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ြကီးရှင်သည် အာယုဝဍ္ဎနေဆးညွှန်းစာကို ဇလွန်ေဈးေဘး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Ayar Kasone, Tahoma;">
			<h2>Ayar Kasone - ဧရာ ကဆုန်</h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ြကီးရှင်သည် အာယုဝဍ္ဎနေဆးညွှန်းစာကို ဇလွန်ေဈးေဘး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Ayar Nayon, Tahoma;">
			<h2>Ayar Nayon - ဧရာ နယုန်</h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ြကီးရှင်သည် အာယုဝဍ္ဎနေဆးညွှန်းစာကို ဇလွန်ေဈးေဘး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Ayar Wazo, Tahoma;">
			<h2>Ayar Wazo - ဧရာ ဝါဆို</h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ြကီးရှင်သည် အာယုဝဍ္ဎနေဆးညွှန်းစာကို ဇလွန်ေဈးေဘး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Ayar Wagaung, Tahoma;">
			<h2>Ayar Wagaung - ဧရာ ဝါေခါင်</h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ြကီးရှင်သည် အာယုဝဍ္ဎနေဆးညွှန်းစာကို ဇလွန်ေဈးေဘး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Ayar Tawthalin, Tahoma;">
			<h2>Ayar Tawthalin - ဧရာ ေတာ်သလင်း</h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ြကီးရှင်သည် အာယုဝဍ္ဎနေဆးညွှန်းစာကို ဇလွန်ေဈးေဘး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Ayar Thadingyut, Tahoma;">
			<h2>Ayar Thadingyut - ဧရာ သီတင်းကျွတ်</h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ြကီးရှင်သည် အာယုဝဍ္ဎနေဆးညွှန်းစာကို ဇလွန်ေဈးေဘး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Ayar Tazaungmone, Tahoma;">
			<h2>Ayar Tazaungmone - ဧရာ တန်ေဆာင်မုန်း</h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ြကီးရှင်သည် အာယုဝဍ္ဎနေဆးညွှန်းစာကို ဇလွန်ေဈးေဘး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Ayar_Natdaw, Ayar Natdaw, Tahoma;">
			<h2>Ayar Natdaw - ဧရာ နတ်ေတာ်</h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ြကီးရှင်သည် အာယုဝဍ္ဎနေဆးညွှန်းစာကို ဇလွန်ေဈးေဘး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Ayar Pyatho, Tahoma;">
			<h2>Ayar Pyatho - ဧရာ ြပာသို</h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ြကီးရှင်သည် အာယုဝဍ္ဎနေဆးညွှန်းစာကို ဇလွန်ေဈးေဘး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Ayar Tapotwe, Tahoma;">
			<h2>Ayar Tapotwe - ဧရာ တပို့တွဲ</h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ြကီးရှင်သည် အာယုဝဍ္ဎနေဆးညွှန်းစာကို ဇလွန်ေဈးေဘး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Ayar Tabaung, Tahoma;">
			<h2>Ayar Tabaung - ဧရာ တေပါင်း</h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ြကီးရှင်သည် အာယုဝဍ္ဎနေဆးညွှန်းစာကို ဇလွန်ေဈးေဘး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Ayar Typewriter, Tahoma;">
			<h2>Ayar Typewriter - ဧရာ လက်နှိပ်စက်</h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ြကီးရှင်သည် အာယုဝဍ္ဎနေဆးညွှန်းစာကို ဇလွန်ေဈးေဘး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Ayar Juno, Tahoma;">
			<h2>Ayar Juno - ဧရာ ဂျူနို</h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ြကီးရှင်သည် အာယုဝဍ္ဎနေဆးညွှန်းစာကို ဇလွန်ေဈးေဘး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Ayar Thawka, Tahoma;">
			<h2>Ayar Thawka - ေသာ်က</h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ြကီးရှင်သည် အာယုဝဍ္ဎနေဆးညွှန်းစာကို ဇလွန်ေဈးေဘး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Zawgyi-One, Tahoma;">
			<h2>Zawgyi-One - ေဇာ္ဂ်ီ</h2>
						<p> သီဟိုဠ္မွ ဉာဏ္ျကီးရွင္သည္ အာယုဝၯနေဆးညွြန္းစာကို ဇလြန္ေဈးေဘး ဗာဒံပင္ထက္ အဓိ႒ာန္လ်က္ ဂဃနဏ ဖတ္ခဲ့သည္။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Myanmar3, Tahoma;">
			<h2>Myanmar3 - မြန်မာ၃</h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:My Myanmar, Tahoma;">
			<h2>My Myanmar - မိုင်မြန်မာ</h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<!--div style="font-family:Thanlwin;">
			<h2>Thanlwin - သံလွင်</h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
			</div-->
			<div style="font-family:Padauk, Tahoma;">
			<h2>Padauk - ပိတောက် </h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Parabaik, Tahoma;">
			<h2>Parabaik - ပုရပိုဒ် </h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Tharlon, Tahoma;">
			<h2>Tharlon - သာလွန် </h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<div style="font-family:Yunghkio, Tahoma;">
			<h2>Yunghkio - ယွန်းချို </h2>
						<p> သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏ ဖတ်ခဲ့သည်။  </p>
						<p> The quick brown fox jumps over the lazy dog. </p>
			</div>
			<br /><div>
			<h1>Other Instructions</h1>

			<p>You need to declare font-family in CSS like this</p>
			<code>
				h1 { font-family:Ayar, "Ayar Takhu", "Ayar Nayon";}
			</code>
			<div>
			<h2>CSS file format sample</h2>
				<ul>
					<li><a href="<?php echo $webfont->detected_url; ?>/test/view-bulletproof.php">Bulletproof CSS</a></li>
					<li><a href="<?php echo $webfont->detected_url; ?>/test/view-svg.php">SVG test</a></li>
					<li><a href="<?php echo $webfont->detected_url; ?>/test/view-ttf.php">TTF test</a></li>
					<li><a href="<?php echo $webfont->detected_url; ?>/test/view-woff.php">WOFF test</a></li>
					<li><a href="<?php echo $webfont->detected_url; ?>/test/view-webfont.php">Webfont test ( Font files are optimized for web. Most latin character are not included.)</a></li>
					<li><a href="<?php echo $webfont->detected_url; ?>/test/view-webfont-ttf.php">Webfont TTF test</a></li>
				</ul>
			</div>
	<blockquote>
	All code written by Sithu Thwin. All rights reserved.
	</blockquote></div>
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
