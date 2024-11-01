tinyMCEPopup.requireLangPack();

function init() {
	tinyMCEPopup.resizeToInnerSize();
	
	//document.getElementById('svb_fcolor_pickcontainer').innerHTML = getColorPickerHTML('svb_fcolor_pick','svb_fcolor');
	//document.getElementById('svb_cfcolor_pickcontainer').innerHTML = getColorPickerHTML('svb_cfcolor_pick','svb_cfcolor');
	//document.getElementById('svb_bgcolor_pickcontainer').innerHTML = getColorPickerHTML('svb_bgcolor_pick','svb_bgcolor');
	//document.getElementById('svb_cbgcolor_pickcontainer').innerHTML = getColorPickerHTML('svb_cbgcolor_pick','svb_cbgcolor');
	//document.getElementById('svb_bcolor_pickcontainer').innerHTML = getColorPickerHTML('svb_bcolor_pick','svb_bcolor');
	
	TinyMCE_EditableSelects.init();
}

function insertSVBCode() {
	
	var svbCode;
	
	var f = document.forms[0];
	var radio = f.elements.svb_content;
	
	var svbCaption = f.elements.svb_caption.value;
	var svbSource = f.elements.svb_source.value;
	var svbCnt = f.elements.svb_cnt.value;
	var svbCntType = 0;
	if(radio[1].checked) svbCntType = 1;
	else if(radio[2].checked) svbCntType = 2;
	var svbGroup = f.elements.svb_group.value;
	
	var contentObj = tinyMCE.getInstanceById('content');
	var svbBody = contentObj.selection.getContent();
	
	svbCode = ' [sview source="' + svbSource + '"'; 
	if (svbCaption != '') svbCode += ' caption="' + svbCaption + '"';
	if (svbGroup != '') svbCode += ' group="' + svbGroup + '"';
	if (!svbBody) {
		switch(svbCntType) {
			case 0:
				svbCode += ']<img src="' + svbCnt + '"' + ((svbCaption != '') ? ' alt="' + svbCaption + '"' : '') + ' />[/sview]';
				break;
		
			case 1:
				svbCode += ']' + svbCnt + '[/sview]';
				break;
		
			case 2:
				svbCode += ']<img src="http://i.ytimg.com/vi/' + svbCnt + '/default.jpg"' + ((svbCaption != '') ? ' alt="' + svbCaption + '"' : '') + ' />[/sview]';
				break;
		
			default:
				svbCode += ']<img src="' + svbCnt + '"' + ((svbCaption != '') ? ' alt="' + svbCaption + '"' : '') + ' />[/sview]';		
		}
	}
	else svbCode += ']' + svbBody + '[/sview]';
	
	window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, svbCode);
	tinyMCEPopup.editor.execCommand('mceRepaint');
	tinyMCEPopup.close();
	return;
}

tinyMCEPopup.onInit.add(init);