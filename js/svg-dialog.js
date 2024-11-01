tinyMCEPopup.requireLangPack();

function init() {
	tinyMCEPopup.resizeToInnerSize();	
	TinyMCE_EditableSelects.init();
}

function insertSVGCode() {
	
	var svgCode;
	
	var f = document.forms[0];
	var radio = f.elements.svg_type;
	var eRadio = f.elements.svg_items;
	
	var svgID = f.elements.svg_id.value;
	var svgExclude = f.elements.svg_exclude.value;
	if(radio[0].checked) svgType = 'gallery';
	else if(radio[1].checked) svgType = 'item';
	if(eRadio[0].checked) svgItems = 'only';
	else svgItems = 'exclude';
	
	if (svgType == 'gallery') {
		if (svgExclude != '') {
			if(svgItems == 'only') svgCode = '[svg id=' + svgID + ' only="' + svgExclude + '"] ';
			else svgCode = '[svg id=' + svgID + ' exclude="' + svgExclude + '"] ';
		}
		else svgCode = '[svg id=' + svgID + '] ';
	}
	else if (svgType == 'item') svgCode = '[svg item=' + svgID + '] ';
		
	window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, svgCode);
	tinyMCEPopup.editor.execCommand('mceRepaint');
	tinyMCEPopup.close();
	return;
}

tinyMCEPopup.onInit.add(init);