$(function(){

	// Lista de docente
	$.post( '../../view/funciones/cate.php' ).done( function(respuesta)
	{
		$( '#cate' ).html( respuesta );
	});
	
	
	// Lista de Ciudades
	$( '#cate' ).change( function()
	{
		var el_continente = $(this).val();

	});


})
