<?php

class WebFont {
	private $custom_server_url;
	public $browser_name;
	private $browser_version;
	private $is_mobile;
	public $mobile_browser;
	private $font_format;
	private $fonts;
	private $get_font;
	private $font_family;
	public $font_array;
	private $server_url;
	public $svg_fontname;
	public $css_style;
	public $combined_file;
	public $combined_file_name;
	public $font_query_vars;
	public $detected_url;
	public $all_query_vars;


	public function __construct($url = '', $styles_dir = 'styles', $fonts_dir = 'fonts', $default_font = array('ayar')){
		require_once('includes/Mobile_Detect.php');
	//	require_once('includes/Browser.php');
	//	$b = new Browser();
		$m = new Mobile_Detect();
	//	$browser = $b->getBrowser();
	//	$version = $b->getVersion();


		$this->m = $m;
	//	$this->b = $b;

	//	$this->browser_name = $browser;
	//	$this->browser_version = $version;


		$this->default_font = $default_font;
		$this->fonts_dir = $fonts_dir;
		$this->default_url = $url;
		$this->detected_url = $this->curPageURL();
		if($this->default_url !== '') {
		$this->server_url = preg_replace('/\/$/', '', $this->default_url);
		}else{
		$this->server_url = $this->detected_url;
		}
		$this->font_server_url = $this->server_url.'/'.$this->fonts_dir;
		$this->font_array = array(
												'Ayar' => 'ay',
												'Ayar Uni' => 'ayuni',
												'Ayar Takhu' => 'atku',
												'Ayar Kasone' => 'aksn',
												'Ayar Nayon' => 'anyn',
												'Ayar Wazo' => 'awzo',
												'Ayar Wagaung' => 'awgg',
												'Ayar Tawthalin' => 'attl',
												'Ayar Thadingyut' => 'atdg',
												'Ayar Tazaungmone' => 'atzm',
												'Ayar Natdaw' => 'andw',
												'Ayar Pyatho' => 'apyt',
												'Ayar Tapotwe' => 'atpt',
												'Ayar Tabaung' => 'atbg',
												'Ayar Typewriter' => 'atwt',
												'Ayar Juno' => 'ajno',
												'Ayar Thawka' => 'atka',
												'Myanmar3' => 'mm3',
												'Master Pieces Uni Sans' => 'mstp',
												'My Myanmar' => 'mymm',
												'Padauk' => 'pdk',
												'Parabaik' => 'prb',
												'Thanlwin' => 'tnln',
												'Tharlon' => 'taln',
												'Zawgyi-One' => 'zg1',
												'Yunghkio' => 'yko'

												);

		$this->font_format = $this->font_format();
		//$this->fonts = $this->font_face();
		//$this->get_font = $this->get_font();
		$this->font_family = $this->set_fontfamily();

		$this->styles_dir = $styles_dir;
		$this->file_path_array = $this->generate_file_name();

		$this->stylesheet_path = $this->file_path_array['full_path'];
		if( ! file_exists($this->stylesheet_path) ){
			$this->make_cssfile();
		}
		//print_r($this->get_font);
		//return $this->stylesheet_path;
		//print_r($this->font_query_vars);
	}


	public function browser_name(){
		return $this->browser_name;
	}
	private function curPageURL() {
		//http://stackoverflow.com/questions/189113/how-do-i-get-current-page-full-url-in-php-on-a-windows-iis-server
		$pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
		if ($_SERVER["SERVER_PORT"] != "80")
		{
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
		}
		else
		{
		$pageURL .= $_SERVER["SERVER_NAME"];
		}
		$current_url = sprintf('%s', $pageURL);
		return $current_url;
	}

	private function font_format(){


		//	$browser = $this->browser_name;
		//	$version = $this->browser_version;
			$is_mobile = $this->m->isMobile();
			$is_android = $this->m->is('AndroidOS');
			$android_version = $this->m->version('Android', Mobile_Detect::VERSION_TYPE_FLOAT);
			$is_ios = $this->m->is('iOS');
			$ios_version = $this->m->version('iOS', Mobile_Detect::VERSION_TYPE_FLOAT);

			//$ttf = array('Android', array('Opera', '11.1'));
			//$ie = array('Internet Explorer');
			//$svg = array('Opera', 'Apple');
			//$mobileGrade = $this->m->mobileGrade();
			//echo $mobileGrade;
/*
			if($is_mobile){
				if($is_android){
				$mobile_os = 'Android';
				//echo $android_version;
				}
				if($is_ios){
				$mobile_os = 'iOS';
				//echo $ios_version;
				}

			}else{
			$mobile_os = NULL;
			}
			//var_dump($mobile_os);

			if(isset($this->ios_version)){
			$ios_version = $this->ios_version;
			} else {
			$ios_version = NULL;
			}
			*/


			if ($this->m->is('IE')){
				if($is_mobile && $this->m->version('IE', Mobile_Detect::VERSION_TYPE_FLOAT) >= 10){
					$font_format = 'woff';
				}else{
					$font_format = 'eot';
				}
				$extra = '';
			}elseif( ( $this->m->is('Opera') && $this->m->version('Opera', Mobile_Detect::VERSION_TYPE_FLOAT) <= 9.6 ) || ( $this->m->is('iOS') && $this->m->is('Safari') && $this->m->version('Safari', Mobile_Detect::VERSION_TYPE_FLOAT) <= 4.1 ) ){
			//	echo 'This is opera 9.6 and older';
				$font_format = 'svg';
			}elseif( $is_android || ( $this->m->is('Opera') && $this->m->version('Opera', Mobile_Detect::VERSION_TYPE_FLOAT) < 11.1 ) || ( $this->m->is('Safari') && $this->m->version('Safari', Mobile_Detect::VERSION_TYPE_FLOAT) < 5.0 ) ){
		//		echo 'This is opera 11.1 and newer';
				$font_format = 'ttf';
			}elseif(isset($_GET['format'])){
			$font_format = $_GET['format'];
			} else {
				$font_format = 'woff';
			}

		return $font_format;
	}

