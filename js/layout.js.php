<?php

/**
 * @author minimus
 * @copyright 2009
 */

header("Content-type: text/javascript"); 
include("../../../../wp-load.php");
$sviewOptions = $minimus_simple_view->getAdminOptions();
$svInitOptions = $minimus_simple_view->sviewInitOptions;

?>
(function($) {
	$(document).ready(function($){  
	  fbPageOptions = {
	    <?php
	      foreach ($sviewOptions as $key => $value) {
					if ($value != $svInitOptions[$key])
						echo ( ( gettype($value) == 'string' ) ? "	".$key.": '".$value."',"."\n" : ( ( gettype($value) == 'boolean' ) ? ( ($value) ? "	".$key.": true,"."\n" : "	".$key.": false,"."\n" ) : "	".$key.": ".$value.","."\n") );
				}
	    ?>
	    enableCookies: true,
	    cookieScope: 'site'
	  };
		
		$(".floatbox").attr("rel", function() {
			return this.rel.replace("lightbox", "");
		});
		
		fb.anchors.length = 0;
		fb.tagAnchors('floatbox');
	});
})(jQuery)