(function() {
	tinymce.PluginManager.requireLangPack('svb');
	 
	tinymce.create('tinymce.plugins.svb', {
		
		init : function(ed, url) {
      this.editor = ed;
      
			ed.addCommand('svb', function() {
				var se = ed.selection;
					
				ed.windowManager.open({
					file : url + '/dialog.php',
					width : 450 + parseInt(ed.getLang('svb.delta_width', 0)),
					height : 280 + parseInt(ed.getLang('svb.delta_height', 0)),
					inline : 1
				}, {
					plugin_url : url 
				});
			});
			
			ed.addCommand('svg', function() {
				var se = ed.selection;
					
				ed.windowManager.open({
					file : url + '/gallery-dialog.php',
					width : 450 + parseInt(ed.getLang('svb.delta_width', 0)),
					height : 280 + parseInt(ed.getLang('svb.delta_height', 0)),
					inline : 1
				}, {
					plugin_url : url 
				});
			});

			ed.addButton('svb', {
				title : 'svb.insert_svb',
				cmd : 'svb',
				image : url + '/img/svb.png'
			});
			
			ed.addButton('svg', {
				title : 'svb.insert_svg',
				cmd : 'svg',
				image : url + '/img/svg.png'
			});

			ed.onNodeChange.add(function(ed, cm, n, co) {
				//cm.setActive('svg', !co);
				cm.setDisabled('svg', !co);
			});
		},
		
		getInfo : function() {
			return {
					longname  : 'Simple View',
					author 	  : 'minimus',
					authorurl : 'http://blogcoding.ru/',
					infourl   : 'http://www.simplelib.com/',
					version   : "1.0.12"
			};
		}
	});

	tinymce.PluginManager.add('svb', tinymce.plugins.svb);
})();