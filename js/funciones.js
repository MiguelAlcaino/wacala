 function cambiarLinkVimeo(objeto){
  //http://vimeo.com/84880847
  if(objeto.value.toString().substring(0,16) == 'http://vimeo.com'){
    objeto.value=objeto.value.toString().substring(17);
    recuperarDatosVimeo(objeto.value);
  }else{
    if(objeto.value.toString().substring(0,20) == 'http://www.vimeo.com'){
      objeto.value=objeto.value.toString().substring(21); 
      recuperarDatosVimeo(objeto.value);     
    }else{
      recuperarDatosVimeo(objeto.value);
    }
  }
}

function recuperarDatosVimeo(id_video){
  $j.ajax({
  method: "GET",
  url: "http://vimeo.com/api/v2/video/"+id_video+".json",
  statusCode: {
    404: function(){
      $j('#post_link').val('');
      alert("El link de vimeo no es valido");
    }
  },
  success: function(data){
  $j('#post_titulo').val(data[0]['title'].toString());
  $j('#post_descripcion').html(data[0]['description'].toString());
  tinymce.init({
      selector: "textarea"
  });
  
  },
  error: function(){
    ;
  }
});
}