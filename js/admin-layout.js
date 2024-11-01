/**
 * @author minimus
 * @copyright 2009
 */
(function($) {
	$(document).ready(function($){
    $("#tabs").tabs();
		
		$('.tooltip[title]').qtip({ 
			style: { 
				name: 'cream', 
				tip: true, 
				width: 400,
				border: { width: 2, radius: 5 },
				'font-size': 11
			},
			position: {
				corner: {
        	target: 'topLeft',
        	tooltip: 'bottomLeft'
      	}
			}
		});
		
		$('.tooltip_b[title]').qtip({ 
			style: { 
				name: 'cream', 
				tip: true, 
				width: 400,
				border: { width: 2, radius: 5 },
				'font-size': 11
			},
			position: {
				corner: {
        	target: 'bottomLeft',
        	tooltip: 'topLeft'
      	}
			}
		});
  });
})(jQuery)
