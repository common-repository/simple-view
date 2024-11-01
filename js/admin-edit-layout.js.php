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
    
    $("#add-file-button").click(function(){
      var curFile = "<?php echo $svOptions['galleryURL'].'/'; ?>" + $("select#files_list option:selected").val();
      $("#source_link").val(curFile);
      return false;
		});
    
    $("#add-thumb-button").click(function(){
      var curFile = "<?php echo $svOptions['galleryURL'].'/'; ?>" + $("select#thumb_list option:selected").val();
      $("#link_content").val(curFile);
      return false;
		});
    
    $("#source_type_image").click(function() {
      $("#source-help").text("<?php _e('Enter the URL of the source or use the tools below.', 'simple-view'); ?>");
      if($('div#source_tools').is(':hidden')) $('div#source_tools').show(300);
      if($("#youtube-input").is(':visible')) $("#youtube-input").css({'display': 'none'});
      $("#content_type_thumb").click();
    });
    
    $("#source_type_video").click(function() {
      $("#source-help").text("<?php _e('Enter the URL of the source or use the tools below.', 'simple-view'); ?>");
      if($('div#source_tools').is(':hidden')) $('div#source_tools').show(300);
      if($("#youtube-input").is(':hidden')) $("#youtube-input").css({'display': 'inline'});
      $("#content_type_text").click();
    });
    
    $("#source_type_site").click(function() {
      $("#source-help").text("<?php _e('Enter the URL of the remote source.', 'simple-view'); ?>");
      if($('div#source_tools').is(':visible')) $('div#source_tools').hide(300);
      if($("#youtube-input").is(':visible')) $("#youtube-input").css({'display': 'none'});
      $("#content_type_text").click();
    });
    
    $("#source_type_html").click(function() {
      $("#source-help").text("<?php _e('Enter the URL of the remote source.', 'simple-view'); ?>");
      if($('div#source_tools').is(':visible')) $('div#source_tools').hide(300);
      if($("#youtube-input").is(':visible')) $("#youtube-input").css({'display': 'none'});
      $("#content_type_text").click();
    });
    
    $("#content_type_thumb").click(function() {
      if($('div#content_tools').is(':hidden')) $('div#content_tools').show(300);
      if($("#sources").is(":hidden")) $("#sources").show(300);
      if($('div#source_tools').is(':hidden') && $("#youtube-input").is(':visible')) $('div#source_tools').show(300);
      $("#link-content").text("<?php _e('Link Content', 'simple-view');?>");
      $("p#content-help").text("<?php _e('Enter the URL of the link content or use the tools below.', 'simple-view'); ?>");
    });
    
    $("#content_type_text").click(function() {
      if($('div#content_tools').is(':visible')) $('div#content_tools').hide(300);
      if($("#sources").is(":hidden")) $("#sources").show(300);
      if($('div#source_tools').is(':hidden') && $("#youtube-input").is(':visible')) $('div#source_tools').show(300);
      $("#link-content").text("<?php _e('Link Content', 'simple-view');?>");
      $("p#content-help").text("<?php _e('Enter the text of the link content.', 'simple-view'); ?>");
    });
    
    $("#content_type_youtube").click(function() {
      if($('div#content_tools').is(':visible')) $('div#content_tools').hide(300);
      //if($('div#source_tools').is(':visible')) $('div#source_tools').hide(300);
      if($("#sources").is(":visible")) $("#sources").hide(300);
      $("#link-content").text("<?php _e('YouTube Clip ID', 'simple-view');?>");
      $("p#content-help").text("<?php _e('Enter the YouTube ID.', 'simple-view'); ?>");
    });
    
    var btnUpload = $("#upload-file-button");
    var status = $("#uploading");
    var srcHelp = $("#uploading-help");
    var fileExt = '';
    var fu = new AjaxUpload(btnUpload, {  
      action: ajaxurl,  
      //Name of the file input box  
      name: 'uploadfile',
      data: {
        action: 'upload_media'
      },
      onSubmit: function(file, ext){  
        if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){  
          // check for valid file extension  
          status.text('Only JPG, PNG or GIF files are allowed');  
          return false;  
        }
        fileExt = ext;
        status.text('<?php echo __('Uploading', 'simple-view').' ...';?>');  
      },  
      onComplete: function(file, response){  
        //On completion clear the status  
        status.text('');  
        //Add uploaded file to list
        $('<div id="files"></div>').appendTo(srcHelp);
        if(response=="success"){  
          $("#source_link").val('<?php echo $svOptions['galleryURL']; ?>'+'/'+file);
          if (fileExt && /^(jpg|png|jpeg|gif)$/.test(fileExt)) {
            var thumb = '<?php echo $svOptions['galleryURL']; ?>'+'/'+file.replace('.'+fileExt, '')+'<?php echo $svOptions['thumbSuffix']; ?>'+'.'+fileExt;
            $("#link_content").val(thumb);
            $("#thumb").attr({src: thumb});
            $("#thumb-link").attr({href: '<?php echo $svOptions['galleryURL']; ?>' + '/' + file});
            //window.fb.ActivateElements();
          }
          $("#files").text('<?php _e('File', 'simple-view'); ?>'+' '+file+' '+'<?php _e('Uploaded.', 'simple-view'); ?>')
            .addClass('updated')
            .delay(3000)
            .fadeOut(1000, function() {
              $(this).remove();
            });
        } else{          
          $('#files').text(file+' '+response)
            .addClass('error')
            .delay(3000)
            .fadeOut(1000, function() {
              $(this).remove();
            });
        }  
      }  
    });
    
    var btnThumbUpload = $("#upload-thumb-button");
    var thumbStatus = $("#thumb-uploading");
    var thumbHelp = $("#thumb-uploading-help");
    var tu = new AjaxUpload(btnThumbUpload, {  
      action: ajaxurl,  
      //Name of the file input box  
      name: 'uploadfile',
      data: {
        action: 'upload_thumbnail'
      },
      onSubmit: function(file, ext){  
        if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){  
          // check for valid file extension  
          thumbStatus.text('Only JPG, PNG or GIF files are allowed');  
          return false;  
        }  
        thumbStatus.text('<?php echo __('Uploading', 'simple-view').' ...';?>');  
      },  
      onComplete: function(file, response){  
        //On completion clear the status  
        thumbStatus.text('');  
        //Add uploaded file to list
        $('<div id="thumbs"></div>').appendTo(thumbHelp);
        if(response=="success"){  
          $("#thumbs").text('<?php _e('File', 'simple-view'); ?>'+' '+file+' '+'<?php _e('Uploaded.', 'simple-view'); ?>')
            .addClass('updated')
            .delay(3000)
            .fadeOut(1000, function() {
              $(this).remove();
            });
          $("#thumb").attr({src: '<?php echo $svOptions['galleryURL']; ?>' + '/' + file});
          $("#link_content").val('<?php echo $svOptions['galleryURL']; ?>' + '/' + file);
        }
        else {          
          $('#thumbs').text(file+' '+response)
            .addClass('error')
            .delay(3000)
            .fadeOut(1000, function() {
              $(this).remove();
            });
        }  
      }  
    });
  });
})(jQuery)