	private function make_cssfile(){
		$browser = $this->browser_name;
		$version = $this->browser_version;
		$is_mobile = $this->m->isMobile();
		$format = $this->font_format ;
		$server_url = $this->file_path_array['baseurl'];
		$url = $this->file_path_array['font_dir_url'];
		$font_family = $this->font_family;

		$font_array = $this->font_array;
		$path = dirname(__file__);
		//echo $path;
		$styles_dir = $this->styles_dir;

		$fullpath = $path.'/'.$styles_dir;
		//echo $styles_dir;

		$all_css_content = '/* Generated from Ayar Web Font Server */ ';
//	$combined_stylesheet = '';

		$today = getdate();
		$now = sprintf('/* %s - % s - %s (%s) - %s:%s:%s  */', $today['mday'], $today['month'], $today['year'], $today['weekday'], $today['hours'], $today['minutes'], $today['seconds']);

		foreach( $font_family as $k => $font_name ) {
			$font_file = str_replace(' ', '_', strtolower($font_name));
			if($format === 'ttf') {
				$ext = 'ttf';
				$extra = 'format("truetype")';
			}
			if($format === 'woff') {
				$ext = 'woff';
				$extra = 'format("woff")';
			}
			if($format === 'otf') {
				$ext ='otf';
				$extra = 'format("opentype")';
			}
			if($format === 'svg') {
				$font = $this->find_svg_fontname($font_file);
				$ext = 'svg#'.$font;
				$format = 'svg';
				$extra ='format("svg")';
			}
			if($format === 'eot') {
				$ext = 'eot';
				$extra = 'format("embedded-opentype")';
				$local = '';
			} elseif($is_mobile) {
			$local = '';
			$unicode_range = '';
			} else {
			$local = sprintf('local("%s"),', $font_name);
			$unicode_range = 'unicode-range: U+1000-109F, U+AA60-AA7B;';
			}
		//	$stylesheet = $font_name.$format.($is_mobile?'mobile':'').$browser.'.css';
			$stylesheet = $font_name.$format.($is_mobile?'mobile':'').'.css';


			$stylesheet_path = $styles_dir.'/'.$stylesheet;
			if( file_exists($stylesheet_path) ){
			$css_content = file_get_contents($stylesheet_path);
			} else {
			$fp = fopen($stylesheet_path, 'w');
			$css_content = sprintf('@font-face {font-family: "%1$s"; font-style: normal; font-weight: normal; src: %5$ s url("%4$s/%2$s.%3$s") %6$s; %7$s}', $font_name, $font_file, $ext, $url, $local, $extra, $unicode_range);
			fwrite($fp, $css_content.$now);
			fclose($fp);
			}

			$all_css_content .= preg_replace('/\/\*(.*)\*\//','', $css_content);
		}
		$combined_file_path= $this->stylesheet_path;
		if( ! file_exists($combined_file_path) ){
		$af = fopen($combined_file_path, 'w');
		fwrite($af, $all_css_content.$now);
		fclose($af);
		}

	}

	public function redirect_css(){
		$css_file_path = $this->stylesheet_path;
		$css_file_url = $this->file_path_array['full_url'];
		if(file_exists($css_file_path)){
			header(307);
			header ("Location: $css_file_url");
		} else {
			$this->make_cssfile();
			header(307);
			header ("Location: $css_file_url");
		}
	}

