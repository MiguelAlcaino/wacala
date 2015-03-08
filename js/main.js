$(document).keyup(function(e) {
if (e.keyCode == 27) { 
   $('#mymodal').modal('hide');
}
});

function ajustarContenedorCentral(){
	h = $('#contenedor_central').height();
	//h = $('#contenedor_central').outerHeight(true);
	h_window = $(window).height();
	if(h > h_window){
		//top: 0%;
		//margin: 0 0 0 -395px;
		$('#contenedor_central').css('top','0%');	
		$('#contenedor_central').css('margin','0 0 0 -395px');	
	}else{
		$('#contenedor_central').css('margin', ((h/2)*-1)+'px 0 0 -395px');
		$('#contenedor_central').css('top','50%');
	}
	console.log('Ajustado el contenedor');
	console.log('Altura contenedor: '+h);
	console.log('Altura ventana: '+h_window);
}

$(document).ready(function(){
	//Fade IN&OUT thumbnails
$('.encima_thumbnail').hover(
  function(){
    //$(this).fadeIn('fast');
    $(this).next('.titulo_post').next('.titulo_texto').stop().animate({"opacity": "1"}, "fast");
    $(this).next('.titulo_post').stop().animate({"opacity": "0.7"}, "fast");
  }, function(){
    $(this).next('.titulo_post').next('.titulo_texto').stop().animate({"opacity": "0"}, "fast");
    $(this).next('.titulo_post').stop().animate({"opacity": "0"}, "fast");
  }
);
//FIN Fade IN&OUT thumbnails

//Ajuste de texto thumbnail
$('.titulo_texto').children().each(
	function(){
		var $h = -($(this).height()/2);
		$(this).css('margin-top',$h);
	}
);
//FIN Ajuste texto thumbnail

$("#menu_elementos li").each(
	function(){
		$( this ).children("div").click(
			function(){
				window.location = $(this).children('a').attr('href');
			}
		)
	}
);


});



