<?php
/*
Plugin Name: Simple View
Plugin URI: http://www.simplelib.com/?p=122
Description: This plugin is Wordpress shell for javascript <a href="http://randomous.com/floatbox/home">FloatBox</a> library by Byron McGregor. FloatBox is similar to Lightview, Lightbox, Shadowbox, Fancybox, Thickbox, etc. Visit <a href="http://www.simplelib.com/">SimpleLib blog</a> for more details.
Version: 1.0.12
Author: minimus
Author URI: http://blogcoding.ru
*/

/*  Copyright 2009, minimus  (email : minimus.blogovod@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (!class_exists("WpSimpleView")) {
	class WpSimpleView {
		
		var $adminOptionsName = "SimpleViewAdminOptions";
		var $pluginOptionsName = "SimpleViewPluginOptions";
		var $sviewInitOptions = array(
			'licenseKey' => 			''				,// License Key 
			/*** <General Options> ***/
			'theme' =>            'auto'    ,// 'auto'|'black'|'white'|'blue'|'yellow'|'red'|'custom'
			'colorImages' =>      'black'   ,// 'black' | 'white' | 'blue' | 'yellow' | 'red' | 'custom' ('black')
			'colorHTML' =>        'white'   ,// 'black' | 'white' | 'blue' | 'yellow' | 'red' | 'custom' ('white')
			'colorVideo' =>       'blue'    ,// 'black' | 'white' | 'blue' | 'yellow' | 'red' | 'custom' (blue)
			'padding' =>           24       ,// pixels
			'panelPadding' =>      8        ,// pixels
			'overlayOpacity' =>    55       ,// 0-100
			'shadowType' =>       'drop'    ,// 'drop'|'halo'|'none'
			'shadowSize' =>        12       ,// 8|12|16|24
			'roundCorners' =>     'all'     ,// 'all'|'top'|'none'
			'cornerRadius' =>      12       ,// 8|12|20
			'roundBorder' =>       1        ,// 0|1
			'outerBorder' =>       4        ,// pixels
			'innerBorder' =>       1        ,// pixels
			'autoFitImages' =>     true     ,// true|false
			'resizeImages' =>      true     ,// true|false
			'autoFitOther' =>      false    ,// true|false
			'resizeOther' =>       false    ,// true|false
			'resizeTool' =>       'cursor'  ,// 'cursor'|'topleft'|'both'
			'infoPos' =>          'bl'      ,// 'tl'|'tc'|'tr'|'bl'|'bc'|'br'
			'controlPos' =>       'br'      ,// 'tl'|'tr'|'bl'|'br'
			'centerNav' =>         false    ,// true|false
			'boxLeft' =>          'auto'    ,// 'auto'|pixels|'[-]xx%'
			'boxTop' =>           'auto'    ,// 'auto'|pixels|'[-]xx%'
			'enableDragMove' =>    false    ,// true|false
			'stickyDragMove' =>    true     ,// true|false
			'enableDragResize' =>  false    ,// true|false
			'stickyDragResize' =>  true     ,// true|false
			'draggerLocation' =>  'frame'   ,// 'frame'|'content'
			'centerOnResize' =>    true     ,// true|false
			'showCaption' =>       true     ,// true|false
			'showItemNumber' =>    true     ,// true|false
			'showClose' =>         true     ,// true|false
			'hideObjects' =>       true     ,// true|false
			'hideJava' =>          true     ,// true|false
			'disableScroll' =>     false    ,// true|false
			'randomOrder' =>       false    ,// true|false
			'preloadAll' =>        true     ,// true|false
			'autoGallery' =>       false    ,// true|false
			'autoTitle' =>        ''        ,// title string to use with autoGallery
			'printCSS' =>         ''        ,// path to css file or inline css string to apply to print pages (see showPrint)
			'language' =>         'auto'    ,// 'auto'|'en'|... (see the languages folder)
			'graphicsType' =>     'auto'    ,// 'auto'|'international'|'english'
			/*** </General Options> ***/
			
			/*** <Animation Options> ***/
			'doAnimations' =>         true   ,// true|false
			'resizeDuration' =>       3.5    ,// 0-10
			'imageFadeDuration' =>    3      ,// 0-10
			'overlayFadeDuration' =>  4      ,// 0-10
			'startAtClick' =>         true   ,// true|false
			'zoomImageStart' =>       true   ,// true|false
			'liveImageResize' =>      true   ,// true|false
			'splitResize' =>         'no'    ,// 'no'|'auto'|'wh'|'hw'
			/*** </Animation Options> ***/
			
			/*** <Navigation Options> ***/
			'navType' =>            'both'    ,// 'overlay'|'button'|'both'|'none'
			'navOverlayWidth' =>     35       ,// 0-50
			'navOverlayPos' =>       30       ,// 0-100
			'showNavOverlay' =>     'never'   ,// 'always'|'once'|'never'
			'showHints' =>          'once'    ,// 'always'|'once'|'never'
			'enableWrap' =>          true     ,// true|false
			'enableKeyboardNav' =>   true     ,// true|false
			'outsideClickCloses' =>  true     ,// true|false
			'imageClickCloses' =>    false    ,// true|false
			'numIndexLinks' =>       0        ,// number, -1 = no limit
			'indexLinksPanel' =>    'control' ,// 'info'|'control'
			'showIndexThumbs' =>     true     ,// true|false
			/*** </Navigation Options> ***/
					
			/*** <Slideshow Options> ***/
			'doSlideshow' =>    false  ,// true|false
			'slideInterval' =>  4.5    ,// seconds
			'endTask' =>       'exit'  ,// 'stop'|'exit'|'loop'
			'showPlayPause' =>  true   ,// true|false
			'startPaused' =>    false  ,// true|false
			'pauseOnResize' =>  true   ,// true|false
			'pauseOnPrev' =>    true   ,// true|false
			'pauseOnNext' =>    false  ,// true|false
			/*** </Slideshow Options> ***/
			
			/*** <Tooltip Settings> ***/
			'attachToHost' => false,// true | false
    	'moveWithMouse' => false,// true | false
    	'placeAbove' => false, // true | false
    	'timeout' => 0, // seconds (0)
    	'delay' => 80,// milliseconds (80)
    	'mouseSpeed' => 120, // pixels per second (120)
    	'fadeDuration' => 3, // 0-10 (3)
    	'defaultCursor' => false // true | false
			/*** </Tooltip Settings> ***/
			 );
		
		var $svInitOptions = array(
			'delOptions' => 'false',
			'galleriesPerPage' => '15',
			'itemsPerPage' => '15',
			'galleryDir' => '',
			'galleryURL' => '',
			'gCodeBefore' => '<p style="text-align: center;">',
			'gCodeAfter' => '</p>',
			'iCodeBefore' => '',
			'iCodeAfter' => '',
			'autoThumbnail' => 'true',
			'thumbBigSize' => '120',
			'thumbSuffix' => '-thumb',
			'thumb_padding' => '0',
			'thumb_margins' => '5',
			'thumb_border_width' => '1',
			'thumb_border_color' => '000000',
			'fbBackupDir' => '',
			'fbInstalled' => 'false'
		);
		
		var $version = '1.0.12';
		var $fbVersion = '3.54.3';
			
		function WpSimpleView() {
			//load language
			$plugin_dir = basename(dirname(__FILE__));
			if (function_exists( 'load_plugin_textdomain' ))
				load_plugin_textdomain( 'simple-view', PLUGINDIR . $plugin_dir, $plugin_dir );
			add_action('admin_menu', array(&$this, 'regAdminPage'));
			add_action('wp_ajax_upload_media', array(&$this, 'uploadHandler'));
			add_action('wp_ajax_upload_thumbnail', array(&$this, 'uploadThumbnailHandler'));
			add_action('activate_simple-view/simple-view.php',  array(&$this, 'onActivate'));
			add_action('deactivate_simple-view/simple-view.php',  array(&$this, 'onDeactivate'));
			add_action('template_redirect', array(&$this, 'headerScripts'));
			add_action('wp_head', array(&$this, 'addHeaderCSS'), 1);
			add_filter('tiny_mce_version', array(&$this, 'tinyMCEVersion') );
			add_action('init', array(&$this, 'addButtons'));
			add_shortcode('sgallery', array(&$this, 'doShortCode'));
			add_shortcode('sview', array(&$this, 'doShortCode'));
			add_shortcode('svg', array(&$this, 'doGalleryShortCode'));
		}
		
		function onActivate() {
			global $wpdb;
			$gTable = $wpdb->prefix . "sv_galleries";					
			$iTable = $wpdb->prefix . "sv_galleries_items";
			
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			
			if($wpdb->get_var("SHOW TABLES LIKE '$gTable'") != $gTable) {
				$gSql = "CREATE TABLE ".$gTable."(
									id INT(11) NOT NULL AUTO_INCREMENT,
								  name VARCHAR(255) NOT NULL,
								  code_before VARCHAR(255) DEFAULT NULL,
								  code_after VARCHAR(255) DEFAULT NULL,
								  trash TINYINT(1) DEFAULT 0,
								  PRIMARY KEY (id)
								)";
				dbDelta($gSql);
			}
			
			if($wpdb->get_var("SHOW TABLES LIKE '$iTable'") != $iTable) {
				$iSql = "CREATE TABLE ".$iTable."(
									id INT(11) NOT NULL AUTO_INCREMENT,
									gid INT(11) NOT NULL,
									caption VARCHAR(255) DEFAULT NULL,
								  caption2 VARCHAR(255) DEFAULT NULL,
								  source_link VARCHAR(255) DEFAULT NULL,
								  source_type VARCHAR(25) DEFAULT NULL,
								  content VARCHAR(255) DEFAULT NULL,
								  content_type VARCHAR(25) DEFAULT NULL,
								  code_before VARCHAR(255) DEFAULT NULL,
								  code_after VARCHAR(255) DEFAULT NULL,
								  thumb_padding INT(11) NOT NULL DEFAULT 0,
								  thumb_margins INT(11) NOT NULL DEFAULT 5,
								  thumb_border_width INT(11) NOT NULL DEFAULT 0,
								  thumb_border_color VARCHAR(255) NOT NULL DEFAULT '000000',
								  trash TINYINT(1) NOT NULL DEFAULT 0,
								  PRIMARY KEY (id, gid)
								)";
				dbDelta($iSql);
			}
			
			$sviewAdminOptions = $this->getAdminOptions();
			$svPluginOptions = $this->getPluginOptions();			
			
			if (!is_dir($svPluginOptions['galleryDir'])) mkdir($svPluginOptions['galleryDir']);
			if (!is_dir($svPluginOptions['galleryDir'].'/floatbox-backup')) mkdir($svPluginOptions['galleryDir'].'/floatbox-backup');
			
			update_option($this->adminOptionsName, $sviewAdminOptions);
			update_option($this->pluginOptionsName, $svPluginOptions);
		}
		
		function onDeactivate() {
			$options = $this->getPluginOptions();
			if($options['delOptions'] === 'true') {
				delete_option($this->adminOptionsName);
				delete_option($this->pluginOptionsName);
			}
		}
		
		function isFbInstalled() {
			$plugin_dir = basename(dirname(__FILE__));
			return ( is_dir( WP_PLUGIN_DIR . '/simple-view/floatbox' ) && is_file( WP_PLUGIN_DIR . '/simple-view/floatbox/floatbox.js' ));
		}
		
		function getAdminOptions() {						
			$sviewAdminOptions = $this->sviewInitOptions;
			$sviewOptions = get_option($this->adminOptionsName);
			if (!empty($sviewOptions)) {
				foreach ($sviewOptions as $key => $option) {
					$sviewAdminOptions[$key] = $option;
				}
			}
			return $sviewAdminOptions;			
		}
		
		function getPluginOptions() {
			$svPluginOptions = $this->svInitOptions;
			$svOptions = get_option($this->pluginOptionsName);
			if(!empty($svOptions)) {
				foreach($svOptions as $key => $option) {
					$svPluginOptions[$key] = $option;
				}
			}
			if($svPluginOptions['galleryDir'] === '') $svPluginOptions['galleryDir'] = WP_CONTENT_DIR . '/sv-galleries';
			if($svPluginOptions['galleryURL'] === '') $svPluginOptions['galleryURL'] = WP_CONTENT_URL . '/sv-galleries';
			if( $this->isFbInstalled() ) $svPluginOptions['fbInstalled'] = 'true';
			else $svPluginOptions['fbInstalled'] = 'false';
			return $svPluginOptions;
		}
		
		function headerScripts() {
			wp_enqueue_script('jquery');
			wp_enqueue_script('floatbox', WP_PLUGIN_URL.'/simple-view/floatbox/floatbox.js');
			wp_enqueue_script('svLayout', WP_PLUGIN_URL.'/simple-view/js/layout.js.php', array('jquery'), $this->version);
		}
		
		function addHeaderCSS() {
			wp_register_style('floatBox', WP_PLUGIN_URL.'/simple-view/floatbox/floatbox.css');
			wp_enqueue_style('floatBox');
		}
		
		function adminHeaderScripts() {
			wp_enqueue_script('jquery');
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-tabs');
			wp_enqueue_script('qTip', WP_PLUGIN_URL.'/simple-view/js/jquery.qtip-1.0.min.js', array('jquery'), '1.0');
			wp_enqueue_script('wsgAdminLayout', WP_PLUGIN_URL.'/simple-view/js/admin-layout.js', array('jquery', 'jquery-ui-tabs', 'qTip'), $this->version);
		}
		
		function adminHeaderPluginScripts() {
			wp_enqueue_script('jquery');
			wp_enqueue_script('ColorPicker', WP_PLUGIN_URL.'/simple-view/js/colorpicker.js', array('jquery'));
			wp_enqueue_script('adminPluginLayout', WP_PLUGIN_URL.'/simple-view/js/admin-plugin-layout.js.php', array('jquery', 'ColorPicker'), $this->version);
		}
		
		function adminListHeaderScripts() {
			wp_enqueue_script('jquery');
			wp_enqueue_script('floatbox', WP_PLUGIN_URL.'/simple-view/floatbox/floatbox.js');
		}
		
		function adminEditHeaderScripts() {
			wp_enqueue_script('jquery');
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('floatbox', WP_PLUGIN_URL.'/simple-view/floatbox/floatbox.js');
			wp_enqueue_script('ajaxUpload', WP_PLUGIN_URL.'/simple-view/js/ajaxupload.js', array('jquery'), '3.9');
			wp_enqueue_script('ColorPicker', WP_PLUGIN_URL.'/simple-view/js/colorpicker.js', array('jquery'));
			wp_enqueue_script('adminEditLayout', WP_PLUGIN_URL.'/simple-view/js/admin-edit-layout.js.php', array('jquery', 'ColorPicker'), $this->version);
		}
		
		function addAdminHeaderCSS() {
			wp_register_style('jqueryUI', WP_PLUGIN_URL.'/simple-view/css/jquery-ui-1.7.2.custom.css');
			wp_enqueue_style('jqueryUI');
		}
		
		function addAdminHeaderPluginStyles() {
			wp_enqueue_style('ColorPickerCSS', WP_PLUGIN_URL.'/simple-view/css/colorpicker.css');
		}
		
		function adminListHeaderStyles() {
			wp_register_style('floatBox', WP_PLUGIN_URL.'/simple-view/floatbox/floatbox.css');
			wp_enqueue_style('floatBox');
		}
		
		function adminEditHeaderStyles() {
			wp_register_style('floatBox', WP_PLUGIN_URL.'/simple-view/floatbox/floatbox.css');
			wp_register_style('ColorPickerCSS', WP_PLUGIN_URL.'/simple-view/css/colorpicker.css');
			wp_enqueue_style('floatBox');
			wp_enqueue_style('ColorPickerCSS');
		}
		
		function doShortCode( $atts, $content = null ) {
			extract( shortcode_atts( array(
				'source' => '',
				'caption' => '',
				'group' => 'pix'), 
				$atts ) );
			return "<a href='{$source}' class='floatbox' title='{$caption}' rev='group:{$group}' >" . do_shortcode($content) . "</a>";
		}
		
		function doGalleryShortCode( $atts, $content = null ) {
			global $wpdb;
			$gTable = $wpdb->prefix . "sv_galleries";					
			$iTable = $wpdb->prefix . "sv_galleries_items";
			
			$grn = '-'.((string)rand(1000, 9999));
			
			extract( shortcode_atts( array( 'id' => '', 'only' => '',	'exclude' => '', 'item' => '', 'group' => '' ), $atts ) );
			if( $id !== '' ) {
				$where = " WHERE (gid = ".$id.") AND (trash = 0)";
				if( $only !== '' ) $where .= " AND (id IN (".$only."))";
				elseif( $exclude !== '' ) $where .= " AND (id NOT IN (".$exclude."))";
				$gSql = "SELECT id, name, code_before, code_after, trash FROM ".$gTable." WHERE id = ".$id;
				$iSql = "SELECT id, gid, caption, caption2, source_link, source_type, content, content_type, code_before, code_after, thumb_padding, thumb_margins, thumb_border_width, thumb_border_color, trash FROM ".$iTable.$where;
				$gallery = $wpdb->get_row( $gSql, ARRAY_A );
				$items = $wpdb->get_results( $iSql, ARRAY_A );
				
				$output = stripslashes($gallery['code_before']);
				foreach($items as $row) {
					$output .= stripslashes($row['code_before']);
					$style = 'padding: '.$row['thumb_padding'].'px; margin: '.$row['thumb_margins'].'px; border: '.$row['thumb_border_width'].'px solid #'.$row['thumb_border_color'];
					switch( $row['content_type'] ) {
						case 'youtube':
							$iSource = 'http://www.youtube.com/watch?v='.$row['content'];
							$iContent = '<img src="http://i.ytimg.com/vi/'.$row['content'].'/default.jpg" style="'.$style.'" />';
							break;
						case 'thumbnail':
							$iSource = $row['source_link'];
							$iContent = '<img src="'.$row['content'].'" style="'.$style.'" />';
							break;
						case 'text':
							$iSource = $row['source_link'];
							$iContent = $row['content'];
							break;
					}
					$rev = (( $group === '' ) ? 'group: G'.$gallery['id'].$grn : $group);
					if(!is_null($row['caption']) && ($row['caption'] !== '')) $rev .= ' caption:`'.$row['caption'].'`';
					if(!is_null($row['caption2']) && ($row['caption2'] !== '')) $rev .= ' caption2:`'.$row['caption2'].'`';
					
					$output .= "<a href='".$iSource."' class='floatbox' rev='".$rev."' >".$iContent."</a>";
					$output .= stripslashes($row['code_after']);
				}
				$output .= stripslashes($gallery['code_after']);
			}
			elseif( $item !== '' ) {
				$where = " WHERE id = ".$item;
				$iSql = "SELECT id, gid, caption, caption2, source_link, source_type, content, content_type, code_before, code_after, thumb_padding, thumb_margins, thumb_border_width, thumb_border_color, trash FROM ".$iTable.$where;
				$row = $wpdb->get_row( $iSql, ARRAY_A );
				
				$output .= stripslashes($row['code_before']);
				$style = 'padding: '.$row['thumb_padding'].'px; margin: '.$row['thumb_margins'].'px; border: '.$row['thumb_border_width'].'px solid #'.$row['thumb_border_color'];
				switch( $row['content_type'] ) {
					case 'youtube':
						$iSource = 'http://www.youtube.com/watch?v='.$row['content'];
						$iContent = '<img src="http://i.ytimg.com/vi/'.$row['content'].'/default.jpg" style="'.$style.'" />';
						break;
					case 'thumbnail':
						$iSource = $row['source_link'];
						$iContent = '<img src="'.$row['content'].'" style="'.$style.'" />';
						break;
					case 'text':
						$iSource = $row['source_link'];
						$iContent = $row['content'];
						break;
				}
				$rev = 'group: I'.$row['id'].$grn;
				if(!is_null($row['caption']) && ($row['caption'] !== '')) $rev .= ' caption:`'.$row['caption'].'`';
				if(!is_null($row['caption2']) && ($row['caption2'] !== '')) $rev .= ' caption2:`'.$row['caption2'].'`';
					
				$output .= "<a href='".$iSource."' class='floatbox' rev='".$rev."' >".$iContent."</a>";
				$output .= stripslashes($row['code_after']);
			}
			return $output;
		}
		
		function addButtons() {
			if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
        return;
			
			if ( get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", array(&$this, "addTinyMCEPlugin"));
        add_filter('mce_buttons', array(&$this, 'registerButton'));
      }
		}
		
		function registerButton( $buttons ) {
			array_push($buttons, "separator", "svb", "svg");
			return $buttons;
		}
		
		function addTinyMCEPlugin( $plugin_array ) {
			$plugin_array['svb'] = plugins_url('simple-view/js/editor_plugin.js');
			return $plugin_array;
		}
		
		function tinyMCEVersion( $version ) {
			return ++$version;
		}
		
		function is_odd($number) {
			return($number & 1);
		}
		
		function getFilesList($dir, $exclude) {
			$options = $this->getPluginOptions();
			$i = 1;
			
			if( is_null($exclude) ) $exclude = array();
			
			if ($handle = opendir($dir)) {
				while (false !== ($file = readdir($handle))) {
					if( $file != '.' && $file != '..' && !in_array( $file, $exclude ) ) {
						echo '<option value="'.$file.'"'.(($i == 1) ? '" selected="selected"' : '').'>'.$file.'</option>'."\n";
						$i++;
					}
				}
				closedir($handle);
			}
		}
		
		function uploadHandler() {
			$options = $this->getPluginOptions();
			
			$uploaddir = $options['galleryDir'];  
			$file = $uploaddir . '/' . basename($_FILES['uploadfile']['name']);
			$legal_ext = array('jpg', 'jpeg', 'png', 'gif');

			if ( move_uploaded_file( $_FILES['uploadfile']['tmp_name'], $file )) {
				$path_info = pathinfo($_FILES['uploadfile']['name']);
				$file_extension = $path_info["extension"];
				$file_name = $path_info["filename"];
				$thumb_file = $uploaddir . '/' . $file_name . $options['thumbSuffix'] . '.' . $file_extension;
				list($width_orig, $height_orig) = getimagesize($file);  
				if( ( $options['autoThumbnail'] === 'true' ) && ( in_array( $file_extension, $legal_ext ) ) ) {
					$width = abs( (int) $options['thumbBigSize'] );
					$height = abs( (int) $options['thumbBigSize'] );
					switch($file_extension) {
						case 'jpg':
						case 'jpeg':
							header('Content-type: image/jpeg');		
							break;
						
						case 'png':
							header('Content-type: image/png');
							break;
						
						case 'gif':
							header('Content-type: image/gif');
							break;
					}
					
					$ratio_orig = $width_orig/$height_orig;
		
					if ($width/$height > $ratio_orig) {
						$width = $height*$ratio_orig;
					} else {
						$height = $width/$ratio_orig;
					}
					$image_p = imagecreatetruecolor($width, $height);
					switch($file_extension) {
						case 'jpg':
						case 'jpeg':
							$image = imagecreatefromjpeg($file);
							break;
						
						case 'png':
							$image = imagecreatefrompng($file);
							break;
						
						case 'gif':
							$image = imagecreatefromgif($file);
							break;
					}
					imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

					// Output
					switch($file_extension) {
						case 'jpg':
						case 'jpeg':
							imagejpeg( $image_p, $thumb_file, 100 );
							break;
						
						case 'png':
							imagepng( $image_p, $thumb_file, 0, PNG_ALL_FILTERS );
							break;
						
						case 'gif':
							imagegif( $image_p, $thumb_file );
							break;
					}
				}
				//if( version_compare(PHP_VERSION, '5.2.0', '>=') ) {
				//	header('Content-type: application/json');  
				//	exit("success");
				//}
				//else {
					header('Content-type: text/html');  
					exit("success");
				//}  
			} else {
				//if( version_compare(PHP_VERSION, '5.2.0', '>=') ) {
				//	header('Content-type: application/json');
				//}
				//else {
					header('Content-type: text/html');
					exit("error");
				//}
			}
		}
		
		function uploadThumbnailHandler() {
			$options = $this->getPluginOptions();
			
			$uploaddir = $options['galleryDir'];  
			$file = $uploaddir . '/' . basename($_FILES['uploadfile']['name']);   

			if ( move_uploaded_file( $_FILES['uploadfile']['tmp_name'], $file )) {
				exit("success");  
			} else {
				exit("error");  
			}
		}
		
		function regAdminPage() {
			$menuPage = add_menu_page(__('Simple View Settings', 'simple-view'), __('Simple View', 'simple-view'), 8, 'simple-view-settings', array(&$this, 'svAdminPage'), WP_PLUGIN_URL.'/simple-view/images/sv-icon.png');
			$svSubPage = add_submenu_page('simple-view-settings', __('Simple View Settings', 'simple-view'), __('Settings', 'simple-view'), 8, 'simple-view-settings', array(&$this, 'svAdminPage'));
			add_action('admin_print_scripts-'.$svSubPage, array(&$this, 'adminHeaderPluginScripts'));
			add_action('admin_print_styles-'.$svSubPage, array(&$this, 'addAdminHeaderPluginStyles'));
			$fbUploadPage = add_submenu_page('simple-view-settings', __('FloatBox Uploading and Installation', 'simple-view'), __('FloatBox Installation', 'simple-view'), 8, 'floatbox-install', array(&$this, 'fbInstall'));
			$fbSubPage = add_submenu_page('simple-view-settings', __('FloatBox Settings', 'simple-view'), __('FloatBox Settings', 'simple-view'), 8, 'floatbox-settings', array(&$this, 'fbAdminPage'));
			add_action('admin_print_scripts-'.$fbSubPage, array(&$this, 'adminHeaderScripts'));
			add_action('admin_print_styles-'.$fbSubPage, array(&$this, 'addAdminHeaderCSS'));
			$svGalPage = add_submenu_page('simple-view-settings', __('Galleries', 'simple-view'), __('Galleries', 'simple-view'), 8, 'simple-view-galleries', array(&$this, 'svGalleries'));
			add_action('admin_print_scripts-'.$svGalPage, array(&$this, 'adminListHeaderScripts'));
			add_action('admin_print_styles-'.$svGalPage, array(&$this, 'adminListHeaderStyles'));
			$svGalNewPage = add_submenu_page('simple-view-settings', __('Edit Gallery', 'simple-view'), __('New Gallery', 'simple-view'), 8, 'simple-view-edit-gallery', array(&$this, 'GalleryEdit'));
			add_action('admin_print_scripts-'.$svGalNewPage, array(&$this, 'adminEditHeaderScripts'));
			add_action('admin_print_styles-'.$svGalNewPage, array(&$this, 'adminEditHeaderStyles'));
		}
		
		function fbInstall() {
			global $wp_filesystem;
			if ( ! $wp_filesystem || ! is_object($wp_filesystem) ) WP_Filesystem();
			$options = $this->getPluginOptions();
			
			$uploaddir = $options['galleryDir'].'/floatbox-backup';
			$upgradedir = WP_PLUGIN_DIR.'/simple-view';
			
			if (isset($_POST['upload_and_install'])) {
				$file = $uploaddir . '/' . basename($_FILES['uploadfile']['name']);
				if ( move_uploaded_file( $_FILES['uploadfile']['tmp_name'], $file )) {
					?>
<div class="updated"><p><strong><?php echo __("FloatBox library archive", "simple-view").' '.$_FILES['uploadfile']['name'].' '.__("is uploaded.", "simple-view");?></strong></p></div>
					<?php
					$result = unzip_file($file, $upgradedir);
					if ( is_wp_error($result) ) {
						?>
<div class="error"><p><strong><?php echo $result->get_error_message();?></strong></p></div>
						<?php
					}
					else {
						?>
<div class="updated" style="background-color: #CFE8D8; border-color: #528463;"><p><strong><?php echo __("FloatBox library is installed.", "simple-view");?></strong></p></div>
						<?php
					}
				}
				else {
					?>
<div class="error"><p><strong><?php echo __("FloatBox library archive", "simple-view").' '.$file.' '.__("is not uploaded.", "simple-view");?></strong></p></div>
					<?php
				}
			}
			elseif(isset($_POST['install'])) {
				$sourceDir = $options['galleryDir'].'/floatbox-backup';
				$file = $sourceDir.'/'.$_POST['files_list'];
				$result = unzip_file($file, $upgradedir);
				if ( is_wp_error($result) ) {
					?>
<div class="updated"><p><strong><?php echo $result->get_error_message().' '.$file;?></strong></p></div>
					<?php
				}
				else {
					?>
<div class="updated" style="background-color: #CFE8D8; border-color: #528463;"><p><strong><?php echo __("FloatBox is installed.", "simple-view");?></strong></p></div>
					<?php
				}
			}
			
			if(!$this->isFbInstalled()) {
				?>
<div class="error"><p><strong><?php echo __("FloatBox library is not installed!", "simple-view");?></strong></p></div>
				<?php
			}
			?>
<div class='wrap'>
	<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
		<div class="icon32" style="background: url('<?php echo WP_PLUGIN_URL.'/simple-view/images/floatbox-32.png' ?>') no-repeat transparent; "><br/></div>
		<h2><?php _e('FloatBox Uploading and Installation', 'simple-view'); ?></h2>
		<div id="poststuff" class="ui-sortable">
			<div class="postbox opened">
				<h3><?php _e('Uploading and Installation', 'simple-view'); ?></h3>
				<div class="inside">
					<p><?php _e('There are three simple steps to install FloatBox.', 'simple-view'); ?></p>
					<p>
						<strong><?php _e('First Step: Download FloatBox', 'simple-view'); ?></strong><br/>
						<?php echo __('Go to the FloatBox download page and download FloatBox archive file to your local computer. Just click button placed below.', 'simple-view').''; ?>
					</p>
					<p>
						<a class="button-secondary" href="http://randomous.com/floatbox/download" target="_blank"><?php _e('FloatBox Download Page', 'simple-view'); ?></a>
					</p>
					<p>
						<strong><?php _e('Second Step: Select FloatBox Archive', 'simple-view'); ?></strong><br/>
						<?php echo __('Select FloatBox archive downloaded to your local computer.', 'simple-view').''; ?>
					</p>
					<p>
						<input type="hidden" name="MAX_FILE_SIZE" value="2147483647" />
						<input id="uploadfile" type="file" name="uploadfile" />
					</p>
					<p>
						<strong><?php _e('Third Step: Upload and Install', 'simple-view'); ?></strong><br/>
						<?php echo __("Just press button 'Upload and Install'.", 'simple-view').''; ?>
					</p>
					<p>	
						<input type="submit" class='button-primary' name="upload_and_install" value="<?php _e('Upload and Install', 'simple-view') ?>" />
					</p>
				</div>
			</div>
			<div class="postbox opened">
				<h3><?php _e('Installation', 'simple-view'); ?></h3>
				<div class="inside">
					<p><?php _e("If you already have previously uploaded FloatBox archive file on server or FloatBox archive file was uploaded by FTP, just select this file and click 'Install'.", 'simple-view'); ?></p>
					<p>
						<label for="files_list"><strong><?php echo (__('Select File', 'simple-view').':'); ?></strong></label>
						<select id="files_list" name="files_list" size="1"  dir="ltr" style="width: auto;">
							<?php $this->getFilesList($options['galleryDir'].'/floatbox-backup'); ?>
						</select>										
					</p>
					<p>
						<input type="submit" class='button-primary' name="install" value="<?php _e('Install', 'simple-view') ?>" />
					</p>
				</div>
			</div>
			<div class="postbox opened">
				<h3><?php _e('Manual Installation', 'simple-view'); ?></h3>
				<div class="inside">
					<p>
						<?php _e("If you can not or don't want install FloatBox automatically you can do it manually.", 'simple-view'); ?>
					</p>
					<p>
						&nbsp;&nbsp;1. <?php _e("Download FloatBox Library archive", 'simple-view'); ?><br/>
						&nbsp;&nbsp;2. <?php _e("Unpack it", 'simple-view'); ?><br/>
						&nbsp;&nbsp;3. <?php _e("Copy unpacked <code>floatbox</code> folder to <code>wp-content/simple-view</code> folder", 'simple-view'); ?>
					</p>
					<p>
						<?php _e("That is all!", 'simple-view'); ?>
					</p>
				</div>
			</div>
		</div>
	</form>
</div>
			<?php
		}
		
		function svGalleries() {
			global $wpdb;
			$gTable = $wpdb->prefix . "sv_galleries";					
			$iTable = $wpdb->prefix . "sv_galleries_items";
			
			if(isset($_GET['mode'])) $mode = $_GET['mode'];
			else $mode = 'active';
			if(isset($_GET["action"])) $action = $_GET['action'];
			else $action = 'gallery';
			if(isset($_GET['item'])) $item = $_GET['item'];
			else $item = null;
			if(isset($_GET['iaction'])) $iaction = $_GET['iaction'];
			else $iaction = null;
			if(isset($_GET['iitem'])) $iitem = $_GET['iitem'];
			else $iitem = null;
			if(isset($_GET['apage'])) $apage = abs( (int) $_GET['apage'] );
			else $apage = 1;
			
			$options = $this->getPluginOptions();
			$galleries_per_page = $options['galleriesPerPage'];
			$items_per_page = $options['itemsPerPage'];
			
			if(!$this->isFbInstalled()) {
				?>
<div class="error"><p><strong><?php echo __("FloatBox library is not installed! Go to the ", "simple-view").'<a href="'.admin_url('admin.php').'?page=floatbox-install">'.__('Floatbox Installation Page', 'simple-view').'</a> '.__('to install it.', 'simple-view');?></strong></p></div>
				<?php
			}
			
			switch($action) {
				case 'gallery':
					if(!is_null($item)) {
						if($iaction === 'delete') $wpdb->update( $gTable, array( 'trash' => true ), array( 'id' => $item ), array( '%d' ), array( '%d' ) );
						elseif($iaction === 'untrash') $wpdb->update( $gTable, array( 'trash' => false ), array( 'id' => $item ), array( '%d' ), array( '%d' ) );
					}
					$trash_num = $wpdb->get_var($wpdb->prepare('SELECT COUNT(*) FROM '.$gTable.' WHERE trash = TRUE'));
					$active_num = $wpdb->get_var($wpdb->prepare('SELECT COUNT(*) FROM '.$gTable.' WHERE trash = FALSE'));
					if(is_null($active_num)) $active_num = 0;
					if(is_null($trash_num)) $trash_num = 0;
					$all_num = $trash_num + $active_num;
					$total = (($mode !== 'all') ? (($mode === 'trash') ? $trash_num : $active_num) : $all_num);
					$start = $offset = ( $apage - 1 ) * $galleries_per_page;
					
					$page_links = paginate_links( array(
						'base' => add_query_arg( 'apage', '%#%' ),
						'format' => '',
						'prev_text' => __('&laquo;'),
						'next_text' => __('&raquo;'),
						'total' => ceil($total / $galleries_per_page),
						'current' => $apage
					));
					?>
<div class='wrap'>
	<div class="icon32" style="background: url('<?php echo WP_PLUGIN_URL.'/simple-view/images/sv-icon-32.png' ?>') no-repeat transparent; "><br/></div>
	<h2><?php _e('Managing galleries', 'simple-view'); ?></h2>
	<ul class="subsubsub">
		<li><a <?php if($mode === 'all') echo 'class="current"';?> href="<?php echo admin_url('admin.php'); ?>?page=simple-view-galleries&action=gallery&mode=all"><?php _e('All', 'simple-view'); ?></a> (<?php echo $all_num; ?>) | </li>
		<li><a <?php if($mode === 'active') echo 'class="current"';?> href="<?php echo admin_url('admin.php'); ?>?page=simple-view-galleries&action=gallery&mode=active"><?php _e('Active', 'simple-view'); ?></a> (<?php echo $active_num; ?>) | </li>
		<li><a <?php if($mode === 'trash') echo 'class="current"';?> href="<?php echo admin_url('admin.php'); ?>?page=simple-view-galleries&action=gallery&mode=trash"><?php _e('Trash', 'simple-view'); ?></a> (<?php echo $trash_num; ?>)</li>
	</ul>
	<div class="tablenav">
		<div class="alignleft">
			<a class="button-secondary" href="<?php echo admin_url('admin.php'); ?>?page=simple-view-edit-gallery&action=new&mode=gallery"><?php _e('Add New Gallery', 'simple-view'); ?></a>
		</div>
		<div class="tablenav-pages">
			<?php $page_links_text = sprintf( '<span class="displaying-num">' . __( 'Displaying %s&#8211;%s of %s', 'simple-view' ) . '</span>%s',
				number_format_i18n( $start + 1 ),
				number_format_i18n( min( $apage * $galleries_per_page, $total ) ),
				'<span class="total-type-count">' . number_format_i18n( $total ) . '</span>',
				$page_links
			); echo $page_links_text; ?>
		</div>
	</div>
	<div class="clear"></div>
	<table class="widefat fixed" cellpadding="0">
		<thead>
			<tr>
				<th id="idg" class="manage-column column-title" style="width:10%;" scope="col"><?php _e('ID', 'simple-view'); ?></th>
				<th id="name" class="manage-column column-title" style="width:45%;" scope="col"><?php _e('Gallery Name', 'simple-view');?></th>
				<th id="g-items" class="manage-column column-title" style="width:10%;" scope="col"><div class="vers"><?php _e('Items', 'simple-view'); ?></div></th>
				<th id="code" class="manage-column column-title" style="width:35%;" scope="col"><?php _e('Code', 'simple-view');?></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th id="idg" class="manage-column column-title" style="width:10%;" scope="col"><?php _e('ID', 'simple-view'); ?></th>
				<th id="name" class="manage-column column-title" style="width:45%;" scope="col"><?php _e('Gallery Name', 'simple-view');?></th>
				<th id="g-items" class="manage-column column-title" style="width:10%;" scope="col"><div class="vers"><?php _e('Items', 'simple-view'); ?></div></th>
				<th id="code" class="manage-column column-title" style="width:35%;" scope="col"><?php _e('Code', 'simple-view');?></th>
			</tr>
		</tfoot>
		<tbody>
				<?php
					$galleries = $wpdb->get_results("SELECT id, name, trash FROM ".$gTable.(($mode !== 'all') ? ' WHERE trash = '.(($mode === 'trash') ? 'TRUE' : 'FALSE') : '').' LIMIT '.$offset.', '.$galleries_per_page, ARRAY_A);
					$i = 0;
					if(!is_array($galleries)) {
				?>
			<tr id="g0" class="alternate author-self status-publish iedit" valign="top">
				<th class="author column-author"><?php _e('There are no data ...', 'simple-view').$gTable; ?></th>
			</tr>
				<?php } else {
					foreach($galleries as $row) {
						$gItems = $wpdb->get_var($wpdb->prepare('SELECT COUNT(*) FROM '.$iTable.' WHERE (trash = FALSE) AND (gid = '.$row['id'].')'));	
				?>
			<tr id="<?php echo $row['id'];?>" class="<?php echo (($i & 1) ? 'alternate' : ''); ?> author-self status-publish iedit" valign="top">
				<th class="post-title column-title"><?php echo $row['id']; ?></th>
				<td class="post-title column-title">
					<strong><a href="<?php echo admin_url('admin.php'); ?>?page=simple-view-galleries&action=items&mode=active&item=<?php echo $row['id']; ?>"><?php echo $row['name'];?></a><?php echo ((($row['trash'] == true) && ($mode === 'all')) ? '<span class="post-state"> - '.__('in Trash', 'simple-view').'</span>' : ''); ?></strong>
					<div class="row-actions">
						<span class="edit"><a href="<?php echo admin_url('admin.php'); ?>?page=simple-view-edit-gallery&action=edit&mode=gallery&item=<?php echo $row['id'] ?>" title="<?php _e('Edit Gallery', 'simple-view') ?>"><?php _e('Edit', 'simple-view'); ?></a> | </span>
						<?php if($row['trash'] == true) { ?><span class="untrash"><a href="<?php echo admin_url('admin.php'); ?>?page=simple-view-galleries&action=gallery&mode=<?php echo $mode ?>&iaction=untrash&item=<?php echo $row['id'] ?>" title="<?php _e('Restore this Gallery from the Trash', 'simple-view') ?>"><?php _e('Restore', 'simple-view'); ?></a> | </span>
						<?php } else { ?><span class="delete"><a href="<?php echo admin_url('admin.php'); ?>?page=simple-view-galleries&action=gallery&mode=<?php echo $mode ?>&iaction=delete&item=<?php echo $row['id'] ?>" title="<?php _e('Move this Gallery to the Trash', 'simple-view') ?>"><?php _e('Delete', 'simple-view'); ?></a> | </span><?php } ?>
						<span class="edit"><a href="<?php echo admin_url('admin.php'); ?>?page=simple-view-galleries&action=items&mode=active&item=<?php echo $row['id']; ?>" title="<?php _e('View List of Gallery Items', 'simple-view') ?>"><?php _e('View Items', 'simple-view'); ?></a></span>
					</div>
				</td>
				<td class="post-title column-title"><div class="post-com-count-wrapper" style="text-align: center;"><?php echo $gItems;?></div></td>
				<td class="post-title column-title" title="<?php echo _e('You can insert this short code in the text.', 'simple-view');?>"><?php echo (__('Short code', 'simple-view').': <code>[svg id='.$row['id'].']</code>');?></td>
			</tr>
				<?php $i++; }}?>
		</tbody>
	</table>
	<div class="tablenav">
		<div class="alignleft">
			<a class="button-secondary" href="<?php echo admin_url('admin.php'); ?>?page=simple-view-edit-gallery&action=new&mode=gallery"><?php _e('Add New Gallery', 'simple-view'); ?></a>
		</div>
		<div class="tablenav-pages">
			<?php $page_links_text = sprintf( '<span class="displaying-num">' . __( 'Displaying %s&#8211;%s of %s', 'simple-view' ) . '</span>%s',
				number_format_i18n( $start + 1 ),
				number_format_i18n( min( $apage * $galleries_per_page, $total ) ),
				'<span class="total-type-count">' . number_format_i18n( $total ) . '</span>',
				$page_links
			); echo $page_links_text; ?>
		</div>
	</div>
</div>
					<?php
					break;
				
				case 'items':
					if(!is_null($item)) {
						if($iaction === 'delete') $wpdb->update( $iTable, array( 'trash' => true ), array( 'id' => $iitem ), array( '%d' ), array( '%d' ) );
						elseif($iaction === 'untrash') $wpdb->update( $iTable, array( 'trash' => false ), array( 'id' => $iitem ), array( '%d' ), array( '%d' ) );
					}
					$trash_num = $wpdb->get_var($wpdb->prepare('SELECT COUNT(*) FROM '.$iTable.' WHERE (trash = TRUE) AND (gid = '.$item.')'));
					$active_num = $wpdb->get_var($wpdb->prepare('SELECT COUNT(*) FROM '.$iTable.' WHERE (trash = FALSE) AND (gid = '.$item.')'));
					if(is_null($active_num)) $active_num = 0;
					if(is_null($trash_num)) $trash_num = 0;
					$all_num = $trash_num + $active_num;
					$gallery = $wpdb->get_row("SELECT id, name, trash FROM ".$gTable." WHERE id = ".$item, ARRAY_A);
					
					$total = (($mode !== 'all') ? (($mode === 'trash') ? $trash_num : $active_num) : $all_num);
					$start = $offset = ( $apage - 1 ) * $items_per_page;
					
					$page_links = paginate_links( array(
						'base' => add_query_arg( 'apage', '%#%' ),
						'format' => '',
						'prev_text' => __('&laquo;'),
						'next_text' => __('&raquo;'),
						'total' => ceil($total / $items_per_page),
						'current' => $apage
					));
					?>
<div class="wrap">
	<div class="icon32" style="background: url('<?php echo WP_PLUGIN_URL.'/simple-view/images/sv-items-32.png' ?>') no-repeat transparent; "><br/></div>
	<h2><?php echo __('Managing Items of Gallery', 'simple-view').' "'.$gallery['name'].'" ('.$item.') '; ?></h2>
	<ul class="subsubsub">
		<li><a <?php if($mode === 'all') echo 'class="current"';?> href="<?php echo admin_url('admin.php'); ?>?page=simple-view-galleries&action=items&mode=all&item=<?php echo $item ?>"><?php _e('All', 'simple-view'); ?></a> (<?php echo $all_num; ?>) | </li>
		<li><a <?php if($mode === 'active') echo 'class="current"';?> href="<?php echo admin_url('admin.php'); ?>?page=simple-view-galleries&action=items&mode=active&item=<?php echo $item ?>"><?php _e('Active', 'simple-view'); ?></a> (<?php echo $active_num; ?>) | </li>
		<li><a <?php if($mode === 'trash') echo 'class="current"';?> href="<?php echo admin_url('admin.php'); ?>?page=simple-view-galleries&action=items&mode=trash&item=<?php echo $item ?>"><?php _e('Trash', 'simple-view'); ?></a> (<?php echo $trash_num; ?>)</li>
	</ul>
	<div class="tablenav">
		<div class="alignleft">
			<a class="button-secondary" href="<?php echo admin_url('admin.php'); ?>?page=simple-view-edit-gallery&action=new&mode=item&gallery=<?php echo $gallery['id']; ?>"><?php _e('Add New Gallery Item', 'simple-view'); ?></a>
		</div>
		<div class="alignleft">
			<a class="button-secondary" href="<?php echo admin_url('admin.php'); ?>?page=simple-view-galleries"><?php _e('Back to Gallery Management', 'simple-view'); ?></a>
		</div>
		<div class="tablenav-pages">
			<?php $page_links_text = sprintf( '<span class="displaying-num">' . __( 'Displaying %s&#8211;%s of %s', 'simple-view' ) . '</span>%s',
				number_format_i18n( $start + 1 ),
				number_format_i18n( min( $apage * $items_per_page, $total ) ),
				'<span class="total-type-count">' . number_format_i18n( $total ) . '</span>',
				$page_links
			); echo $page_links_text; ?>
		</div>
	</div>
	<div class="clear"></div>
	<table class="widefat fixed" cellpadding="0">
		<thead>
			<tr>
				<th id="idg" class="manage-column column-title" style="width:5%;" scope="col"><?php _e('ID', 'simple-view'); ?></th>
				<th id="thumb" class='manage-column column-title' style="width:10%;" scope="col"><?php _e('Content', 'simple-view'); ?></th>
				<th id="name" class="manage-column column-title" style="width:45%;" scope="col"><?php _e('Item Captions', 'simple-view');?></th>
				<th id="code" class="manage-column column-title" style="width:20%;" scope="col"><?php _e('Source Type', 'simple-view');?></th>
				<th id="code" class="manage-column column-title" style="width:20%;" scope="col"><?php _e('Link Content Type', 'simple-view');?></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th id="idg" class="manage-column column-title" style="width:5%;" scope="col"><?php _e('ID', 'simple-view'); ?></th>
				<th id="thumb" class='manage-column column-title' style="width:10%;" scope="col"><?php _e('Content', 'simple-view'); ?></th>
				<th id="name" class="manage-column column-title" style="width:45%;" scope="col"><?php _e('Item Captions', 'simple-view');?></th>
				<th id="code" class="manage-column column-title" style="width:20%;" scope="col"><?php _e('Source Type', 'simple-view');?></th>
				<th id="code" class="manage-column column-title" style="width:20%;" scope="col"><?php _e('Link Content Type', 'simple-view');?></th>
			</tr>
		</tfoot>
		<tbody>
				<?php
					if($mode !== 'all') 
						$items = $wpdb->get_results("SELECT id, gid, caption, caption2, source_link, source_type, content, content_type, trash FROM ".$iTable.' WHERE (gid = '.$item.') AND (trash = '.(($mode === 'trash') ? 'TRUE' : 'FALSE').')'.' LIMIT '.$offset.', '.$items_per_page, ARRAY_A);
					else
						$items = $wpdb->get_results("SELECT id, gid, caption, caption2, source_link, source_type, content, content_type, trash FROM ".$iTable." WHERE gid = ".$item.' LIMIT '.$offset.', '.$items_per_page, ARRAY_A);
					$i = 0;
					if(!is_array($items)) {
				?>
			<tr id="g0" class="alternate author-self status-publish iedit" valign="top">
				<th class="author column-author"><?php _e('There are no data ...', 'simple-view').$iTable; ?></th>
			</tr>
				<?php } else {
					foreach($items as $row) {
						switch($row['content_type']) {
							case 'thumbnail' : $contentType = __('Thumbnail', 'simple-view'); break;
							case 'text' : $contentType = __('Text', 'simple-view'); break;
							case 'youtube' : $contentType = __('YouTube', 'simple-view'); break;
							default: $contentType = '';
						}
						switch($row['source_type']) {
							case 'image' : $sourceType = __('Image', 'simple-view'); break;
							case 'video' : $sourceType = __('Video', 'simple-view'); break;
							case 'site' : $sourceType = __('Site', 'simple-view'); break;
							case 'html' : $sourceType = __('HTML', 'simple-view'); break;
							default: $sourceType = '';
						}
						$rev = 'group:G'.$row['gid'];
						if(!is_null($row['caption']) && ($row['caption'] !== '')) $rev .= ' caption:`'.$row['caption'].'`';
						if(!is_null($row['caption2']) && ($row['caption2'] !== '')) $rev .= ' caption2:`'.$row['caption2'].'`';
					?>
			<tr id="<?php echo $row['id'];?>" class="<?php echo (($i & 1) ? 'alternate' : ''); ?> author-self status-publish iedit" valign="top">
				<th class="post-title column-title"><?php echo $row['id']; ?></th>
				<td class="column-icon media-icon">
					<a class="floatbox" rev="<?php echo $rev;?>" href="<?php echo (($row['content_type'] !== 'youtube') ? $row['source_link'] : 'http://www.youtube.com/watch?v='.$row['content']); ?>" ><?php echo (($row['content_type'] !== 'text') ? '<img src="'.(($row['content_type'] === 'thumbnail') ? $row['content'] : 'http://i.ytimg.com/vi/'.$row['content'].'/default.jpg').'" style="width:auto; height:auto; margin: 2px; " />' : $row['content']); ?></a>
				</td>
				<td class="post-title column-title">
					<strong><a href="<?php echo admin_url('admin.php'); ?>?page=simple-view-edit-gallery&action=edit&mode=item&item=<?php echo $row['id']; ?>"><?php echo $row['caption'];?></a><?php echo ((($row['trash'] == true) && ($mode === 'all')) ? '<span class="post-state"> - '.__('in Trash', 'simple-view').'</span>' : ''); ?></strong><br/><?php echo $row['caption2'];?>
					<div class="row-actions">
						<span class="edit"><a href="<?php echo admin_url('admin.php'); ?>?page=simple-view-edit-gallery&action=edit&mode=item&item=<?php echo $row['id'] ?>" title="<?php _e('Edit this Item of Gallery', 'simple-view') ?>"><?php _e('Edit', 'simple-view'); ?></a> | </span>
						<?php if($row['trash'] == true) { ?><span class="untrash"><a href="<?php echo admin_url('admin.php'); ?>?page=simple-view-galleries&action=items&mode=<?php echo $mode ?>&iaction=untrash&item=<?php echo $row['gid'] ?>&iitem=<?php echo $row['id'] ?>" title="<?php _e('Restore this item from the Trash', 'simple-view') ?>"><?php _e('Restore', 'simple-view'); ?></a> </span>
						<?php } else { ?><span class="delete"><a href="<?php echo admin_url('admin.php'); ?>?page=simple-view-galleries&action=items&mode=<?php echo $mode ?>&iaction=delete&item=<?php echo $row['gid'] ?>&iitem=<?php echo $row['id'] ?>" title="<?php _e('Move this item to the Trash', 'simple-view') ?>"><?php _e('Delete', 'simple-view'); ?></a> </span><?php } ?>
					</div>
				</td>
				<td class="post-title column-title"><?php echo $sourceType;?></td>
				<td class="post-title column-title"><?php echo $contentType;?></td>
			</tr>
				<?php $i++; }}?>
		</tbody>
	</table>
	<div class="tablenav">
		<div class="alignleft">
			<a class="button-secondary" href="<?php echo admin_url('admin.php'); ?>?page=simple-view-edit-gallery&action=new&mode=item&gallery=<?php echo $gallery['id']; ?>"><?php _e('Add New Gallery Item', 'simple-view'); ?></a>
		</div>
		<div class="alignleft">
			<a class="button-secondary" href="<?php echo admin_url('admin.php'); ?>?page=simple-view-galleries"><?php _e('Back to Gallery Management', 'simple-view'); ?></a>
		</div>
		<div class="tablenav-pages">
			<?php $page_links_text = sprintf( '<span class="displaying-num">' . __( 'Displaying %s&#8211;%s of %s', 'simple-view' ) . '</span>%s',
				number_format_i18n( $start + 1 ),
				number_format_i18n( min( $apage * $items_per_page, $total ) ),
				'<span class="total-type-count">' . number_format_i18n( $total ) . '</span>',
				$page_links
			); echo $page_links_text; ?>
		</div>
	</div>
</div>
					<?php
					break;
			}
		}
		
		function GalleryEdit() {
			global $wpdb;
			$gTable = $wpdb->prefix . "sv_galleries";
			$iTable = $wpdb->prefix . "sv_galleries_items";
			
			$options = $this->getPluginOptions();
			
			if(isset($_GET['action'])) $action = $_GET['action'];
			else $action = 'new';
			if(isset($_GET['mode'])) $mode = $_GET['mode'];
			else $mode = 'gallery';
			if(isset($_GET['item'])) $item = $_GET['item'];
			else $item = null;
			if(isset($_GET['gallery'])) $gallery = $_GET['gallery'];
			else $gallery = null;
			
			if(!$this->isFbInstalled()) {
				?>
<div class="error"><p><strong><?php echo __("FloatBox library is not installed! Go to the ", "simple-view").'<a href="'.admin_url('admin.php').'?page=floatbox-install">'.__('Floatbox Installation Page', 'simple-view').'</a> '.__('to install it.', 'simple-view');?></strong></p></div>
				<?php
			}
			
			switch($mode) {
				case 'gallery':
					$updated = false;
					
					if(isset($_POST['update_gallery'])) {
						$galleryId = $_POST['gallery_id'];
						$updateRow = array(
							'name' => $_POST['gallery_title'],
							'code_before' => $_POST['code_before'],
							'code_after' => $_POST['code_after'],
							'trash' => ($_POST['trash'] === 'true')
						);
						$formatRow = array( '%s', '%s', '%s', '%d');
						if($galleryId === __('Undefined', 'simple-view')) {
							$wpdb->insert($gTable, $updateRow);
							$updated = true;
							$item = $wpdb->insert_id;
						}
						else {
							if(is_null($item)) $item = $galleryId;
							$wpdb->update($gTable, $updateRow, array( 'id' => $item ), $formatRow, array( '%d' ));
							$updated = true;
						}
						?>
<div class="updated"><p><strong><?php _e("Gallery Data Updated.", "simple-view");?></strong></p></div>
						<?php
					}
					
					if($action !== 'new') {
						$row = $wpdb->get_row("SELECT id, name, code_before, code_after, trash FROM ".$gTable." WHERE id = ".$item, ARRAY_A);
					}
					else {
						if($updated) {
							$row = $wpdb->get_row("SELECT id, name, code_before, code_after, trash FROM ".$gTable." WHERE id = ".$item, ARRAY_A);
						}
						else $row = array( 'id' => __('Undefined', 'simple-view'), 'name' => '', 'code_before' => '', 'code_after' => '', 'trash' => false );
					}
					?>
<div class="wrap">
	<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
		<div class="icon32" style="background: url('<?php echo WP_PLUGIN_URL.'/simple-view/images/sv-gallery-32.png' ?>') no-repeat transparent; "><br/></div>
		<h2><?php echo ( ( ($action === 'new') && ( $row['id'] === __('Undefined', 'simple-view') ) ) ? __('New Gallery', 'simple-view') : __('Edit Gallery', 'simple-view').' ('.$item.')' ); ?></h2>
		<div class="metabox-holder has-right-sidebar" id="poststuff">
			<div id="side-info-column" class="inner-sidebar">
				<div id="side-info-column" class="meta-box-sortables ui-sortable">
					<div id="submitdiv" class="postbox ">
						<div class="handlediv" title="<?php _e('Click to toggle', 'simple-view'); ?>"><br/></div>
						<h3 class="hndle"><span><?php _e('Save', 'simple-view');?></span></h3>
						<div class="inside">
							<div id="submitpost" class="submitbox">
								<div id="minor-publishing">
									<div id="minor-publishing-actions">
										<div id="save-action"> </div>
										<div id="preview-action">
											<a id="post-preview" class="preview button" href='<?php echo admin_url('admin.php'); ?>?page=simple-view-galleries'><?php _e('Back to Galleries List', 'simple-view') ?></a>
										</div>
										<div class="clear"></div>
									</div>
									<div id="misc-publishing-actions">
										<div class="misc-pub-section">
											<label for="gallery_id"><?php echo __('Gallery ID', 'simple-view').':'; ?></label>
											<span id="gallery_id" class="post-status-display"><?php echo $row['id']; ?></span>
											<input type="hidden" id="gallery_id" name="gallery_id" value="<?php echo $row['id']; ?>" />
										</div>
										<div class="misc-pub-section">
											<label for="trash_no"><input type="radio" id="trash_no" value="false" name="trash" <?php if (!$row['trash']) { echo 'checked="checked"'; }?> >  <?php _e('Is Active', 'simple-view'); ?></label><br/>
											<label for="trash_yes"><input type="radio" id="trash_yes" value="true" name="trash" <?php if ($row['trash']) { echo 'checked="checked"'; }?> >  <?php _e('Is In Trash', 'simple-view'); ?></label>
										</div>
									</div>
									<div class="clear"></div>
								</div>
								<div id="major-publishing-actions">
									<div id="delete-action">
										<a class="submitdelete deletion" href='<?php echo admin_url('admin.php'); ?>?page=simple-view-galleries'><?php _e('Cancel', 'simple-view') ?></a>
									</div>
									<div id="publishing-action">
										<input type="submit" class='button-primary' name="update_gallery" value="<?php _e('Save', 'simple-view') ?>" />
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="post-body">
				<div id="post-body-content">
					<div id="titlediv">
						<div id="titlewrap">
							<label class="screen-reader-text" for="title"><?php _e('Title', 'simple-view'); ?></label>
							<input id="title" type="text" autocomplete="off" tabindex="1" size="30" name="gallery_title" value="<?php echo $row['name']; ?>" />
						</div>
					</div>
					<div id="normal-sortables" class="meta-box-sortables ui-sortable">
						<div id="codediv" class="postbox ">
							<div class="handlediv" title="<?php _e('Click to toggle', 'simple-view'); ?>"><br/></div>
							<h3 class="hndle"><span><?php _e('Codes', 'simple-view');?></span></h3>
							<div class="inside">
								<p><?php _e('Enter the code to output before and after the codes of gallery.', 'simple-view');?></p>
								<p>
									<label for="code_before"><?php echo __('Code Before', 'simple-view').':'; ?></label>
									<input id="code_before" class="code" type="text" tabindex="2" name="code_before" value="<?php echo htmlspecialchars(stripslashes($row['code_before'])); ?>" style="width:99%" />
								</p>
								<p>
									<label for="code_after"><?php echo __('Code After', 'simple-view').':'; ?></label>
									<input id="code_after" class="code" type="text" tabindex="3" name="code_after" value="<?php echo htmlspecialchars(stripslashes($row['code_after'])); ?>" style="width:99%" />
								</p>
								<p><?php _e('You can enter any HTML codes here for the further withdrawal of their before and after the code of multimedia gallery.', 'simple-view'); ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
					<?php
					break;
				
				case 'item':
					if(isset($_POST['update_item'])) {
						$itemId = $_POST['item_id'];
						$updateRow = array(
							'gid' => $_POST['gallery_id'],
							'caption' => $_POST['item_caption'],
							'caption2' => $_POST['caption2'],
							'source_link' => $_POST['source_link'],
							'source_type' => $_POST['source_type'],
							'content' => $_POST['link_content'],
							'content_type' => $_POST['content_type'],
							'code_before' => $_POST['code_before'],
							'code_after' => $_POST['code_after'],
							'thumb_padding' => $_POST['thumb_padding'],
							'thumb_margins' => $_POST['thumb_margins'],
							'thumb_border_width' => $_POST['thumb_border_width'],
							'thumb_border_color' => $_POST['thumb_border_color'],
							'trash' => ($_POST['trash'] === 'true')
						);
						$formatRow = array( '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%d', '%d', '%s', '%d');
						if($itemId === __('Undefined', 'simple-view')) {
							$wpdb->insert($iTable, $updateRow);
							$item = $wpdb->insert_id;
						}
						else {
							if(is_null($item)) $item = $itemId;
							$wpdb->update($iTable, $updateRow, array( 'id' => $item ), $formatRow, array( '%d' ));
						}
						$action = 'edit';
						?>
<div class="updated"><p><strong><?php _e("Item Data Updated.", "simple-view");?></strong></p></div>
						<?php
					}
					
					if($action !== 'new') {
						$row = $wpdb->get_row("SELECT id, gid, caption, caption2, source_link, source_type, content, content_type, code_before, code_after, thumb_padding, thumb_margins, thumb_border_width, thumb_border_color, trash FROM ".$iTable." WHERE id = ".$item, ARRAY_A);
					}
					else {
						$row = array(
							'id' => __('Undefined', 'simple-view'),
							'gid' => $gallery,
							'caption' => '',
							'caption2' => '',
							'source_link' => '',
							'source_type' => 'image',
							'content' => '',
							'content_type' => 'thumbnail',
							'code_before' => '',
							'code_after' => '',
							'thumb_padding' => $options['thumb_padding'],
							'thumb_margins' => $options['thumb_margins'],
							'thumb_border_width' => $options['thumb_border_width'],
							'thumb_border_color' => $options['thumb_border_color'],
							'trash' => false
						);
					}
					?>
<div class="wrap">
	<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
		<div class="icon32" style="background: url('<?php echo WP_PLUGIN_URL.'/simple-view/images/sv-item-32.png' ?>') no-repeat transparent; "><br/></div>
		<h2><?php echo ( ( $action === 'new' ) ? __('New Item', 'simple-view') : __('Edit Item', 'simple-view').' ('.$item.')' ); ?></h2>
		<div class="metabox-holder has-right-sidebar" id="poststuff">
			<div id="side-info-column" class="inner-sidebar">
				<div id="side-info-column" class="meta-box-sortables ui-sortable">
					<div id="submitdiv" class="postbox ">
						<div class="handlediv" title="<?php _e('Click to toggle', 'simple-view'); ?>"><br/></div>
						<h3 class="hndle"><span><?php _e('Save', 'simple-view');?></span></h3>
						<div class="inside">
							<div id="submitpost" class="submitbox">
								<div id="minor-publishing">
									<div id="minor-publishing-actions">
										<div id="save-action"> </div>
										<div id="preview-action">
											<a id="post-preview" class="preview button" href='<?php echo admin_url('admin.php'); ?>?page=simple-view-galleries&action=items&mode=active&item=<?php echo $row['gid'] ?>'><?php _e('Back to Items List', 'simple-view') ?></a>
										</div>
										<div class="clear"></div>
									</div>
									<div id="misc-publishing-actions">
										<div class="misc-pub-section">
											<label for="item_id"><?php echo __('Item ID', 'simple-view').':'; ?></label>
											<span id="post-status-display"><?php echo $row['id']; ?></span>
											<input type="hidden" id="item_id" name="item_id" value="<?php echo $row['id']; ?>" />
											<input type="hidden" id="gallery_id" name="gallery_id" value="<?php echo $row['gid']; ?>" />
										</div>
										<div class="misc-pub-section">
											<div style="text-align: center;">
											<?php
											if( $action !== 'new' ) {
												$rev = 'group:I'.$row['id'];
												if(!is_null($row['caption']) && ($row['caption'] !== '')) $rev .= ' caption:`'.$row['caption'].'`';
												if(!is_null($row['caption2']) && ($row['caption2'] !== '')) $rev .= ' caption2:`'.$row['caption2'].'`';
												
												if( $row['content_type'] === 'thumbnail' ) {
													?>
													<a id="thumb-link" class="floatbox" rev="<?php echo $rev;?>" href='<?php echo $row['source_link'] ?>'><img id="thumb" style="width: auto; height: auto; padding: <?php echo $row['thumb_padding']; ?>px; margin: <?php echo $row['thumb_margins']; ?>px; border: <?php echo $row['thumb_border_width']; ?>px solid #<?php echo $row['thumb_border_color']; ?> ;" src="<?php echo $row['content']; ?>" />	
													<?php
												}
												elseif( $row['content_type'] === 'youtube' ) {
													?>
													<a id="thumb-link" class="floatbox" rev="<?php echo $rev;?>" href='http://www.youtube.com/watch?v=<?php echo $row['content'] ?>'><img id="thumb" style="width: auto; height: auto; padding: <?php echo $row['thumb_padding']; ?>px; margin: <?php echo $row['thumb_margins']; ?>px; border: <?php echo $row['thumb_border_width']; ?>px solid #<?php echo $row['thumb_border_color']; ?> ;" src="http://i.ytimg.com/vi/<?php echo $row['content']; ?>/default.jpg" />	
													<?php
												}
												elseif( $row['content_type'] === 'text' ) {
													echo '<a class="floatbox" rev="'.$rev.'" href="'.$row['source_link'].'">'.$row['content'];
												}
											}
											?></a>
											</div>
										</div>
										<div class="misc-pub-section">
											<label for="trash_no"><input type="radio" id="trash_no" value="false" name="trash" <?php if (!$row['trash']) { echo 'checked="checked"'; }?> >  <?php _e('Item Is Active', 'simple-view'); ?></label><br/>
											<label for="trash_yes"><input type="radio" id="trash_yes" value="true" name="trash" <?php if ($row['trash']) { echo 'checked="checked"'; }?> >  <?php _e('Is In Trash', 'simple-view'); ?></label>
										</div>
									</div>
									<div class="clear"></div>
								</div>
								<div id="major-publishing-actions">
									<div id="delete-action">
										<a class="submitdelete deletion" href='<?php echo admin_url('admin.php'); ?>?page=simple-view-galleries&action=items&mode=active&item=<?php echo $row['gid'] ?>'><?php _e('Cancel', 'simple-view') ?></a>
									</div>
									<div id="publishing-action">
										<input type="submit" class='button-primary' name="update_item" value="<?php _e('Save', 'simple-view') ?>" />
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
					<div id="thumbsettingsdiv" class="postbox">
						<div class="handlediv" title="<?php _e('Click to toggle', 'simple-view'); ?>"><br/></div>
						<h3 class="hndle"><span><?php _e('Thumbnail Settings', 'simple-view');?></span></h3>
						<div class="inside">
							<h5><?php echo (__('Thumbnail Padding', 'simple-view').':');?></h5>
							<p>
								<label class="screen-reader-text" for="thumb_padding"><strong><?php echo (__('Thumbnail Padding', 'simple-view').':');?></strong></label>
								<input id="thumb_padding" type="text" name="thumb_padding" value="<?php echo $row['thumb_padding']; ?>" />
							</p>
							<h5><?php echo (__('Thumbnail Margins', 'simple-view').':');?></h5>
							<p>
								<label class="screen-reader-text" for="thumb_margins"><strong><?php echo (__('Thumbnail Margins', 'simple-view').':');?></strong></label>
								<input id="thumb_margins" type="text" name="thumb_margins" value="<?php echo $row['thumb_margins']; ?>" />
							</p>
							<h5><?php echo (__('Thumbnail Border Width', 'simple-view').':');?></h5>
							<p>
								<label class="screen-reader-text" for="thumb_border_width"><strong><?php echo (__('Thumbnail Border Width', 'simple-view').':');?></strong></label>
								<input id="thumb_border_width" type="text" name="thumb_border_width" value="<?php echo $row['thumb_border_width']; ?>" />
							</p>
							<h5><?php echo (__('Thumbnail Border Color', 'simple-view').':');?></h5>
							<p>
								<label class="screen-reader-text" for="thumb_border_color"><strong><?php echo (__('Thumbnail Border Color', 'simple-view').':');?></strong></label>
								<input id="thumb_border_color" type="text" name="thumb_border_color" value="<?php echo $row['thumb_border_color']; ?>" />
							</p>
						</div>
					</div>
				</div>
			</div>
			<div id="post-body">
				<div id="post-body-content">
					<div id="titlediv">
						<div id="titlewrap">
							<label class="screen-reader-text" for="title"><?php _e('Title', 'simple-view'); ?></label>
							<input id="title" type="text" autocomplete="off" tabindex="1" size="30" name="item_caption" value="<?php echo $row['caption']; ?>" />
						</div>
					</div>
					<div id="normal-sortables" class="meta-box-sortables ui-sortable">
						<div id="codediv" class="postbox ">
							<div class="handlediv" title="<?php _e('Click to toggle', 'simple-view'); ?>"><br/></div>
							<h3 class="hndle"><span><?php _e('General Settings', 'simple-view');?></span></h3>
							<div class="inside">
								<p>
									<label for="caption2"><strong><?php echo __('Caption 2', 'simple-view').':' ?></strong></label>
									<input id="caption2" class="code" type="text" tabindex="2" name="caption2" value="<?php echo $row['caption2']; ?>" style="width:99%" />
									<?php _e('FloatBox can serve two captions. First Caption located in the area of control panel. Second Caption (Caption 2) located above the area of media content.', 'simple-view'); ?>
								</p>
								<div class="clear"><br/></div>
								<!--<p><?php _e('Enter the code to output before and after the codes of gallery item.', 'simple-view');?></p>-->
								<p>
									<label for="code_before"><strong><?php echo __('Code Before', 'simple-view').':'; ?></strong></label>
									<input id="code_before" class="code" type="text" tabindex="3" name="code_before" value="<?php echo htmlspecialchars(stripslashes($row['code_before'])); ?>" style="width:99%" />
								</p>
								<p>
									<label for="code_after"><strong><?php echo __('Code After', 'simple-view').':'; ?></strong></label>
									<input id="code_after" class="code" type="text" tabindex="4" name="code_after" value="<?php echo htmlspecialchars(stripslashes($row['code_after'])); ?>" style="width:99%" />
									<?php _e('You can enter any HTML codes here for the further withdrawal of their before and after the code of multimedia gallery item.', 'simple-view'); ?>
								</p>
							</div>
						</div>
					</div>
					<div id="sources" <?php if($row['content_type'] === 'youtube') echo 'style="display: none;" '; ?>class="meta-box-sortables ui-sortable">
						<div id="codediv" class="postbox ">
							<div class="handlediv" title="<?php _e('Click to toggle', 'simple-view'); ?>"><br/></div>
							<h3 class="hndle"><span><?php _e('Source Settings', 'simple-view');?></span></h3>
							<div class="inside">
								<p>
									<label for="source_link"><strong><?php echo __('Source', 'simple-view').':' ?></strong></label>
									<input id="source_link" class="code" type="text" tabindex="2" name="source_link" value="<?php echo $row['source_link']; ?>" style="width:99%" />
								</p>
								<p>
									<label for="source_type_image"><input type="radio" id="source_type_image" name="source_type" value="image" <?php if($row['source_type'] == 'image') { echo 'checked="checked"'; } ?> />&nbsp;<?php _e('Image', 'simple-view'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label for="source_type_video"><input type="radio" id="source_type_video" name="source_type" value="video" <?php if($row['source_type'] == 'video') { echo 'checked="checked"'; } ?> />&nbsp;<?php _e('Video', 'simple-view'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label for="source_type_site"><input type="radio" id="source_type_site" name="source_type" value="site" <?php if($row['source_type'] == 'site') { echo 'checked="checked"'; } ?> />&nbsp;<?php _e('Site', 'simple-view'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label for="source_type_html"><input type="radio" id="source_type_html" name="source_type" value="html" <?php if($row['source_type'] == 'html') { echo 'checked="checked"'; } ?> />&nbsp;<?php _e('HTML', 'simple-view'); ?></label>
								</p>
								<p id="source-help">
									<?php
										switch($row['source_type']) {
											case 'image':
											case 'video':
												_e('Enter the URL of the source or use the tools below.', 'simple-view');
												break;
											case 'site':
											case 'html':
												_e('Enter the URL of the remote source.', 'simple-view');
												break;
										}
									?>
								</p>
								<div class="clear"><br/></div>
								<div id="source_tools" <?php if(($row['source_type'] === 'site') || ($row['source_type'] === 'html') || (($row['source_type'] === 'video') && ($row['content_type'] === 'youtube'))) echo 'style="display: none;"'; ?>>
									<p>
										<label for="files_list"><strong><?php echo (__('Select File', 'simple-view').':'); ?></strong></label>
										<select id="files_list" name="files_list" size="1"  dir="ltr" style="width: auto;">
											<?php $this->getFilesList($options['galleryDir'], array('floatbox-backup')); ?>
										</select>&nbsp;&nbsp;
										<input id="add-file-button" type="button" class="button-secondary" value="<?php _e('Apply', 'simple-view');?>" />	<br/>	
										<?php _e("Select file from your blog server.", 'simple-view'); ?>								
									</p>
									<p>
										<label for="upload-file-button"><strong><?php echo (__('Upload File', 'simple-view').':'); ?></strong></label>
										<input id="upload-file-button" type="button" class="button-secondary" name="upload_media" value="<?php _e('Upload', 'simple-view');?>" />
										<span id="uploading"></span><br/>
										<span id="uploading-help"><?php _e("Select and upload file from your local computer.", 'simple-view'); ?></span>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div id="contents" class="meta-box-sortables ui-sortable">
						<div id="codediv" class="postbox ">
							<div class="handlediv" title="<?php _e('Click to toggle', 'simple-view'); ?>"><br/></div>
							<h3 class="hndle"><span><?php _e('Link Content Settings', 'simple-view');?></span></h3>
							<div class="inside">
								<p>
									<label for="link_content"><strong id="link-content"><?php echo (($row['content_type'] !== 'youtube') ? __('Link Content', 'simple-view') : __('YouTube Clip ID', 'simple-view')).':' ?></strong></label>
									<input id="link_content" class="code" type="text" tabindex="2" name="link_content" value="<?php echo $row['content']; ?>" style="width:99%" />
								</p>
								<p>
									<label for="content_type_thumb"><input type="radio" id="content_type_thumb" name="content_type" value="thumbnail" <?php if($row['content_type'] == 'thumbnail') { echo 'checked="checked"'; } ?> />&nbsp;<?php _e('Thumbnail', 'simple-view'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label for="content_type_text"><input type="radio" id="content_type_text" name="content_type" value="text" <?php if($row['content_type'] == 'text') { echo 'checked="checked"'; } ?> />&nbsp;<?php _e('Text', 'simple-view'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label id="youtube-input" <?php if($row['source_type'] !== 'video') echo 'style="display: none;" '; ?>for="content_type_youtube"><input type="radio" id="content_type_youtube" name="content_type" value="youtube" <?php if($row['content_type'] == 'youtube') { echo 'checked="checked"'; } ?> />&nbsp;<?php _e('YouTube', 'simple-view'); ?></label>
								</p>
								<p id="content-help">
									<?php
										switch($row['content_type']) {
											case 'thumbnail':
												_e('Enter the URL of the link content or use the tools below.', 'simple-view');
												break;
											case 'text':
												_e('Enter the text of the link content.', 'simple-view');
												break;
											case 'youtube':
												_e('Enter the YouTube ID.', 'simple-view');
												break;
										}
									?>
								</p>
								<div id="content_tools" <?php if($row['content_type'] !== 'thumbnail') echo 'style="display: none;"'; ?>>
									<p>
										<label for="thumb_list"><strong><?php	echo (__('Select File', 'simple-view').':');?></strong></label>
										<select id="thumb_list" name="thumb_list" size="1"  dir="ltr" style="width: auto;">
											<?php $this->getFilesList($options['galleryDir'], array('floatbox-backup')); ?>
										</select>&nbsp;&nbsp;
										<input id="add-thumb-button" type="button" class="button-secondary" value="<?php _e('Apply', 'simple-view');?>" /><br/>
										<?php _e("Select file from your blog server.", 'simple-view'); ?>									
									</p>
									<p>
										<label for="upload-thumb-button"><strong><?php echo (__('Upload File', 'simple-view').':'); ?></strong></label>
										<input id="upload-thumb-button" type="button" class="button-secondary" name="upload_media" value="<?php _e('Upload', 'simple-view');?>" />
										<span id="thumb-uploading"></span><br/>
										<span id="thumb-uploading-help"><?php _e("Select and upload file from your local computer.", 'simple-view'); ?></span>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
					<?php
					break;
			}
		}
		
		function svAdminPage() {
			$svOptions = $this->getPluginOptions();
			$options = array(
				array(
					"name" => __('General Settings', 'simple-view'),
					"disp" => "startSection"
				),
				array(
					"name" => __("Gallery Path", "simple-view"),
					"desc" => __("The path to the directory where the files of galleries are placed.", "simple-view"),
					"id" => "galleryDir",
					"disp" => "text",
					"textLength" => "99%"
				),
				array(
					"name" => __("Gallery URL", "simple-view"),
					"desc" => __("URL of galleries files.", "simple-view"),
					"id" => "galleryURL",
					"disp" => "text",
					"textLength" => "99%"
				),
				array(
					"name" => __("Galleries per Page", "simple-view"),
					"desc" => __("How many galleries per page you want to see on galleries management page.", "simple-view"),
					"id" => "galleriesPerPage",
					"disp" => "text"
				),
				array(
					"name" => __("Items per Page", "simple-view"),
					"desc" => __("How many items per page you want to see on items management page.", "simple-view"),
					"id" => "itemsPerPage",
					"disp" => "text"
				),
				array(
					"name" => __("Delete parameters during deactivation", "simple-view"),
					"desc" => __("If 'Yes', the parameters of the plugin will be deleted during manual (not during updating from 'Plugins' page) deactivation of the plugin. In other case, parameters will be not deleted.", 'simple-view'),
					"id" => "delOptions",
					"disp" => "radio",
					"options" => array( 'true' => __("Yes", "simple-view"), 'false' => __("No", "simple-view"))
				),
				array(
					"disp" => "endSection"
				),
				array(
					"name" => __('Default New Gallery Settings', 'simple-view'),
					"disp" => "startSection"
				),
				array(
					"name" => __("Default code before gallery code", "simple-view"),
					"desc" => __("The code to output before the codes of gallery.", "simple-view"),
					"id" => "gCodeBefore",
					"disp" => "text",
					"textLength" => "99%"
				),
				array(
					"name" => __("Default code after gallery code", "simple-view"),
					"desc" => __("The code to output after the codes of gallery.", "simple-view"),
					"id" => "gCodeAfter",
					"disp" => "text",
					"textLength" => "99%"
				),
				array(
					"disp" => "endSection"
				),
				array(
					"name" => __('Default New Gallery Item Settings', 'simple-view'),
					"disp" => "startSection"
				),
				array(
					"name" => __("Default code before gallery item code", "simple-view"),
					"desc" => __("The code to output before the codes of gallery item.", "simple-view"),
					"id" => "iCodeBefore",
					"disp" => "text",
					"textLength" => "99%"
				),
				array(
					"name" => __("Default code after gallery item code", "simple-view"),
					"desc" => __("The code to output after the codes of gallery item.", "simple-view"),
					"id" => "iCodeAfter",
					"disp" => "text",
					"textLength" => "99%"
				),
				array(
					"disp" => "endSection"
				),
				array(
					"name" => __('Default Thumbnail Settings', 'simple-view'),
					"disp" => "startSection"
				),
				array(
					"name" => __("Default Thumbnail Padding", "simple-view"),
					"desc" => __("Define default thumbnail padding.", "simple-view"),
					"id" => "thumb_padding",
					"disp" => "text"
				),
				array(
					"name" => __("Default Thumbnail Margins", "simple-view"),
					"desc" => __("Define default thumbnail margins.", "simple-view"),
					"id" => "thumb_margins",
					"disp" => "text"
				),
				array(
					"name" => __("Default Thumbnail Border Width", "simple-view"),
					"desc" => __("Define default thumbnail border width.", "simple-view"),
					"id" => "thumb_border_width",
					"disp" => "text"
				),
				array(
					"name" => __("Default Thumbnail Border Color", "simple-view"),
					"desc" => __("Define default thumbnail border color.", "simple-view"),
					"id" => "thumb_border_color",
					"disp" => "text"
				),
				array(
					"name" => __("Allow Auto Thumbnailing", "simple-view"),
					"desc" => __("If 'Yes', thumbnail for uploaded image will be created automatically just after end of upload process (for images only).", 'simple-view'),
					"id" => "autoThumbnail",
					"disp" => "radio",
					"options" => array( 'true' => __("Yes", "simple-view"), 'false' => __("No", "simple-view"))
				),
				array(
					"name" => __("Thumbnail Big Size", "simple-view"),
					"desc" => __("Define thumbnail big side size for 'auto thumbnailing'.", "simple-view"),
					"id" => "thumbBigSize",
					"disp" => "text"
				),
				array(
					"name" => __("Default Auto Thumbnail Suffix", "simple-view"),
					"desc" => __("Define image name suffix for 'auto thumbnailing' (i.e '-thumb', image: bmw5.jpg, thumbnail: bmw5-thumb.jpg).", "simple-view"),
					"id" => "thumbSuffix",
					"disp" => "text"
				),				
				array(
					"disp" => "endSection"
				)
			);
			
			if (isset($_POST['update_svSettings'])) {
				foreach ($options as $value) {
					if (isset($_POST[$value['id']])) $svOptions[$value['id']] = $_POST[$value['id']];
				}
				update_option($this->pluginOptionsName, $svOptions);
				if (!is_dir($svOptions['galleryDir'])) mkdir($svOptions['galleryDir']);
				if (!is_dir($svOptions['galleryDir'].'/floatbox-backup')) mkdir($svOptions['galleryDir'].'/floatbox-backup');
				?>
<div class="updated"><p><strong><?php _e("Simple View Settings Updated.", "simple-view");?></strong></p></div>        
				<?php
			}
			
			if(!$this->isFbInstalled()) {
				?>
<div class="error"><p><strong><?php echo __("FloatBox library is not installed! Go to the ", "simple-view").'<a href="'.admin_url('admin.php').'?page=floatbox-install">'.__('Floatbox Installation Page', 'simple-view').'</a> '.__('to install it.', 'simple-view');?></strong></p></div>
				<?php
			}
			
			 ?>
<div class=wrap>
<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
<div class="icon32" style="background: url('<?php echo WP_PLUGIN_URL.'/simple-view/images/sv-icon-32.png' ?>') no-repeat transparent; "><br/></div>
<h2><?php _e("Simple View Settings", "simple-view"); ?></h2>
			<?php foreach ($options as $value) {
				switch ( $value['disp'] ) {
					case 'startSection':
						?>
<div id="poststuff" class="ui-sortable">
<div class="postbox opened">
<h3><?php echo $value['name']; ?></h3>
	<div class="inside">
						<?php
						if (!is_null($value['desc'])) echo '<p>'.$value['desc'].'</p>';
						break;
						
					case 'endSection':
						?>
</div>
</div>
</div>
						<?php
						break;
						
					case 'text':
						if ( is_null($value['textLength']) ) $textLengs = '55px';
						else $textLengs = $value['textLength'];
						?>
<p><strong><?php echo $value['name']; ?></strong>
<br/><?php echo $value['desc']; ?></p>
<p><input type="text" style="height: 22px; font-size: 11px; width: <?php echo $textLengs;?>" value="<?php echo htmlspecialchars(stripslashes($svOptions[$value['id']])); ?>" name="<?php echo $value['id'] ?>" id="<?php echo $value['id'] ?>" /></p>
						<?php
						break;
						
					case 'radio':
						?>
<p><strong><?php echo $value['name']; ?></strong>
<br/><?php echo $value['desc']; ?></p><p>				
						<?php
						foreach ($value['options'] as $key => $option) { ?>
<label for="<?php echo $value['id'].'_'.$key; ?>"><input type="radio" id="<?php echo $value['id'].'_'.$key; ?>" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>" <?php if ($svOptions[$value['id']] == $key) { echo 'checked="checked"'; }?> /> <?php echo $option;?></label>&nbsp;&nbsp;&nbsp;&nbsp;
						<?php }
						?>
</p>			
						<?php 
						break;
						
					case 'select':
						?>
<p><strong><?php echo $value['name']; ?></strong>
<br/><?php echo $value['desc']; ?></p>
<p><select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
						<?php foreach ($value['options'] as $option) { ?>
<option value="<?php echo $option; ?>" <?php if ( $svOptions[$value['id']] == $option) { echo ' selected="selected"'; }?> ><?php echo $option; ?></option>
						<?php } ?>
</select></p>
						<?php
						break;
					
					default:
						
						break;
				}
			}
			?>
<div class="submit">
	<input type="submit" class='button-primary' name="update_svSettings" value="<?php _e('Update Settings', 'simple-view') ?>" />
</div>
</form>
</div>      
      <?php
		}
		
		function fbAdminPage() {
			$sviewOptions = $this->getAdminOptions();
			$languages = array('auto', 'ar', 'bg', 'cs', 'da', 'de', 'el', 'en', 'es', 'fi', 'fr', 'gl', 'hi', 'hr', 'hu', 'it', 'ja', 'nl', 'no', 'pl', 'pt', 'ro', 'ru', 'sk', 'sv', 'th', 'vi', 'zh', 'zh.traditional');
			$options = array (
					array(
					  "type" => "null",
						"disp" => "tabs",
						"options" => array('tabs-General' => __('General', 'simple-view'), 
						                   'tabs-Animation' => __('Animation', 'simple-view'), 
															 'tabs-Navigation' => __('Navigation', 'simple-view'), 
															 'tabs-Slideshow' => __('Slideshow', 'simple-view'),
															 'tabs-Tooltips' => __('Tooltips', 'simple-view')
															 )),
					
					array(
					  "type" => "null",
						"disp" => "startTabPage",
						"id" => "tabs-General",
						"options" => "sections"
						),
					
					array(
						"type" => "null",
						"disp" => "startColumn",
						"options" => "49"),
						
					array(	
						"name" => __('License Key', 'simple-view'),
						"type" => "null",
						"disp" => "startSection" ),
							
					array(	
						"name" => __("License Key", "simple-view"),
						"desc" => __("If you already have license key, enter it here. In other case request it on official site: <a href='http://randomous.com/floatbox/home'>randomous.com</a>", "simple-view"),
						"hint_b" => __("Floatbox is free for use on non-commercial sites such as personal hobby sites and sites associated with public service non-profit organizations. It is also free for all development and test instances of web sites. Candidates for free use may request a license key through the <strong>randomous.com</strong> web site. Eligibility for a free license key will be determined at the sole discretion of the floatbox copyright holder.", 'simple-view'),
						"id" => "licenseKey",
						"type" => "str",
						"disp" => "text",
						"textLength" => "100"),
					
					array(	
						"type" => "null",
						"disp" => "endSection" ),
						
					array(	
						"name" => __('General Options', 'simple-view'),
						"type" => "null",
						"disp" => "startSection" ),
							
					array(	
						"name" => __("Select Theme", "simple-view"),
						"desc" => __("Color theme selecting.", 'simple-view'),
						"hint" => __("Color theme. 'Auto' will use the black theme for images, white for iframe content, and blue for flash and quicktime.", 'simple-view'),
						"id" => "theme",
						"type" => "str",
						"disp" => "select",
						"options" => array( 'auto', 'black', 'white', 'blue', 'yellow', 'red')),
					
					array(	
						"name" => __("Select Images Theme", "simple-view"),
						"desc" => __("Color theme selecting.", 'simple-view'),
						"hint" => __("Default color scheme to use for the different content types. Defaults are black for images, white for html content, and blue for video. Custom is for defining your own styles in the css without overwriting existing the other color schemes.", 'simple-view'),
						"id" => "colorImages",
						"type" => "str",
						"disp" => "select",
						"options" => array( 'black', 'white', 'blue', 'yellow', 'red', 'custom')),
					
					array(	
						"name" => __("Select HTML Theme", "simple-view"),
						"desc" => __("Color theme selecting.", 'simple-view'),
						"hint" => __("Default color scheme to use for the different content types. Defaults are black for images, white for html content, and blue for video. Custom is for defining your own styles in the css without overwriting existing the other color schemes.", 'simple-view'),
						"id" => "colorHTML",
						"type" => "str",
						"disp" => "select",
						"options" => array( 'black', 'white', 'blue', 'yellow', 'red', 'custom')),
					
					array(	
						"name" => __("Select Video Theme", "simple-view"),
						"desc" => __("Color theme selecting.", 'simple-view'),
						"hint" => __("Default color scheme to use for the different content types. Defaults are black for images, white for html content, and blue for video. Custom is for defining your own styles in the css without overwriting existing the other color schemes.", 'simple-view'),
						"id" => "colorVideo",
						"type" => "str",
						"disp" => "select",
						"options" => array( 'black', 'white', 'blue', 'yellow', 'red', 'custom')),
							
					array(	
						"name" => __("Padding", "simple-view"),
						"desc" => __("Width of the area between the floatbox content and the outer floatbox edges.", 'simple-view'),
						"id" => "padding",
						"type" => "int",
						"disp" => "text"),
						
					array(	
						"name" => __("Panel Padding", "simple-view"),
						"desc" => __("Gap above and below the info and control panels.", 'simple-view'),
						"hint" => __("Gap above and below the info and control panels. Provides the vertical spacing between the floatbox outer edge, panel content, and main content.", 'simple-view'),
						"id" => "panelPadding",
						"type" => "int",
						"disp" => "text"),
						
					array(	
						"name" => __("Overlay Opacity", "simple-view"),
						"desc" => __("Opacity of the full-screen page overly.", 'simple-view'),
						"hint" => __("Opacity of the full-screen page overly. 0 is fully transparent, 100 is fully opaque.", 'simple-view'),
						"id" => "overlayOpacity",
						"type" => "int",
						"disp" => "text"),
						
					array(	
						"name" => __("Shadow Type", "simple-view"),
						"desc" => __("Set 3D shadow effect.", 'simple-view'),
						"hint" => __("Set 3D shadow effect. 'drop' sets a 2-sided shadow on right and bottom. 'halo' sets a 4-sided shadow on all sides.", 'simple-view'),
						"id" => "shadowType",
						"type" => "str",
						"disp" => "select",
						"options" => array( 'drop', 'halo', 'none')),
						
					array(	
						"name" => __("Shadow Size", "simple-view"),
						"desc" => __("Sets the size in pixels of shadow.", 'simple-view'),
						"hint" => __("Sets the size in pixels of the 3D drop or halo shadow.", 'simple-view'),
						"id" => "shadowSize",
						"type" => "int",
						"disp" => "select",
						"options" => array( '8', '12', '16', '24')),
						
					array(	
						"name" => __("Round Corners", "simple-view"),
						"desc" => __("Enables round corners.", 'simple-view'),
						"hint" => __("Enables round corners on all corners, on just the top two, or 'none' disables all round corners (and you get square ones).", 'simple-view'),
						"id" => "roundCorners",
						"type" => "str",
						"disp" => "select",
						"options" => array( 'all', 'top', 'none')),
						
					array(	
						"name" => __("Corner Radius", "simple-view"),
						"desc" => __("Defines the corner radius in pixels.", 'simple-view'),
						"hint" => __("When round corners are enabled, this defines the corner radius in pixels.", 'simple-view'),
						"id" => "cornerRadius",
						"type" => "int",
						"disp" => "select",
						"options" => array( '8', '12', '20')),
						
					array(	
						"name" => __("Round Border", "simple-view"),
						"desc" => __("Border around the outside box edge.", 'simple-view'),
						"hint" => __("With round corners, you can have a 1px border around the outside box edge if 'Round Border' is set to 'Yes'.", 'simple-view'),
						"id" => "roundBorder",
						"type" => "int",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),					
						
					array(	
						"name" => __("Outer Border", "simple-view"),
						"desc" => __("Width of the border around the outside edge of the square box.", 'simple-view'),
						"hint" => __("When round corners are turned off (Round Corners: 'none'), this defines the width of the border around the outside edge of the square box.", 'simple-view'),
						"id" => "outerBorder",
						"type" => "int",
						"disp" => "text"),
						
					array(	
						"name" => __("Inner Border", "simple-view"),
						"desc" => __("Width of the inside border around the edge of the main content.", 'simple-view'),
						"id" => "innerBorder",
						"type" => "int",
						"disp" => "text"),
						
					array(	
						"name" => __("Allow Auto Fit Images?", "simple-view"),
						"desc" => __("If set to 'Yes', large images will be proportionately scaled down to fit the current browser window dimensions before being displayed.", 'simple-view'),
						"hint" => __("If set to 'Yes', large images will be proportionately scaled down to fit the current browser window dimensions before being displayed. Use this in conjunction with the Resize Images and Resize Tool options.", 'simple-view'),
						"id" => "autoFitImages",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
						
					array(	
						"name" => __("Allow Resize Images?", "simple-view"),
						"desc" => __("Allows Resize Images.", 'simple-view'),
						"hint" => __("If 'Allow Resize Images' is set to 'Yes', images that have been Auto Sized to fit the screen, that have been resized with drag-resizing, or are displayed larger than the current screen size can be resized using the resize tool.", 'simple-view'),
						"id" => "resizeImages",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
						
					array(	
						"name" => __("Allow Auto Fit Media?", "simple-view"),
						"desc" => __("Allows Auto Fit Media.", 'simple-view'),
						"hint" => __("If set to 'Yes', html and multimedia content will be resized down to fit the screen if it's initially too large.", 'simple-view'),
						"id" => "autoFitOther",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Allow Resize Media?", "simple-view"),
						"desc" => __("Allows Resize Media.", 'simple-view'),
						"hint" => __("If is set to 'Yes', html and multimedia content that has been autoSized to fit the screen, that has been resized with drag-resizing, or is displayed larger than the current screen size can be resized using a small button in the top left corner.", 'simple-view'),
						"id" => "resizeOther",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
						
					array(	
						"name" => __("Resize Tool", "simple-view"),
						"desc" => __("Sets the tool used when Resize Images is enabled.", 'simple-view'),
						"hint" => __("Sets the tool used when Resize Images is enabled. The cursor tool enables clicking on the image to resize and displays a magnifying glass to show when resizing is allowed. The topleft tool is a small semi-transparent button in the top left corner of the image. Resizeable non-image content always uses the top-left button.", 'simple-view'),
						"id" => "resizeTool",
						"type" => "str",
						"disp" => "select",
						"options" => array( 'cursor', 'topleft', 'both')),
						
					array(	
						"type" => "null",
						"disp" => "endSection" ),
						
					array(
						"type" => "null",
						"disp" => "endColumn"),
						
					array(
						"type" => "null",
						"disp" => "columnGap",
						"options" => "2"),
						
					array(
						"type" => "null",
						"disp" => "startColumn",
						"options" => "49"),
						
					array(	
						"name" => __('General Options', 'simple-view'),
						"type" => "null",
						"disp" => "startSection" ),
					
					array(	
						"name" => __("Info Panel Position", "simple-view"),
						"desc" => __("Controls positioning of the info panel in the floatbox frame.", 'simple-view'),
						"hint" => __("Controls positioning of the info panel in the floatbox frame. The info panel is the grouping containing caption, 'image x of y', info and print links. Values are short-hand for top-left, top-center, top-right, bottom-left, bottom-center and bottom-right.", 'simple-view'),
						"id" => "infoPos",
						"type" => "str",
						"disp" => "select",
						"options" => array( 'tl', 'tc', 'tr', 'bl', 'bc', 'br')),
					
					array(	
						"name" => __("Control Panel Position", "simple-view"),
						"desc" => __("Controls positioning of the control panel in the floatbox frame.", 'simple-view'),
						"hint" => __("Controls positioning of the control panel in the floatbox frame. The control panel is the grouping containing control widgets like the close button, <<prev||next>>, etc. Values are short-hand for top-left, top-right, bottom-left and bottom-right.", 'simple-view'),
						"id" => "controlPos",
						"type" => "str",
						"disp" => "select",
						"options" => array('tl', 'tr', 'bl', 'br')),
					
					//array(	
					//	"name" => __("Controls Opacity", "simple-view"),
					//	"desc" => __("Sets the opacity of the controls that appear in the transparent overlay on top of image content if those controls are enabled. These controls are the prev/next navigation buttons and the resize button in the top left corner.", 'simple-view'),
					//	"id" => "controlOpacity",
					//	"type" => "int",
					//	"disp" => "text"),
					
					array(	
						"name" => __("Box Left", "simple-view"),
						"desc" => __("By default, the main floatbox frame will be centered in the viewable browser screen area (with a little offset toward the top) ...", 'simple-view'),
						"hint" => __("By default, the main floatbox frame will be centered in the viewable browser screen area (with a little offset toward the top). The Box Left and Box Top options can be used to override this default positioning. If set to simple integers, those integers will be taken as pixel values to place the floatbox at. These pixel values are relative to the browser window, like fixed positioning, and not to the underlying document. These options can also be set to percentage values such as '-50%'. This will cause the floatbox frame to shift position that portion of the available free space. For example, a Box Left setting of '-50%' will move floatbox half way to the left edge of the browser window. To use default centering, set Box Left and Box Top to 'auto'.", 'simple-view'),
						"id" => "boxLeft",
						"type" => "str",
						"disp" => "text"),
						
					array(	
						"name" => __("Box Top", "simple-view"),
						"desc" => __("See Box Left ...", 'simple-view'),
						"id" => "boxTop",
						"type" => "str",
						"disp" => "text"),
					
					array(	
						"name" => __("Enable Drag Move?", "simple-view"),
						"desc" => __("Enables Drag Move.", 'simple-view'),
						"hint" => __("If 'Yes', floatbox can be dragged around the screen by holding down the left mouse button on the floatbox frame outside of the main content area.", 'simple-view'),
						"id" => "enableDragMove",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
						
					array(	
						"name" => __("Enable Sticky Drag Move?", "simple-view"),
						"desc" => __("Enables Sticky Drag Move.", 'simple-view'),
						"hint" => __("In sets of multiple floatbox items (galleries), if Sticky Drag Move is 'No' the dragged location is not retained when navigating to the next item. Floatbox will return to its centered position with each new item. When stickyDragMove is 'Yes', floatbox remembers its new screen position acress item change-overs.", 'simple-view'),
						"id" => "stickyDragMove",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
						
					array(	
						"name" => __("Enable Drag Resize?", "simple-view"),
						"desc" => __("Enables Drag Resize.", 'simple-view'),
						"hint" => __("If 'Yes', a small resize widget will be shown in the bottom right corner that people can drag with the mouse to resize the box. Note that multimedia items (direct flash, etc.) will not show the resize widget because these items do not resize with the box window.", 'simple-view'),
						"id" => "enableDragResize",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
						
					array(	
						"name" => __("Enable Sticky Drag Resize?", "simple-view"),
						"desc" => __("Enables Sticky Drag Resize.", 'simple-view'),
						"hint" => __("As with 'Sticky Drag Move', 'Sticky Drag Resize' instructs 'floatbox' to remember dragged size change between different items in a gallery.", 'simple-view'),
						"id" => "stickyDragResize",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Dragger Location", "simple-view"),
						"desc" => __("Sets Dragger Location.", 'simple-view'),
						"hint" => __("The widget that is shown when 'Enable Drag Resize' is 'Yes' can be placed either in the bottom right corner of the floatbox frame or the bottom right corner of the actual content by setting this option.", 'simple-view'),
						"id" => "draggerLocation",
						"type" => "str",
						"disp" => "select",
						"options" => array('frame', 'content')),
					
					array(	
						"name" => __("Center on Resize", "simple-view"),
						"desc" => __("Enables Center on Resize.", 'simple-view'),
						"hint" => __("When set to 'Yes', floatbox will reposition itself toward the center of the screen when the browser window is resized.", 'simple-view'),
						"id" => "centerOnResize",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Show Caption", "simple-view"),
						"desc" => __("Enables Show Caption.", 'simple-view'),
						"hint" => __("Controls display of the caption shown in the info panel. This just turns it on or off. See the 'caption' option down below for details on how to set the caption content.", 'simple-view'),
						"id" => "showCaption",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Show Item Number", "simple-view"),
						"desc" => __("Enables Show Item Number.", 'simple-view'),
						"hint" => __("Controls display of the 'image/page x of y' text that appears below the caption. Note that the text displayed is configured in the 'Image Count' and 'iFrame Count' language localization options.", 'simple-view'),
						"id" => "showItemNumber",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Show Close", "simple-view"),
						"desc" => __("Enables display of the close button in the bottom right corner.", 'simple-view'),
						"hint" => __("Enables/disables display of the close button in the bottom right corner.", 'simple-view'),
						"id" => "showClose",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Hide Objects", "simple-view"),
						"desc" => __("Enables hiding embeds on widget loading.", 'simple-view'),
						"hint" => __("If 'Yes', objects and embeds (flash, quicktime, silverlight, etc.) on the host page will be hidden before floatbox loads. This is generally a good idea as most objects will appear on top of the floatbox display if not hidden. Flash objects using the default wmode of 'window' have this problem (feature?). If you set your flash obejcts to have a wmode of 'opaque' or 'transparent' they will not appear over top of the other content and you won't need to enable 'Hide Objects'", 'simple-view'),
						"id" => "hideObjects",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Hide Java", "simple-view"),
						"desc" => __("Like 'Hide Flash' ...", 'simple-view'),
						"hint" => __("Just like 'Hide Flash' but for Java applets.", 'simple-view'),
						"id" => "hideJava",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Disable Scroll", "simple-view"),
						"desc" => __("If 'Yes', floatbox will use fixed positioning.", 'simple-view'),
						"hint" => __("If 'Yes', floatbox will use fixed positioning. Fixed positioning locks floatbox in a fixed screen location that will not move in response to scrollbar actions. Because scrolling is not available when fixed positioning is used, it is not set if the current displayed content is larger than the available screen dimensions. Note that fixed positioning is always set for iframe and quicktime content in firefox 2 (if it fits the screen) to workaround some display issues with that browser, and it is never set for IE6 because IE6 can't do it.", 'simple-view'),
						"id" => "disableScroll",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Random Order", "simple-view"),
						"desc" => __("Gallery sets of multiple items normally are ordered by their position in the html document they come from.", 'simple-view'),
						"hint" => __("Gallery sets of multiple items normally are ordered by their position in the html document they come from. By setting Random Order to true, you can shuffle your gallery sets to a random order. This can be a nice touch for some slideshows.", 'simple-view'),
						"id" => "randomOrder",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Preload All", "simple-view"),
						"desc" => __("Enables Preloading.", 'simple-view'),
						"hint" => __("If 'Yes', floatbox will aggressively preload all images that are referenced by floatboxed anchors. This makes floatbox quite responsive as images are available and can be displayed as soon as the site visitor clicks on or navigates to one. If you wish to lighten your server load, you can set preloadAll to false. In this event, the first image found will be preloaded and the next image in a group will be loaded right after the display of the current image, but the others will not be fetched. The site visitor may then have to wait for the loading of clicked item.", 'simple-view'),
						"id" => "preloadAll",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Auto Gallery", "simple-view"),
						"desc" => __("Enables auto adding all images on page to gallery.", 'simple-view'),
						"id" => "autoGallery",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Auto Title", "simple-view"),
						"desc" => __("Defines Auto Title.", 'simple-view'),
						"hint" => __("When Auto Gallery is enabled, you can set a floatbox title for all images on the page by assigning a title string to the Auto Title option. (Existing title attributes on anchors take precedence over the Auto Title.)", 'simple-view'),
						"id" => "autoTitle",
						"type" => "str",
						"disp" => "text"),
					
					array(	
						"name" => __("Language", "simple-view"),
						"desc" => __("Floatbox provides international localization through the json files in the languages folder.", 'simple-view'),
						"hint" => __("Floatbox provides international localization through the json files in the languages folder. When the language option is set to 'auto', floatbox will detect the visitor's browser language preference and use that language for it's tooltips and other text. You can force a particular language by seeting it here. Doing this will set that language for everyone visisting your site, regardless of where they are coming from.", 'simple-view'),
						"id" => "language",
						"type" => "str",
						"disp" => "select",
						"options" => $languages),
					
					array(	
						"name" => __("Graphics Type", "simple-view"),
						"desc" => __("Graphics Type is closely related to the language option.", 'simple-view'),
						"hint" => __("Graphics Type is closely related to the language option. When set to 'auto', visitors with localized English language browsers will see the floatbox control graphics that contain English text such as 'close' and 'next' while non-English browser users will see graphics-only controls without the English text on them. You can force all browsers to see the graphics-only controls by setting graphicsType to 'international', or force English controls with the 'english' option.", 'simple-view'),
						"id" => "graphicsType",
						"type" => "str",
						"disp" => "select",
						"options" => array('auto', 'international', 'english')),
						
					array(	
						"type" => "null",
						"disp" => "endSection" ),
						
					array(
						"type" => "null",
						"disp" => "endColumn"),
					
					array(
					  "type" => "null",
						"disp" => "endTabPage",
						"id" => "tabs-General",
						"options" => "sections"
						),

					array(
					  "type" => "null",
						"disp" => "startTabPage",
						"id" => "tabs-Animation",
						"options" => ""
						),
						
					array(	
						"name" => __('Animation Options', 'simple-view'),
						"type" => "null",
						"disp" => "startSection" ),
					
					array(	
						"name" => __("Do Animations", "simple-view"),
						"desc" => __("Setting 'Do Animations' to 'No' is a short-hand way of setting 'Resize Duration', 'Image Fade Duration' and 'Overlay Fade Duration' all to 0.", 'simple-view'),
						"id" => "doAnimations",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
						
					array(	
						"name" => __("Resize Duration", "simple-view"),
						"desc" => __("Controls the speed at which animated resizing occurs.", 'simple-view'),
						"hint" => __("Controls the speed at which animated resizing occurs. 0 = no resize animation, 1 is fast, 10 is slooow. These are unit-less numbers, and don't equate to a fixed time period. Larger size changes will take longer than smaller size changes.", 'simple-view'),
						"id" => "resizeDuration",
						"type" => "float",
						"disp" => "text"),
						
					array(	
						"name" => __("Image Fade Duration", "simple-view"),
						"desc" => __("Controls the speed of the opacity fade-in for images as they come into the display.", 'simple-view'),
						"hint" => __("Controls the speed of the opacity fade-in for images as they come into the display. 0 = no image fade-in, 1 is fast, 10 is slooow. These too are unit-less numbers.", 'simple-view'),
						"id" => "imageFadeDuration",
						"type" => "float",
						"disp" => "text"),
						
					array(	
						"name" => __("Overlay Fade Duration", "simple-view"),
						"desc" => __("Controls the speed of the opacity fade-in and fade-out for the translucent overlay which covers the host page.", 'simple-view'),
						"hint" => __("Controls the speed of the opacity fade-in and fade-out for the translucent overlay which covers the host page. 0 = no overlay fading in or out, 1 is fast, 10 is slooow. Unit-less.", 'simple-view'),
						"id" => "overlayFadeDuration",
						"type" => "float",
						"disp" => "text"),
					
					array(	
						"name" => __("Start at Click", "simple-view"),
						"desc" => __("If 'Yes' (and Resize Duration is not 0) floatbox will expand out from the clicked anchor and shrink back to that anchor when closed. If 'No', floatbox will start and end from the center of the screen.", 'simple-view'),
						"id" => "startAtClick",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Zoom Image on Start", "simple-view"),
						"desc" => __("If 'Yes' (and Resize Duration is not 0) images will expand out from the clicked thumbnail on start and collapse back to the thumbnail on exit.", 'simple-view'),
						"id" => "zoomImageStart",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Live Image Resize", "simple-view"),
						"desc" => __("If 'Yes' (and Resize Duration is not 0) images will remain displayed while they are being resized.", 'simple-view'),
						"hint" => __("If 'Yes' (and Resize Duration is not 0) images will remain displayed while they are being resized. If 'No' they will be hidden during a resize and the 'loading' gif displayed in their place.", 'simple-view'),
						"id" => "liveImageResize",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Split Resize", "simple-view"),
						"desc" => __("Default animated resizing of floatbox resizes width, height, top and left simultaneously.", 'simple-view'),
						"hint" => __("Default animated resizing of floatbox resizes width, height, top and left simultaneously. The settings other than 'no' give sequenced animation where the X and Y dimensions are resized seperately. The two options 'wh' and 'hw' force either width or height to always go first. The better 'Split Resize' option is probably 'auto'. This will always do the smallest dimension first. Using a Split Resize of auto prevents unaesthetic resize behaviour of initially bloating up in the larger dimension.", 'simple-view'),
						"id" => "splitResize",
						"type" => "str",
						"disp" => "select",
						"options" => array('no', 'auto', 'wh', 'hw')),
						
					array(	
						"type" => "null",
						"disp" => "endSection" ),
					
					array(
					  "type" => "null",
						"disp" => "endTabPage",
						"id" => "tabs-Animation",
						"options" => ""
						),

					array(
					  "type" => "null",
						"disp" => "startTabPage",
						"id" => "tabs-Navigation",
						"options" => ""
						),
						
					array(	
						"name" => __('Navigation Options', 'simple-view'),
						"type" => "null",
						"disp" => "startSection" ),
					
					array(	
						"name" => __("Navigation Type", "simple-view"),
						"desc" => __("Sets the type of navigation controls to display.", 'simple-view'),
						"hint" => __("Sets the type of navigation controls to display. 'overlay' is the 'Prev/Next' image overlay.' 'button' gives '<<prev||next>>' in the control panel. Overlay navigation is not available for html and multi-media content, just for images.", 'simple-view'),
						"id" => "navType",
						"type" => "str",
						"disp" => "select",
						"options" => array('overlay', 'button', 'both', 'none')),
						
					array(	
						"name" => __("Navigation Overlay Width", "simple-view"),
						"desc" => __("Sets the width in percentage (0..50) of each of the left and right transparent overlay nav panels that provide navigation through mouse clicks on the displayed image.", 'simple-view'),
						"hint" => __("Sets the width in percentage (0..50) of each of the left and right transparent overlay nav panels that provide navigation through mouse clicks on the displayed image. If set to 50, each panel will be half the image width and so will meet without a gap in the middle. 40 leaves a 20% gap between panels, etc. If image resizing is enabled and you're using the cursor tool, you'll want to leave a gap between the nav panels so that there's somewhere to click for resizing.", 'simple-view'),
						"id" => "navOverlayWidth",
						"type" => "int",
						"disp" => "text"),
						
					array(	
						"name" => __("Navigation Overlay Position", "simple-view"),
						"desc" => __("When the mouse is active over an image with Navigation Type 'overlay' or 'both' set, small prev/next graphics are displayed.", 'simple-view'),
						"hint" => __("When the mouse is active over an image with Navigation Type 'overlay' or 'both' set, small prev/next graphics are displayed. This setting is the percentage height from the image top that these graphics will appear. 0 puts them right at the top, and 100 places them at the bottom of the image.", 'simple-view'),
						"id" => "navOverlayPos",
						"type" => "int",
						"disp" => "text"),
					
					array(	
						"name" => __("Show Navigation Overlay", "simple-view"),
						"desc" => __("Controls display of the overlay navigation prev and next graphics.", 'simple-view'),
						"hint" => __("Controls display of the overlay navigation prev and next graphics. If set to 'once', these graphics will be displayed only for the first image shown, after which they are turned off. When the overlay nav graphics are turned off overlay nav still works, it is just not displayed. The idea is that once people are told what the mouse does over the image, they don't need to keep seeing the prev/next graphics continuously. When both the overlay and button nav types are enabled, the button nav controls will highlight as the mouse moves over active image areas.", 'simple-view'),
						"id" => "showNavOverlay",
						"type" => "str",
						"disp" => "select",
						"options" => array('always', 'once', 'never')),
					
					array(	
						"name" => __("Show Hints", "simple-view"),
						"desc" => __("Controls display or mouseover tooltip messages for the nav and control buttons.", 'simple-view'),
						"hint" => __("Controls display or mouseover tooltip messages for the nav and control buttons. These tooltips are intended to be used to inform users about keyboard navigation shortcuts. If set to 'once', each tooltip will deactivate after it has been displayed for sufficient time to be read. They will also be deactivated if the user navigates with the associated keyboard shortcut.", 'simple-view'),
						"id" => "showHints",
						"type" => "str",
						"disp" => "select",
						"options" => array('always', 'once', 'never')),
					
					array(	
						"name" => __("Enable Wrap", "simple-view"),
						"desc" => __("Enables gallery wrapping so that selecting 'next' on the last item wraps to the first, and selecting 'prev' on the first item wraps to the last.", 'simple-view'),
						"hint" => __("Enables gallery wrapping so that selecting 'next' on the last item wraps to the first, and selecting 'prev' on the first item wraps to the last. Because gallery viewing can start anywhere in a series of images, it is probably a good idea to leave this set to true in most circumstances. But if you are displaying something like a series of instructions that always starts with item #1 you may want to turn wrapping off. The 'Enable Wrap' option affects only mouse and keyboard navigation. Even when 'Enable Wrap' is set to 'No', a slideshow will wrap if started with an item other than #1 or if the slideshow 'End Task' is set to 'loop'.", 'simple-view'),
						"id" => "enableWrap",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Enable Keyboard Navigation", "simple-view"),
						"desc" => __("Enables or disables the keyboard handler for prev, next, pause/play, resize and close actions.", 'simple-view'),
						"hint" => __("Enables or disables the keyboard handler for prev, next, pause/play, resize and close actions. If you disable keyboard nav you should also set Show Hints to 'never' or change the default text displayed in the hints.", 'simple-view'),
						"id" => "enableKeyboardNav",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Enable Outside Click Closes", "simple-view"),
						"desc" => __("If set to 'Yes', floatbox will exit when the user clicks on the page overlay outside of the floatbox display.", 'simple-view'),
						"id" => "outsideClickCloses",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("On Image Click Closes", "simple-view"),
						"desc" => __("If set to 'Yes', floatbox will exit when the user clicks on the displayed image.", 'simple-view'),
						"hint" => __("If set to 'Yes', floatbox will exit when the user clicks on the displayed image. When the navigation overlay is active (Navigation Type sets to 'overlay' or 'both'), the click-to-close space is the space left between the left and right navigation areas.", 'simple-view'),
						"id" => "imageClickCloses",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
						
					array(	
						"name" => __("Number of Index Links", "simple-view"),
						"desc" => __("Index links are a grouping of numbered links that will jump floatbox to the selected item when clicked.", 'simple-view'),
						"hint" => __("Index links are a grouping of numbered links that will jump floatbox to the selected item when clicked. They look like this: '<u>1</u> <u>2</u> <u>3</u> <u>4</u> <u>5</u> ...'. If set to 0, no index links will be shown. If set to -1 or to a number greater than the number of items in a gallery group, all index links will be shown - one for each item in the gallery group. If set to a positive integer less than the number of gallery items, only that number of links will be shown. For example, if maxIndexCount = 9 for a 99 item gallery you get something like '<u>1</u> ... <u>12</u> <u>13</u> <u>14</u> 15 <u>16</u> <u>17</u> <u>18</u> ... <u>99</u>'", 'simple-view'),
						"id" => "numIndexLinks",
						"type" => "int",
						"disp" => "text"),
					
					array(	
						"name" => __("Index Links Panel", "simple-view"),
						"desc" => __("The group of indexLinks can be displayed at the bottom of the info panel (caption, 'image x of y', etc.) or the bottom of the control panel (close, prev/next, etc.).", 'simple-view'),
						"id" => "indexLinksPanel",
						"type" => "str",
						"disp" => "select",
						"options" => array('info', 'control')),
					
					array(	
						"name" => __("Show Index Thumbnails", "simple-view"),
						"desc" => __("Controls the display of popup thumbnails in the indexLinks group.", 'simple-view'),
						"hint" => __("Controls the display of popup thumbnails in the indexLinks group. If 'Yes', thumbnail popups will be displayed when an index link is hovered.", 'simple-view'),
						"id" => "showIndexThumbs",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
						
					array(	
						"type" => "null",
						"disp" => "endSection" ),
					
					array(
					  "type" => "null",
						"disp" => "endTabPage",
						"id" => "tabs-Navigation",
						"options" => ""
						),

					array(
					  "type" => "null",
						"disp" => "startTabPage",
						"id" => "tabs-Slideshow",
						"options" => ""
						),
						
					array(	
						"name" => __('Slideshow Options', 'simple-view'),
						"type" => "null",
						"disp" => "startSection" ),
					
					array(	
						"name" => __("Do Slideshow", "simple-view"),
						"desc" => __("If set to true, images in a gallery set will be launched as a slideshow.", 'simple-view'),
						"id" => "doSlideshow",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
						
					array(	
						"name" => __("Slide Interval", "simple-view"),
						"desc" => __("This is the number of seconds to display each image in a slideshow before moving on to the next one.", 'simple-view'),
						"id" => "slideInterval",
						"type" => "int",
						"disp" => "text"),
					
					array(	
						"name" => __("End Task", "simple-view"),
						"desc" => __("Describes what to do when all images in a slideshow have been seen.", 'simple-view'),
						"hint" => __("Describes what to do when all images in a slideshow have been seen. Note that if a slideshow was started on other than the 1st image, it will wrap around until all images have been seen before acting on the End Task directive.", 'simple-view'),
						"id" => "endTask",
						"type" => "str",
						"disp" => "select",
						"options" => array('stop', 'exit', 'loop')),
					
					array(	
						"name" => __("Show Play and Pause", "simple-view"),
						"desc" => __("Turns display of the slideshow play & pause controls on or off.", 'simple-view'),
						"id" => "showPlayPause",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Pause on Start", "simple-view"),
						"desc" => __("If 'Yes', a slideshow will start in a paused state. If 'No', the slideshow will auto-play on start.", 'simple-view'),
						"id" => "startPaused",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Pause on Resize", "simple-view"),
						"desc" => __("If set to 'Yes', the slideshow will pause when the current content is resized through use of the resize tool.", 'simple-view'),
						"id" => "pauseOnResize",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Pause on 'Prev'", "simple-view"),
						"desc" => __("If set to 'Yes', the slideshow will pause when a 'prev' contol is clicked or when the corresponding keyboard action (left arrow) is fired.", 'simple-view'),
						"id" => "pauseOnPrev",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Pause on 'Next'", "simple-view"),
						"desc" => __("If set to 'Yes', the slideshow will pause when a 'next' contol is clicked or when the corresponding keyboard action (right arrow) is fired.", 'simple-view'),
						"id" => "pauseOnNext",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
						
					array(	
						"type" => "null",
						"disp" => "endSection" ),
					
					array(
					  "type" => "null",
						"disp" => "endTabPage",
						"id" => "tabs-Slideshow",
						"options" => ""
						),
					
					array(
					  "type" => "null",
						"disp" => "startTabPage",
						"id" => "tabs-Tooltips",
						"options" => ""
						),
					
					array(	
						"name" => __('Tooltips Options', 'simple-view'),
						"type" => "null",
						"disp" => "startSection" ),
					
					array(	
						"name" => __("Attach To Host", "simple-view"),
						"desc" => __("If set to 'Yes', the tooltip will be placed immediately adjacent to the host element (either above or below) and will not move with the mouse. This allows the mouse to be active inside the open tooltip and thereby allows clickable links to be placed in the tooltip content.", 'simple-view'),
						"id" => "attachToHost",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Move with Mouse", "simple-view"),
						"desc" => __("Not surprisingly, if this is set to 'Yes' the tooltip will move with mouse movements. The default of 'No' leaves the tooltip positioned at its starting location regardless of subsequent mouse moves.", 'simple-view'),
						"id" => "moveWithMouse",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Place Above", "simple-view"),
						"desc" => __("If 'Yes', the tooltip will appear above the host element. The default placement is below the element or mouse cursor depending on whether 'Attach To Host' is set or not. If the requested placement would make the tooltip appear partially offscreen, the placement will be moved so that the entire tooltip shows.", 'simple-view'),
						"id" => "placeAbove",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"name" => __("Timeout", "simple-view"),
						"desc" => __("Number of seconds to show a tooltip before terminating it. The default of zero sets no timeout and the tooltip will be shown as long as the mouse remains hovered.", 'simple-view'),
						"id" => "timeout",
						"type" => "int",
						"disp" => "text"),
					
					array(	
						"name" => __("Delay", "simple-view"),
						"desc" => __("Delay in milliseconds between the element mouseover event and the display of the tooltip.", 'simple-view'),
						"id" => "delay",
						"type" => "int",
						"disp" => "text"),
					
					array(	
						"name" => __("Mouse Speed", "simple-view"),
						"desc" => __("The mouse must be moving at a speed less than mouseSpeed in order for the tooltip to appear.", 'simple-view'),
						"id" => "mouseSpeed",
						"type" => "int",
						"disp" => "text"),
					
					array(	
						"name" => __("Fade Duration", "simple-view"),
						"desc" => __("This is a unitless setting (not seconds) that controls the duration of the opacity fade in and out of the tooltip when it starts and ends. 0 is no fade and 10 is very slow. Note fadeDuration is always 0 for Internet Explorer (all versions) because IE is atrociously bad at fading text and tooltips usually contain text.", 'simple-view'),
						"id" => "fadeDuration",
						"type" => "int",
						"disp" => "text"),
					
					array(	
						"name" => __("Default Cursor", "simple-view"),
						"desc" => __("In most browsers, the mouse cursor will change to a text selection tool whenever it is hovered over text. Setting 'Default Cursor' to 'Yes' forces the default arrow cursor to be in effect for all of the tooltip-enabled host element.", 'simple-view'),
						"id" => "defaultCursor",
						"type" => "bool",
						"disp" => "radio",
						"options" => array( __("Yes", "simple-view"), __("No", "simple-view"))),
					
					array(	
						"type" => "null",
						"disp" => "endSection" ),
					
					array(
					  "type" => "null",
						"disp" => "endTabPage",
						"id" => "tabs-Tooltips",
						"options" => ""
						),
					
					array(
					  "type" => "null",
						"disp" => "endTabs")
				);
				
			if (isset($_POST['update_sviewSettings'])) {
				foreach ($options as $value) {
					switch ($value['type']) {
						case 'bool': 
							if (isset($_POST[$value['id']]))
								$sviewOptions[$value['id']] = (boolean)($_POST[$value['id']] === 'true');
							break;
							
						case 'int':
							if (isset($_POST[$value['id']]))
								$sviewOptions[$value['id']] = (integer)($_POST[$value['id']]);
							break;
							
						case 'float':
							if (isset($_POST[$value['id']]))
								$sviewOptions[$value['id']] = (float)($_POST[$value['id']]);
							break;
							
						case 'str':
							if (isset($_POST[$value['id']]))
								$sviewOptions[$value['id']] = strval($_POST[$value['id']]);
							break;
					
						default:
							break;
					}
				}				
				update_option($this->adminOptionsName, $sviewOptions);
				?>
<div class="updated"><p><strong><?php _e("FloatBox Settings Updated.", "simple-view");?></strong></p></div>        
				<?php
			}
			
			if(!$this->isFbInstalled()) {
				?>
<div class="error"><p><strong><?php echo __("FloatBox library is not installed! Go to the ", "simple-view").'<a href="'.admin_url('admin.php').'?page=floatbox-install">'.__('Floatbox Installation Page', 'simple-view').'</a> '.__('to install it.', 'simple-view');?></strong></p></div>
				<?php
			}
			
			?>
<div class='wrap'>
<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
<div style="background: url('<?php echo WP_PLUGIN_URL.'/simple-view/images/floatbox-32.png' ?>') no-repeat transparent; " class="icon32"></div>
<h2><?php _e("FloatBox Settings", "simple-view"); ?></h2>

  
			<?php foreach ($options as $value) { 
				if (!is_null($value['hint'])) {
					$isHint = TRUE;
					$tooltip = 'tooltip';
					$hint = $value['hint'];
				} elseif (!is_null($value['hint_b'])) {
					$isHint = TRUE;
					$tooltip = 'tooltip_b';
					$hint = $value['hint_b'];
				} else {
					$isHint = FALSE;
				}
				switch ( $value['disp'] ) {
					case 'tabs':
						?>
						<div id='tabs'>
							<ul>
						<?php 
						  foreach ($value['options'] as $key => $option) { 
							  echo  '<li><a href="#'.$key.'">'.$option.'</a></li>'."\n";						  
							}
						?>
						  </ul>
						<?php
						break;
					
					case 'endTabs':
						echo '</div>'."\n";
						break;
					
					case 'startTabPage':
						echo '<div id="'.$value['id'].'">'."\n";
						if ($value['options'] === 'sections') {
						  echo '<table width="100%" border="0" cellpadding="0" cellspacing="0">'."\n";
							echo '  <tr>'."\n"; 
						}
						break;
						
					case 'endTabPage':
						if ($value['options'] === 'sections') {
							echo '  </tr>'."\n";
							echo '</table>'."\n";
						}
						echo '</div>'."\n";
						break;
						
							
					case 'startSection':
						?>
<div id="poststuff" class="ui-sortable">
	<div class="postbox opened">
	<h3><?php echo $value['name']; ?></h3>
		<div class="inside">
						<?php
						break;
						
					case 'endSection':
						?>
		</div>
	</div>
</div>
						<?php
						break;
						
					case 'startColumn':
						?>
<td width="<?php echo $value['options'].'%';?>" valign="top">						
						<?php
						break;
						
					case 'endColumn':
						?>
</td>						
						<?php
						break;
						
					case 'columnGap':
						?>
<td width="<?php echo $value['options'].'%';?>" valign="top">&nbsp;</td>						
						<?php
						break;
					
					case 'text':
						if ( is_null($value['textLength']) ) $textLengs = '55';
						else $textLengs = $value['textLength'];
						?>
			<p<?php if ($isHint) echo ' class="'.$tooltip.'" title="'.$hint.'"'; ?>><strong><?php echo $value['name']; ?></strong>
			<br/><?php echo $value['desc']; ?></p>
			<p><input <?php if ($isHint) echo ' class="'.$tooltip.'" title="'.$hint.'"'; ?> type="text" style="height: 22px; font-size: 11px; width: <?php echo $textLengs;?>px" value="<?php echo $sviewOptions[$value['id']] ?>" name="<?php echo $value['id'] ?>" id="<?php echo $value['id'] ?>" /></p>
						<?php
						break;
					
					case 'radio':
						?>
			<p<?php if ($isHint) echo ' class="'.$tooltip.'" title="'.$hint.'"'; ?>><strong><?php echo $value['name']; ?></strong>
			<br/><?php echo $value['desc']; ?></p>				
						<?php	
						if ($value['type'] == 'bool')	{
						?>
			<p<?php if ($isHint) echo ' class="'.$tooltip.'" title="'.$hint.'"'; ?>><label for="<?php echo $value['id'].'_yes'; ?>"><input type="radio" id="<?php echo $value['id'].'_yes';?>" name="<?php echo $value['id'];?>" value="true" <?php if ($sviewOptions[$value['id']]) { echo 'checked="checked"'; }?> /> <?php echo $value['options'][0];?></label>&nbsp;&nbsp;&nbsp;&nbsp;<label for="<?php echo $value['id'].'_no';?>"><input type="radio" id="<?php echo $value['id'].'_no';?>" name="<?php echo $value['id'];?>" value="false" <?php if (!$sviewOptions[$value['id']]) { echo 'checked="checked"'; }?>/> <?php echo $value['options'][1];?></label></p>			
						<?php	
						}
						elseif ($value['type'] == 'int')	{
						?>
			<p<?php if ($isHint) echo ' class="'.$tooltip.'" title="'.$hint.'"'; ?>><label for="<?php echo $value['id'].'_yes'; ?>"><input type="radio" id="<?php echo $value['id'].'_yes';?>" name="<?php echo $value['id'];?>" value="1" <?php if ($sviewOptions[$value['id']] == 1) { echo 'checked="checked"'; }?> /> <?php echo $value['options'][0];?></label>&nbsp;&nbsp;&nbsp;&nbsp;<label for="<?php echo $value['id'].'_no';?>"><input type="radio" id="<?php echo $value['id'].'_no';?>" name="<?php echo $value['id'];?>" value="0" <?php if ($sviewOptions[$value['id']] == 0) { echo 'checked="checked"'; }?>/> <?php echo $value['options'][1];?></label></p>			
						<?php	
						} 
						else { ?>
						<p<?php if ($isHint) echo ' class="'.$tooltip.'" title="'.$hint.'"'; ?>>
						<?php
							foreach ($value['options'] as $key => $option) { ?>
			<label for="<?php echo $value['id'].'_'.$key; ?>"><input type="radio" id="<?php echo $value['id'].'_'.$key; ?>" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>" <?php if ($sviewOptions[$value['id']] == $key) { echo 'checked="checked"'; }?> /> <?php echo $option;?></label>&nbsp;&nbsp;&nbsp;&nbsp;
						<?php }
						}
						?>
						</p>
						<?php 
						break;
					
					case 'select':
						?>
			<p<?php if ($isHint) echo ' class="'.$tooltip.'" title="'.$hint.'"'; ?>><strong><?php echo $value['name']; ?></strong>
			<br/><?php echo $value['desc']; ?></p>
			<p><select<?php if ($isHint) echo ' class="'.$tooltip.'" title="'.$hint.'"'; ?> name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
						<?php foreach ($value['options'] as $option) { ?>
			<option value="<?php echo $option; ?>" <?php if ( $sviewOptions[$value['id']] == $option) { echo ' selected="selected"'; }?> ><?php echo $option; ?></option>
						<?php } ?>
			</select></p>
						<?php
						break;
					
					default:
						
						break;
				}
			}
			?>

<div class="submit">
	<input type="submit" class='button-primary' name="update_sviewSettings" value="<?php _e('Update Settings', 'simple-view') ?>" />
</div>
</form>
</div>      
		<?php
		} // End of function printAdminPage
	}
}

if (class_exists("WpSimpleView")) {
	$minimus_simple_view = new WpSimpleView();
}

?>