	public function echo_css(){
		$css_file_path = $this->stylesheet_path;
		$expires = 60*60*24*14;
		//var_dump($css_file_path);
		if(file_exists($css_file_path)){
			header("Content-Type: text/css");
			header("Pragma: public");
			header("Cache-Control: maxage=".$expires);
			header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expires) . ' GMT');
			$css = file_get_contents($css_file_path);
		} else {
			$this->make_cssfile();
			header("Content-Type: text/css");
			header("Pragma: public");
			header("Cache-Control: maxage=".$expires);
			header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expires) . ' GMT');
			$css = file_get_contents($css_file_path);
		}
		print $css;
	}

	public function echo_js(){

	}

	private function generate_file_name(){
		$browser = $this->browser_name;
		$version = $this->browser_version;
		$is_mobile = $this->is_mobile;
		$format = $this->font_format ;
		$url = $this->server_url;
		$font_family = $this->font_family;
		$path = dirname(__file__);
		$styles_dir = $this->styles_dir;
		$basepath = $path;
		$fullpath = $basepath.'/'.$styles_dir;
		$combined_stylesheet = '';
		foreach( $font_family as $k => $font_name ) {
		$stylesheet = $font_name.$format.($is_mobile?'mobile':'').$browser.'.css';
		$stylesheet_path = $styles_dir.$stylesheet;
		$combined_stylesheet .= $stylesheet_path;
		}
		$combined_file_name = md5($combined_stylesheet).'.css';
		$combined_file_path = $styles_dir.'/'.$combined_file_name;
		//echo $combined_file_name;
		$file_path_array = array(
									'full_path' => $basepath.'/'.$combined_file_path,
									'full_url' => $url.'/'.$combined_file_path,
									'basepath' => $basepath,
									'baseurl' => $this->server_url,
									'style_dir_path' => $fullpath,
									'style_dir_url' => $url.'/'.$styles_dir,
									'stylesheet_name' => $combined_file_name,
									'style_dir_name' => $styles_dir,
									'stylesheet_path' => $combined_file_path,
									'font_dir_url'	=> $url.'/'.$this->fonts_dir
									);
		return $file_path_array;
	}

	private function font_query_vars(){
		$fonts_array_key = array_keys($this->font_array);

		foreach ($fonts_array_key as $k => $font_name){
			$lower[$k] = strtolower($font_name);
			$underscore[$k] = str_replace(' ', '_', $lower[$k]);
			$nodash[$k] = str_replace('-', '_', $underscore[$k]);
			$nospace[$k] = str_replace('_','', $nodash[$k]);
			$noayar[$k] = str_replace(array('ayar_', '-one'), '', $underscore[$k]);
			$all_query_vars[$k] = array($underscore[$k], $nodash[$k], $nospace[$k], $noayar[$k], $this->font_array[$font_name]);
		}
		$this->all_query_vars = array_combine($fonts_array_key, $all_query_vars);

		$lower_pair = array_combine($lower, $fonts_array_key);
		$us_pair = array_combine($underscore, $fonts_array_key);
		$nodash_pair = array_combine($nodash, $fonts_array_key);
		$nospace_pair = array_combine($nospace, $fonts_array_key);
		$noayar_pair = array_combine($noayar, $fonts_array_key);
		$fonts_array = array_flip($this->font_array);
		$this->font_query_vars = array_merge($lower_pair, $us_pair, $nodash_pair, $nospace_pair, $noayar_pair, $fonts_array);
		return $this->font_query_vars;
	}

	private function get_font(){
		if(isset($_GET['font'])){
			$query = $_GET['font'];
			$query_to_array = explode(',', $query);
			$lookup_array = array_keys($this->font_query_vars());

			$get_font = array_intersect($query_to_array, $lookup_array);
			if(count($get_font) != '0'){
				$this->get_font = $get_font;
			//	echo 'This is true';
			} else {
				$this->get_font = $this->default_font;
			}
		} else {
			$this->get_font = $this->default_font;
		}
		return $this->get_font;
	}

	private function set_fontfamily(){
		$get_font = $this->get_font();
		$fonts = $this->font_query_vars();
		$ff_array = array();
		if($get_font){
		foreach($get_font as $v) {
		$fontfamily = $fonts[$v];
		$ff_array[$v] = $fontfamily;
		}
		//print_r($ff_array);
		$ff_array = array_unique($ff_array);
		//$ff_array = array_flip($ff_array);
		$ff_array = array_intersect(array_keys($this->font_array), array_values($ff_array));

		$ff_array = array_values($ff_array);

		return $ff_array;
		} else {
		return;
		}
	}

	private function find_svg_fontname($file){
		$find_path = $this->file_path_array;
		if($this->server_url == $this->detected_url){
			$filepath = $find_path['basepath'].'/'.$this->fonts_dir.'/'.$file.'.svg';
		} else {
			$filepath = $this->font_server_url.'/'.$file.'.svg';
		}
		if (file_exists($filepath)) {
			$content = file_get_contents($filepath, NULL, NULL, 0, 512);
			$fontname = preg_match('/<font id="(.+)"/U', $content, $font);
			return $font[1];
		} else {
			return;
		}
	}

}


?>
