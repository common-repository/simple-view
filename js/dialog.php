<?php

/**
 * @author minimus
 * @copyright 2009
 */

$wpconfig = realpath("../../../../wp-config.php");
if (!file_exists($wpconfig))  {
	echo "Could not found wp-config.php. Error in path :\n\n".$wpconfig ;	
	die;	
}
require_once($wpconfig);
require_once(ABSPATH.'/wp-admin/admin.php');

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php _e('Insert Simple View', 'simple-view'); ?></title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/editable_selects.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-content/plugins/simple-view/js/svb-dialog.js"></script>
	<base target="_self" />
</head>

<body id="link" onload="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';" style="display: none">
  <form name="svb" onsubmit="insertSVBCode();return false;" action="#">
    <div class="tabs">
      <ul>
        <li id="basic_tab" class="current"><span><a href="javascript:mcTabs.displayTab('basic_tab','basic_panel');" onmousedown="return false;"><?php _e("Basic Settings", 'simple-view'); ?></a></span></li>
        <li id="extended_tab"><span><a href="javascript:mcTabs.displayTab('extended_tab','extended_panel');" onmousedown="return false;"><?php _e("Extended Settings", 'simple-view'); ?></a></span></li>
      </ul>
    </div>
    <div class="panel_wrapper" style="height: 200px;">
      <div id="basic_panel" class="panel current">
		    <table border="0" cellpadding="4" cellspacing="0">
		      <tr>
			      <td nowrap="nowrap"><label for="svb_source"><?php _e('Source', 'simple-view').':'; ?></label></td>
			      <td><input id="svb_source" name="svb_source" style="width: 320px"/></td>
		      </tr>
		      <tr>
			      <td nowrap="nowrap"><label for="svb_caption"><?php _e('Caption', 'simple-view').':'; ?></label></td>
			      <td><input id="svb_caption" name="svb_caption" style="width: 320px"/></td>
		      </tr>
					<tr>
			      <td nowrap="nowrap"><label for="svb_cnt"><?php _e('Content', 'simple-view').':'; ?></label></td>
			      <td><input id="svb_cnt" name="svb_cnt" style="width: 320px"/></td>
		      </tr>
		    </table>
		    <table border="0" cellpadding="4" cellspacing="0">
		    	<tr><td><?php _e('Content Type', 'simple-view'); ?></td></tr>
 					<tr>						
						<td><label for="svb_content_thumb"><input type="radio" id="svb_content_thumb" name="svb_content" class="radio" value="thumb" checked="checked" /><?php _e('Thumbnail', 'simple-view'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;<label for="svb_content_text"><input type="radio" id="svb_content_text" name="svb_content" class="radio" value="text" /><?php _e('Text', 'simple-view'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;<label for="svb_content_tube"><input type="radio" id="svb_content_tube" name="svb_content" class="radio" value="tube" /><?php _e('YouTube ID', 'simple-view'); ?></label></td>
					</tr>
				</table>
      </div>
      <div id="extended_panel" class="panel">
        <table border="0" cellpadding="4" cellspacing="0">
		      <tr>
			      <td nowrap="nowrap"><label for="svb_group"><?php _e('Group', 'simple-view').':'; ?></label></td>
			      <td><input id="svb_group" name="svb_group" style="width: 320px"/></td>
		      </tr>
				</table>
      </div>
		</div>
		<div class="mceActionPanel">
		  <div style="float: left">
        <input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", 'simple-view'); ?>" onclick="tinyMCEPopup.close();" />
      </div>
      <div style="float: right">
        <input type="submit" id="insert" name="insert" value="<?php _e("Insert", 'simple-view'); ?>" onclick="insertSVBCode();" />
      </div>
    </div>
  </form>
