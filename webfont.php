<?php

class WebFont {

	private $is_mobile;
	private $font_format;
	private $get_font;
	private $font_family;
	public $font_array;
	private $server_url;
	public $font_query_vars;
	public $detected_url;
	public $all_query_vars;


	public function __construct($url = '', $styles_dir = 'styles', $fonts_dir = 'fonts', $default_font = array('ayar')){
		require_once('includes/Mobile_Detect.php');

		$m = new Mobile_Detect();
		$this->m = $m;
		$this->is_mobile = $this->m->isMobile();
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

		$this->font_family = $this->set_fontfamily();

		$this->styles_dir = $styles_dir;
		$this->file_path_array = $this->generate_file_name();

		$this->stylesheet_path = $this->file_path_array['full_path'];

		$this->bulletproof_css_path = $this->file_path_array['bulletproof_path'];

	}

	private function init(){
		$stylesheet_path = $this->stylesheet_path;
		if( ! file_exists($stylesheet_path) ){
			$this->make_cssfile();
		}
		$bulletproof_css_path = $this->bulletproof_css_path;
		if( ! file_exists($bulletproof_css_path) ){
			$this->bulletproof_css();
		}
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
			$is_mobile = $this->is_mobile;
			$is_android = $this->m->is('AndroidOS');
			$android_version = $this->m->version('Android', Mobile_Detect::VERSION_TYPE_FLOAT);
			$is_ios = $this->m->is('iOS');
			$ios_version = $this->m->version('iOS', Mobile_Detect::VERSION_TYPE_FLOAT);


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

		$all_css_content = "/* Generated from Ayar Web Font Server */ \n";
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

			$stylesheet = $font_name.$format.($is_mobile?'mobile':'').'.css';


			$stylesheet_path = $styles_dir.'/'.$stylesheet;

			if( file_exists($stylesheet_path) ){
			$css_content = file_get_contents($stylesheet_path);
			} else {
			$fp = fopen($stylesheet_path, 'w') or die("File is not writable or directory does not exist.");
			$css_content = sprintf('@font-face {font-family: "%1$s"; font-style: normal; font-weight: normal; src: %5$ s url("%4$s/%2$s.%3$s") %6$s; %7$s}', $font_name, $font_file, $ext, $url, $local, $extra, $unicode_range);
			fwrite($fp, $css_content.$now);
			fclose($fp);
			}

			$all_css_content .= preg_replace('/\/\*(.*)\*\//','', $css_content)."\n";

		}

