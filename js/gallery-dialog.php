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
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-content/plugins/simple-view/js/svg-dialog.js"></script>
	<base target="_self" />
</head>

<body id="link" onload="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';" style="display: none">
  <form name="svb" onsubmit="insertSVGCode();return false;" action="#">
    <div class="tabs">
      <ul>
        <li id="basic_tab" class="current"><span><a href="javascript:mcTabs.displayTab('basic_tab','basic_panel');" onmousedown="return false;"><?php _e("Basic Settings", 'simple-view'); ?></a></span></li>
      </ul>
    </div>
    <div class="panel_wrapper" style="height: 200px;">
      <div id="basic_panel" class="panel current">
		    <table border="0" cellpadding="4" cellspacing="0">
		      <tr>
			      <td nowrap="nowrap"><label for="svg_id"><?php _e('ID', 'simple-view').':'; ?></label></td>
			      <td><input id="svg_id" name="svg_id" style="width: 320px"/></td>
		      </tr>
				</table>
		    <table border="0" cellpadding="4" cellspacing="0">
		    	<tr><td><?php _e('Gallery Content Type', 'simple-view'); ?></td></tr>
 					<tr>						
						<td>
							<label for="svg_type_id"><input type="radio" id="svg_type_id" name="svg_type" class="radio" value="id" checked="checked" /><?php _e('Gallery ID', 'simple-view'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
							<label for="svg_type_item"><input type="radio" id="svg_type_item" name="svg_type" class="radio" value="item" /><?php _e('Gallery Item ID', 'simple-view'); ?></label>
						</td>
					</tr>
				</table>
				<table border="0" cellpadding="4" cellspacing="0">
		      <tr>
			      <td nowrap="nowrap"><label for="svg_exclude"><?php _e('Items', 'simple-view').':'; ?></label></td>
			      <td><input id="svb_caption" name="svg_exclude" style="width: 250px"/></td>
		      </tr>
				</table>
				<table border="0" cellpadding="4" cellspacing="0">
		    	<tr><td><?php _e('Only or Exclude Items', 'simple-view'); ?></td></tr>
 					<tr>						
						<td>
							<label for="svg_items_only"><input type="radio" id="svg_items_only" name="svg_items" class="radio" value="only" checked="checked" /><?php _e('Only Items', 'simple-view'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
							<label for="svg_items_exclude"><input type="radio" id="svg_items_exclude" name="svg_items" class="radio" value="exclude" /><?php _e('Exclude Items', 'simple-view'); ?></label>
						</td>
					</tr>
				</table>
				<table border="0" cellpadding="4" cellspacing="0">
					<tr>
						<td nowrap="nowrap"><?php _e('Enter the IDs of included only or excluded items separated by commas.', 'simple-view'); ?></td>
					</tr>
		    </table>
      </div>
		</div>
		<div class="mceActionPanel">
		  <div style="float: left">
        <input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", 'simple-view'); ?>" onclick="tinyMCEPopup.close();" />
      </div>
      <div style="float: right">
        <input type="submit" id="insert" name="insert" value="<?php _e("Insert", 'simple-view'); ?>" onclick="insertSVGCode();" />
      </div>
    </div>
  </form>
