<?php

/**
 * @author minimus
 * @copyright 2009 - 2010
 */

header("Content-type: text/javascript; charset=UTF-8"); 
include("../../../../wp-load.php");
$sviewOptions = $minimus_simple_view->getAdminOptions();
$svOptions = $minimus_simple_view->getPluginOptions();
$svInitOptions = $minimus_simple_view->sviewInitOptions;

?>
(function($) {
	$(document).ready(function($){
		$('#thumb_border_color').ColorPicker({
  		onSubmit: function(hsb, hex, rgb, el){
  			$(el).val(hex);
  			$(el).ColorPickerHide();
  		},
  		onBeforeShow: function(){
  			$(this).ColorPickerSetColor(this.value);
  		}
  	}).bind('keyup', function(){
  		$(this).ColorPickerSetColor(this.value);
    });
  });
})(jQuery)