		$combined_file_path = $this->stylesheet_path;
		if( ! file_exists($combined_file_path) ){
		$af = fopen($combined_file_path, 'w') or die("File is not writable or directory does not exist.");
		fwrite($af, $all_css_content.$now);
		fclose($af);
		}


	}

	private function bulletproof_css(){

		$is_mobile = $this->m->isMobile();

		$server_url = $this->file_path_array['baseurl'];
		$url = $this->file_path_array['font_dir_url'];
		$font_family = $this->font_family;

		$font_array = $this->font_array;
		$path = dirname(__file__);

		$styles_dir = $this->styles_dir;

		$fullpath = $path.'/'.$styles_dir;

		$all_bulletproof_content = "/* Bulletproof CSS Generated from Ayar Web Font Server */\n ";

		$today = getdate();
		$now = sprintf('/* %s - % s - %s (%s) - %s:%s:%s  */', $today['mday'], $today['month'], $today['year'], $today['weekday'], $today['hours'], $today['minutes'], $today['seconds']);

		foreach( $font_family as $k => $font_name ) {
			$font_file = str_replace(' ', '_', strtolower($font_name));

				$unicode_range = 'unicode-range: U+1000-109F, U+AA60-AA7B;';


//			$stylesheet = $font_name.$format.($is_mobile?'mobile':'').'.css';

//			$bulletproof_path = $styles_dir.'/bulletproof-'.$stylesheet;
//			if( file_exists($bulletproof_path) ){
//				$bulletproof_content = file_get_contents($bulletproof_path);
//			} else {
				$svgname = $this->find_svg_fontname($font_file);
	//			$fp = fopen($bulletproof_path, 'w');
				$bulletproof_content = sprintf("@font-face {\n\tfont-family: '%1\$s';\n\tfont-style: normal;\n\tfont-weight: normal;\n\tsrc: url('%4\$s/%2\$s.eot');\n\tsrc: url('%4\$s/%2\$s.eot?#iefix') format('embedded-opentype'),\n\turl('%4\$s/%2\$s.woff') format('woff'),\n\turl('%4\$s/%2\$s.svg#%3\$s') format('svg'),\n\turl('%4\$s/%2\$s.ttf')  format('truetype');\n\t%5\$s\n}", $font_name, $font_file, $svgname, $url, $unicode_range);
	//			fwrite($fp, $bulletproof_content.$now);
	//			fclose($fp);
	//		}

			$all_bulletproof_content .= preg_replace('/\/\*(.*)\*\//','', $bulletproof_content)."\n";
		}
		$bulletproof_file_path = $this->bulletproof_css_path;
		if( ! file_exists($bulletproof_file_path) ){
		$af = fopen($bulletproof_file_path, 'w') or die("File is not writable or directory does not exist.");
		fwrite($af, $all_bulletproof_content.$now);
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
			$this->init();
			header(307);
			header ("Location: $css_file_url");
		}
	}

	public function echo_css(){

		$css_file_path = $this->stylesheet_path;
		$expires = 60*60*24*14;

		if(file_exists($css_file_path)){
			header("Content-Type: text/css");
			header("Pragma: public");
			header("Cache-Control: maxage=".$expires);
			header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expires) . ' GMT');
			$css = file_get_contents($css_file_path);
		} else {
			$this->init();
			header("Content-Type: text/css");
			header("Pragma: public");
			header("Cache-Control: maxage=".$expires);
			header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expires) . ' GMT');
			$css = file_get_contents($css_file_path);
		}
		print $css;
	}

	public function output_css(){

		$css_file_path = $this->stylesheet_path;
		$expires = 60*60*24*14;
		$file_name = $this->file_path_array['stylesheet_name_nomd5'];
		if(file_exists($css_file_path)){
			header('Content-Description: File Transfer');
			header('Content-Type: text/css');
			header('Content-Disposition: attachment; filename='.preg_replace('/Ayar|\s/', '', $file_name));
			header('Content-Transfer-Encoding: text');
			header("Pragma: public");
			header("Cache-Control: maxage=".$expires);
			header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expires) . ' GMT');
			header('Content-Length: ' . filesize($css_file_path));
			ob_clean();
			flush();
			readfile($css_file_path);
		} else {
			$this->init();
			header('Content-Description: File Transfer');
			header('Content-Type: text/css');
			header('Content-Disposition: attachment; filename='.preg_replace('/Ayar|\s/', '', $file_name));
			header('Content-Transfer-Encoding: text');
			header("Pragma: public");
			header("Cache-Control: maxage=".$expires);
			header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expires) . ' GMT');
			header('Content-Length: ' . filesize($css_file_path));
			ob_clean();
			flush();
			readfile($css_file_path);
		}
		//print $css;
	}

	public function echo_js(){

	}

	public function get_bulletproof(){

		$expires = 60*60*24*14;
		$css_file = $this->file_path_array['bulletproof_path'];
		$file_name = $this->file_path_array['bulletproof_file_name_nomd5'];
		if(file_exists($css_file)){
			header('Content-Description: File Transfer');
			header('Content-Type: text/css');
			header('Content-Disposition: attachment; filename='.preg_replace('/Ayar|\s/', '', $file_name));
			header('Content-Transfer-Encoding: text');
			header("Pragma: public");
			header("Cache-Control: maxage=".$expires);
			header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expires) . ' GMT');
			header('Content-Length: ' . filesize($css_file));
			ob_clean();
			flush();
			readfile($css_file);
			exit;
		//echo $this->file_path_array['bulletproof_url'];
		}else{
			$this->init();
			header('Content-Description: File Transfer');
			header('Content-Type: text/css');
			header('Content-Disposition: attachment; filename='.preg_replace('/Ayar|\s/', '', $file_name));
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
	}

	public function generate_bulletproof(){

		$css_file = $this->file_path_array['bulletproof_path'];

		if(file_exists($css_file)){
			$css = file_get_contents($css_file);
		} else {
			$this->init();

			$css = file_get_contents($css_file);
		}
		echo $css;
	}

	private function generate_file_name(){

		$is_mobile = $this->is_mobile;
		$format = $this->font_format ;
		$url = $this->server_url;
		$font_family = $this->font_family;
		$path = dirname(__file__);
		$styles_dir = $this->styles_dir;
		$basepath = $path;
		$fullpath = $basepath.'/'.$styles_dir;
		$combined_stylesheet = '';
		$bp_stylesheet_path = '';
		foreach( $font_family as $k => $font_name ) {
		$stylesheet = $font_name.$format.($is_mobile?'mobile':'');

		$bp_stylesheet_path .= $font_name;
		$combined_stylesheet .= $stylesheet;
		}

		$combined_file_name = md5($combined_stylesheet).'.css';
		$combined_file_name_nomd5 = $combined_stylesheet.'.css';
		$combined_file_path = $styles_dir.'/'.$combined_file_name;
		$bulletproof_file_name = md5($bp_stylesheet_path).'.css';
		$bulletproof_file_name_nomd5 = $bp_stylesheet_path.'.css';
		$bulletproof_path = $styles_dir.'/bulletproof-'.$bulletproof_file_name;
		//echo $combined_file_name;
		$file_path_array = array(
									'full_path' => $basepath.'/'.$combined_file_path,
									'full_url' => $url.'/'.$combined_file_path,
									'basepath' => $basepath,
									'baseurl' => $this->server_url,
									'style_dir_path' => $fullpath,
									'style_dir_url' => $url.'/'.$styles_dir,
									'stylesheet_name' => $combined_file_name,
									'stylesheet_name_nomd5' => $combined_file_name_nomd5,
									'style_dir_name' => $styles_dir,
									'stylesheet_path' => $combined_file_path,
									'bulletproof_file_name' => $bulletproof_file_name,
									'bulletproof_file_name_nomd5' => $bulletproof_file_name_nomd5,
									'bulletproof_path' => $bulletproof_path,
									'bulletproof_url' => $url.'/'.$bulletproof_path,
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
		if( isset($_GET['font']) ){
			$query = $_GET['font'];
			$query_to_array = explode(',', $query);
			$lookup_array = array_keys($this->font_query_vars());

			$query_font = array_intersect($query_to_array, $lookup_array);
			//var_dump($query_font);
			if( ! empty($query_font) ){
				$this->get_font = $query_font;
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
