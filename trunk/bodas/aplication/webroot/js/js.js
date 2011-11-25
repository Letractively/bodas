// JavaScript Document

$(document).ready(function() {
	
	if($('#galleria').length > 0){
		Galleria.loadTheme('http://local.bodas.com/aplication/webroot/js/galleria/galleria.classic.min.js');
		$('#galleria').galleria({
			width:504,
			height:356	
		});
	}

});